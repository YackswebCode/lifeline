<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use App\Models\Analysis;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;


class AnalysisController extends Controller
{
    public function index()
    {
        return view('dashboard.analyze');
    }

    public function store(Request $request)
    {
        try {
            // 🔍 Debug upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                Log::info('UPLOAD DEBUG', [
                    'error_code'    => $file->getError(),
                    'error_message' => $file->getErrorMessage(),
                    'client_mime'   => $file->getClientMimeType(),
                    'size'          => $file->getSize(),
                ]);
            } else {
                Log::warning('NO FILE RECEIVED', [
                    'all_files'    => $request->allFiles(),
                    'content_type' => $request->header('Content-Type'),
                ]);
            }

            // ✅ Validate input
            $validated = $request->validate([
                'image'        => 'required|image|mimes:jpg,jpeg,png|max:10240',
                'patient_name' => 'required|string|max:255',
            ]);

            $user = Auth::user();

            // 💰 Check credits
            if ($user->credits < 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Insufficient credits. Please buy more credits to continue.',
                ], 402);   // 402 Payment Required
            }

            // ✅ Upload image
            $path     = $request->file('image')->store('analyses', 'public');
            $fullPath = storage_path('app/public/' . $path);

            Log::info('IMAGE UPLOADED', [
                'user_id' => $user->id,
                'path'    => $path,
                'url'     => asset('storage/' . $path),
            ]);

            // ✅ Call AI
            $aiResponse = $this->analyzeImage($fullPath);

            $summary    = $aiResponse['summary'] ?? 'No result returned';
            $confidence = $aiResponse['confidence'] ?? null;

            // ✅ Generate unique tracking ID
            $trackingId = 'LIFE-' . strtoupper(Str::random(8));

            // ✅ Save to DB and charge credits
            $analysis = Analysis::create([
                'user_id'      => $user->id,
                'patient_name' => $validated['patient_name'],
                'tracking_id'  => $trackingId,
                'image'        => $path,
                'summary'      => $summary,
                'confidence'   => $confidence,
                'status'       => 'completed',
            ]);

            // Deduct 1 credit
            $user->decrement('credits');

            return response()->json([
                'success' => true,
                'data'    => [
                    'summary'      => $summary,
                    'confidence'   => $confidence,
                    'tracking_id'  => $trackingId,
                    'patient_name' => $analysis->patient_name,
                    'credits_left' => $user->fresh()->credits,   // updated credits
                ]
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->errors()['image'][0] ?? 'Invalid file.',
                'errors'  => $e->errors(),
            ], 422);

        } catch (\Throwable $e) {
            Log::error('ANALYSIS ERROR', [
                'user_id' => Auth::id(),
                'message' => $e->getMessage(),
                'file'    => $e->getFile(),
                'line'    => $e->getLine(),
                'trace'   => $e->getTraceAsString()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Server error. Please check logs.'
            ], 500);
        }
    }

    private function analyzeImage($localPath)
    {
        try {
            $imageData = file_get_contents($localPath);
            $mimeType  = mime_content_type($localPath) ?: 'image/jpeg';
            $base64    = base64_encode($imageData);
            $dataUri   = "data:{$mimeType};base64,{$base64}";

            $url = "https://router.huggingface.co/v1/chat/completions";

            $payload = [
                "model"    => "zai-org/GLM-4.5V:novita",
                "messages" => [
                    [
                        "role"    => "user",
                        "content" => [
                            ["type" => "text", "text" => "Provide a detailed medical description of this medical image, including key findings, possible abnormalities, and relevant clinical observations."],
                            [
                                "type"      => "image_url",
                                "image_url" => ["url" => $dataUri]
                            ]
                        ]
                    ]
                ]
            ];

            Log::info('AI REQUEST', [
                'model'      => $payload['model'],
                'image_size' => strlen($imageData),
            ]);

            $curl = curl_init($url);
            curl_setopt_array($curl, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST           => true,
                CURLOPT_POSTFIELDS     => json_encode($payload),
                CURLOPT_HTTPHEADER     => [
                    "Authorization: Bearer " . env('HF_TOKEN'),
                    "Content-Type: application/json"
                ],
                CURLOPT_TIMEOUT        => 120,   // increased
                CURLOPT_CONNECTTIMEOUT => 30,
            ]);

            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                $error = curl_error($curl);
                Log::error('CURL ERROR', ['error' => $error]);
                throw new \Exception("cURL Error: " . $error);
            }
            curl_close($curl);

            Log::info('AI RAW RESPONSE', ['response' => $response]);

            $decoded = json_decode($response, true);
            if (!$decoded || isset($decoded['error'])) {
                Log::error('AI API ERROR', ['decoded' => $decoded]);
                throw new \Exception(
                    $decoded['error']['message'] ?? $decoded['message'] ?? 'Invalid AI response'
                );
            }

            $content = $decoded['choices'][0]['message']['content'] ?? null;
            if (!$content) {
                throw new \Exception("AI response did not contain content.");
            }

            return [
                'summary'    => $content,
                'confidence' => 90
            ];

        } catch (\Throwable $e) {
            Log::error('AI PROCESS ERROR', ['message' => $e->getMessage()]);
            throw $e;
        }
    }

    public function show(Analysis $analysis)
    {
        if ($analysis->user_id !== Auth::id()) {
            abort(403);
        }

        return response()->json([
            'id'           => $analysis->id,
            'tracking_id'  => $analysis->tracking_id,
            'patient_name' => $analysis->patient_name,
            'summary'      => $analysis->summary,
            'confidence'   => $analysis->confidence,
            'image_url'    => asset('storage/' . $analysis->image),
            'date'         => $analysis->created_at->format('F j, Y'),
        ]);
    }

    public function downloadPDF(Analysis $analysis)
    {
        if ($analysis->user_id !== Auth::id()) {
            abort(403);
        }

        $pdf = Pdf::loadView('pdf.analysis', [
            'analysis' => $analysis
        ]);

        return $pdf->download('analysis-' . $analysis->tracking_id . '.pdf');
    }

 
public function destroy(Analysis $analysis)
{
    if ($analysis->user_id !== Auth::id()) {
        abort(403);
    }

    // Delete the image file from storage
    if ($analysis->image) {
        Storage::disk('public')->delete($analysis->image);
    }

    $analysis->delete();

    return response()->json(['success' => true]);
}
}