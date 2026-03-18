@extends('layouts.dashboard')

@section('title', 'Analyze X-ray - Lifeline')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card p-4">
            <h3 class="fw-bold mb-4">Upload X‑ray for AI Analysis</h3>
            
            <form id="analyzeForm">
                @csrf
                
                <!-- Image Upload Area -->
                <div class="mb-4">
                    <label for="image" class="form-label fw-semibold">Select chest X‑ray (JPG, PNG, max 10MB)</label>
                    <div class="upload-area border rounded-3 p-4 text-center" id="uploadArea">
                        <input type="file" class="form-control d-none" id="image" name="image" accept="image/jpeg,image/png" required>
                        <div id="uploadPlaceholder">
                            <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: var(--brand);"></i>
                            <p class="mb-1"><strong>Click to browse</strong> or drag and drop</p>
                            <p class="text-muted small">Supported: JPG, PNG (max 10MB)</p>
                        </div>
                        <div id="preview" class="mt-3" style="display: none;">
                            <img src="" alt="Preview" class="img-fluid rounded shadow" style="max-height: 250px;">
                            <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="changeImageBtn">
                                <i class="fas fa-sync-alt me-1"></i> Change Image
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Clinical Context Section -->
                <div class="mb-4">
                    <h5 class="fw-semibold mb-3">Clinical Context</h5>
                    <div class="row g-3">
                        <!-- View Position -->
                        <div class="col-md-6">
                            <label for="viewPosition" class="form-label">View Position</label>
                            <select class="form-select" id="viewPosition" name="view_position">
                                <option value="" selected>Select (optional)</option>
                                <option value="PA">PA (Posteroanterior)</option>
                                <option value="AP">AP (Anteroposterior)</option>
                                <option value="Lateral">Lateral</option>
                                <option value="AP Supine">AP Supine</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        
                        <!-- Patient Age Group -->
                        <div class="col-md-6">
                            <label for="ageGroup" class="form-label">Patient Age Group</label>
                            <select class="form-select" id="ageGroup" name="age_group">
                                <option value="" selected>Select (optional)</option>
                                <option value="pediatric">Pediatric</option>
                                <option value="adult">Adult</option>
                                <option value="geriatric">Geriatric</option>
                            </select>
                        </div>
                        
                        <!-- Patient Gender -->
                        <div class="col-md-6">
                            <label for="gender" class="form-label">Patient Gender</label>
                            <select class="form-select" id="gender" name="gender">
                                <option value="" selected>Select (optional)</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other / Not specified</option>
                            </select>
                        </div>
                        
                        <!-- Clinical Indication / Reason -->
                        <div class="col-md-6">
                            <label for="indication" class="form-label">Clinical Indication</label>
                            <select class="form-select" id="indication" name="indication">
                                <option value="" selected>Select (optional)</option>
                                <option value="cough">Cough / Fever</option>
                                <option value="shortness_of_breath">Shortness of breath</option>
                                <option value="chest_pain">Chest pain</option>
                                <option value="trauma">Trauma</option>
                                <option value="pre_op">Pre‑operative</option>
                                <option value="follow_up">Follow‑up</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <!-- Specific Question for AI -->
                        <div class="col-12">
                            <label for="specificQuestion" class="form-label">Specific Question for AI (optional)</label>
                            <input type="text" class="form-control" id="specificQuestion" name="specific_question" placeholder="e.g., Rule out pneumonia, check for pneumothorax...">
                        </div>
                        
                        <!-- Additional Notes (free text) -->
                        <div class="col-12">
                            <label for="description" class="form-label">Additional Clinical Notes</label>
                            <textarea class="form-control" id="description" name="description" rows="2" placeholder="Any other relevant information..."></textarea>
                        </div>
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold" id="submitBtn">
                    <i class="fas fa-microscope me-2"></i> Analyze Image
                </button>
            </form>
        </div>
        
        <!-- Result Section -->
        <div id="resultContainer" class="mt-4" style="display: none;">
            <div class="card p-4">
                <h4 class="fw-bold mb-3">AI Analysis Result</h4>
                
                <!-- Loading Spinner -->
                <div id="loadingSpinner" class="text-center py-4" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Processing...</span>
                    </div>
                    <p class="mt-2">Analyzing image, please wait...</p>
                </div>
                
                <!-- Result Content -->
                <div id="resultContent"></div>
                
                <div class="alert alert-warning mt-3 small">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    <strong>AI‑assisted analysis only.</strong> This is not a diagnosis. Always confirm findings with a licensed clinician.
                </div>
                
                <!-- Action Buttons -->
                <div class="d-flex gap-2 mt-3">
                    <button class="btn btn-outline-brand btn-sm" id="downloadResultBtn">
                        <i class="fas fa-download me-1"></i> Download Report
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" id="newAnalysisBtn">
                        <i class="fas fa-plus me-1"></i> New Analysis
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .upload-area {
        border: 2px dashed #dee2e6;
        background-color: var(--white);
        cursor: pointer;
        transition: var(--transition);
    }
    .upload-area:hover {
        border-color: var(--brand);
        background-color: rgba(164,233,252,0.05);
    }
    body.dark-mode .upload-area {
        border-color: #4b5563;
    }
    body.dark-mode .upload-area:hover {
        border-color: var(--brand);
    }
    #preview img {
        max-width: 100%;
        border-radius: 0.5rem;
    }
    .result-item {
        margin-bottom: 1.5rem;
    }
    .result-item h6 {
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--brand);
    }
    .confidence-badge {
        display: inline-block;
        padding: 0.35rem 0.65rem;
        border-radius: 2rem;
        font-size: 0.75rem;
        font-weight: 600;
        text-transform: uppercase;
    }
    .confidence-high {
        background-color: #10b981;
        color: white;
    }
    .confidence-medium {
        background-color: #fbbf24;
        color: #1e293b;
    }
    .confidence-low {
        background-color: #ef4444;
        color: white;
    }
    .form-select, .form-control {
        background-color: var(--white);
        border: 1px solid #dee2e6;
        color: var(--text-light);
    }
    body.dark-mode .form-select,
    body.dark-mode .form-control {
        background-color: var(--white);
        border-color: #4b5563;
        color: var(--text-dark);
    }
    body.dark-mode .form-select option {
        background-color: var(--white);
        color: var(--text-dark);
    }
</style>
@endpush

@push('scripts')
<script>
    (function() {
        // DOM elements
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('image');
        const uploadPlaceholder = document.getElementById('uploadPlaceholder');
        const previewDiv = document.getElementById('preview');
        const previewImg = previewDiv.querySelector('img');
        const changeImageBtn = document.getElementById('changeImageBtn');
        const analyzeForm = document.getElementById('analyzeForm');
        const submitBtn = document.getElementById('submitBtn');
        const resultContainer = document.getElementById('resultContainer');
        const resultContent = document.getElementById('resultContent');
        const loadingSpinner = document.getElementById('loadingSpinner');
        const downloadBtn = document.getElementById('downloadResultBtn');
        const newAnalysisBtn = document.getElementById('newAnalysisBtn');

        let selectedFile = null;
        let currentResult = null;

        // Click on upload area triggers file input
        uploadArea.addEventListener('click', () => fileInput.click());

        // Prevent click on change image button from bubbling
        changeImageBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            resetUpload();
            fileInput.click();
        });

        // File selection change
        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            selectedFile = file;
            
            // Show preview
            const reader = new FileReader();
            reader.onload = function(event) {
                previewImg.src = event.target.result;
                uploadPlaceholder.style.display = 'none';
                previewDiv.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });

        // Reset upload area
        function resetUpload() {
            fileInput.value = '';
            selectedFile = null;
            previewImg.src = '';
            uploadPlaceholder.style.display = 'block';
            previewDiv.style.display = 'none';
        }

        // Form submit
        analyzeForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            if (!selectedFile) {
                alert('Please select an X‑ray image.');
                return;
            }

            // Show loading, hide previous result
            resultContainer.style.display = 'block';
            resultContent.innerHTML = '';
            loadingSpinner.style.display = 'block';
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> Processing...';

            // Collect all form data
            const formData = new FormData();
            formData.append('image', selectedFile);
            formData.append('view_position', document.getElementById('viewPosition').value);
            formData.append('age_group', document.getElementById('ageGroup').value);
            formData.append('gender', document.getElementById('gender').value);
            formData.append('indication', document.getElementById('indication').value);
            formData.append('specific_question', document.getElementById('specificQuestion').value);
            formData.append('description', document.getElementById('description').value);

            // Simulate API call (replace with actual fetch when ready)
            setTimeout(() => {
                // Mock response based on some of the input (just for demo)
                const view = document.getElementById('viewPosition').value;
                const question = document.getElementById('specificQuestion').value;
                
                let mockResponse = {
                    findings: [
                        "Patchy airspace opacity in right lower zone",
                        "Cardiomediastinal silhouette within normal limits"
                    ],
                    impression: "Right lower lobe consolidation, suspicious for pneumonia. Recommend clinical correlation and radiology review.",
                    confidence: "medium",
                    recommendation: "Consult radiologist. Consider chest CT if clinically warranted."
                };
                
                // Adjust mock response slightly based on question (just for variety)
                if (question.toLowerCase().includes('pneumonia')) {
                    mockResponse.findings[0] = "Dense consolidation in right lower lobe – highly suggestive of pneumonia.";
                    mockResponse.impression = "Right lower lobe pneumonia. Clinical correlation advised.";
                } else if (question.toLowerCase().includes('pneumothorax')) {
                    mockResponse.findings = ["Visceral pleural line visible in left upper zone", "No lung markings peripheral to line"];
                    mockResponse.impression = "Left-sided pneumothorax (small).";
                    mockResponse.confidence = "high";
                    mockResponse.recommendation = "Immediate clinical evaluation. Consider chest tube if symptomatic.";
                }
                
                displayResult(mockResponse);
                currentResult = mockResponse;
                
                loadingSpinner.style.display = 'none';
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-microscope me-2"></i> Analyze Image';
            }, 2000);

            // Uncomment for actual backend call
            /*
            try {
                const response = await fetch('/analyze', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                });
                
                if (!response.ok) {
                    throw new Error('Analysis failed');
                }
                
                const data = await response.json();
                displayResult(data);
                currentResult = data;
            } catch (error) {
                resultContent.innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
            } finally {
                loadingSpinner.style.display = 'none';
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="fas fa-microscope me-2"></i> Analyze Image';
            }
            */
        });

        // Display result in a formatted way
        function displayResult(data) {
            let html = '';
            
            if (data.findings && Array.isArray(data.findings)) {
                html += '<div class="result-item">';
                html += '<h6>Findings</h6>';
                html += '<ul class="list-unstyled">';
                data.findings.forEach(finding => {
                    html += `<li><i class="fas fa-circle me-2" style="color: var(--brand); font-size: 0.5rem;"></i>${finding}</li>`;
                });
                html += '</ul>';
                html += '</div>';
            }
            
            if (data.impression) {
                html += '<div class="result-item">';
                html += '<h6>Impression</h6>';
                html += `<p>${data.impression}</p>`;
                html += '</div>';
            }
            
            if (data.confidence) {
                let confidenceClass = '';
                const conf = data.confidence.toLowerCase();
                if (conf === 'high') confidenceClass = 'confidence-high';
                else if (conf === 'medium') confidenceClass = 'confidence-medium';
                else if (conf === 'low') confidenceClass = 'confidence-low';
                
                html += '<div class="result-item">';
                html += '<h6>Confidence</h6>';
                html += `<span class="confidence-badge ${confidenceClass}">${data.confidence}</span>`;
                html += '</div>';
            }
            
            if (data.recommendation) {
                html += '<div class="result-item">';
                html += '<h6>Recommendation</h6>';
                html += `<p>${data.recommendation}</p>`;
                html += '</div>';
            }
            
            // If data is raw JSON (fallback)
            if (!html) {
                html = `<pre class="bg-light p-3 rounded">${JSON.stringify(data, null, 2)}</pre>`;
            }
            
            resultContent.innerHTML = html;
        }

        // Download result as JSON
        downloadBtn.addEventListener('click', function() {
            if (!currentResult) return;
            
            const blob = new Blob([JSON.stringify(currentResult, null, 2)], { type: 'application/json' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = 'lifeline-analysis-result.json';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });

        // Reset for new analysis
        newAnalysisBtn.addEventListener('click', function() {
            resetUpload();
            // Reset all select and input fields
            document.getElementById('viewPosition').value = '';
            document.getElementById('ageGroup').value = '';
            document.getElementById('gender').value = '';
            document.getElementById('indication').value = '';
            document.getElementById('specificQuestion').value = '';
            document.getElementById('description').value = '';
            resultContainer.style.display = 'none';
            currentResult = null;
        });
    })();
</script>
@endpush