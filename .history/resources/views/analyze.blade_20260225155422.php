@extends('layouts.app')

@section('title', 'Analyze X-ray - Lifeline')

@section('content')
<div class="container">
    <div class="card p-4">
        <h3>Upload X‑ray for AI Analysis</h3>
        <form id="analyzeForm">
            <div class="mb-3">
                <label for="image" class="form-label">Select chest X‑ray (JPG, PNG, max 10MB)</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/jpeg,image/png">
            </div>
            <div id="preview" class="mb-3 text-center"></div>
            <button type="submit" class="btn btn-brand">Analyze</button>
        </form>

        <hr>

        <div id="result" class="mt-4" style="display: none;">
            <h4>AI Analysis Result</h4>
            <div class="card p-3 bg-light">
                <pre id="resultContent" style="white-space: pre-wrap;"></pre>
                <div class="alert alert-warning mt-2 small">
                    <i class="fas fa-exclamation-triangle"></i> AI‑assisted analysis. Not a diagnosis. Confirm with a licensed clinician.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview');
        preview.innerHTML = '';
        if (file) {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.maxWidth = '320px';
            img.className = 'img-fluid rounded shadow';
            preview.appendChild(img);
        }
    });

    document.getElementById('analyzeForm').addEventListener('submit', function(e) {
        e.preventDefault();
        // Mock result – no actual backend call
        const mockJson = {
            findings: [
                "Patchy airspace opacity in right lower zone",
                "Cardiomediastinal silhouette within normal limits"
            ],
            impression: "Right lower lobe consolidation, suspicious for pneumonia. Recommend clinical correlation and radiology review.",
            confidence: "medium",
            recommendation: "Consult radiologist. Consider chest CT if clinically warranted."
        };
        document.getElementById('resultContent').textContent = JSON.stringify(mockJson, null, 2);
        document.getElementById('result').style.display = 'block';
    });
</script>
@endpush