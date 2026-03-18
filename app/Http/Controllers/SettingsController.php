<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Models\CreditPurchase;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'organization' => 'nullable|string|max:255',
        ]);

        $user->update($request->only('name', 'email', 'organization'));

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password changed successfully.');
    }

    public function updateNotifications(Request $request)
    {
        $user = Auth::user();
        $user->email_notifications = $request->boolean('email_notifications');
        $user->marketing_emails = $request->boolean('marketing_emails');
        $user->billing_alerts = $request->boolean('billing_alerts');
        $user->save();

        return back()->with('success', 'Notification preferences saved.');
    }

    // Paystack integration
    public function initiatePayment(Request $request)
    {
        $request->validate([
            'credits' => 'required|integer|min:10|in:10,20,50,100', // restrict to valid packages
        ]);

        $credits = $request->credits;
        $amount = $credits * 50 * 100; // 10 credits = 500 NGN => 50 NGN per credit, *100 for kobo

        $reference = uniqid('txn_', true);

        $purchase = CreditPurchase::create([
            'user_id' => Auth::id(),
            'credits' => $credits,
            'amount' => $amount,
            'reference' => $reference,
            'status' => 'pending',
        ]);

        // Initialize Paystack transaction
        $response = Http::withToken(config('services.paystack.secret'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => Auth::user()->email,
                'amount' => $amount,
                'reference' => $reference,
                'callback_url' => route('settings.verify-payment'),
                'metadata' => [
                    'purchase_id' => $purchase->id,
                    'credits' => $credits,
                ],
            ]);

        if ($response->successful() && $response->json('status')) {
            return redirect($response->json('data.authorization_url'));
        }

        return back()->with('error', 'Payment initiation failed. Please try again.');
    }

    public function verifyPayment(Request $request)
    {
        $reference = $request->reference;

        // Verify transaction with Paystack
        $response = Http::withToken(config('services.paystack.secret'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}");

        if ($response->successful() && $response->json('data.status') == 'success') {
            $data = $response->json('data');
            $purchase = CreditPurchase::where('reference', $reference)->first();

            if ($purchase && $purchase->status == 'pending') {
                $purchase->update(['status' => 'success']);

                // Credit the user
                $user = $purchase->user;
                $user->increment('credits', $purchase->credits);
            }

            return redirect()->route('settings')->with('success', 'Credits added successfully!');
        }

        return redirect()->route('settings')->with('error', 'Payment verification failed.');
    }
}