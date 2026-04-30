@extends('layouts.dashboard')

@section('title', 'Analyze X-ray - Lifeline')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">

        <!-- Credits Display -->
        <div class="alert alert-info d-flex align-items-center justify-content-between rounded-4 mb-4">
            <span>
                <i class="fas fa-coins me-2"></i> Credits remaining:
                <strong id="creditCount">{{ Auth::user()->credits ?? 0 }}</strong>
            </span>
            <a href="{{ route('settings') }}" class="btn btn-sm btn-outline-light">Buy More</a>
        </div>

        <!-- CARD -->
        <div class="card p-4 shadow-sm">
            <h3 class="fw-bold mb-3">AI X-ray Analysis</h3>
            <p class=" small">Upload a medical image and enter patient details to generate AI‑assisted insights.</p>

            <form id="analyzeForm" enctype="multipart/form-data">
                @csrf

                <!-- Patient Name -->
                <div class="mb-3">
                    <label for="patientName" class="form-label fw-semibold">Patient Name</label>
                    <input type="text" id="patientName" name="patient_name" class="form-control"
                           placeholder="Enter patient's full name" required>
                </div>

                <!-- Upload -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">Upload Medical Image</label>

                    <div class="upload-area rounded-3 p-4 text-center" id="uploadArea">
                        <input type="file" id="image" name="image" class="d-none" accept="image/*">

                        <div id="uploadPlaceholder">
                            <i class="fas fa-cloud-upload-alt fa-3x mb-3"></i>
                            <p class="mb-1"><strong>Click to upload</strong> or drag & drop</p>
                            <small class="">PNG, JPG (Max 10MB)</small>
                        </div>

                        <div id="preview" style="display:none;">
                            <img id="previewImg" class="img-fluid rounded shadow-sm">
                        </div>
                    </div>
                </div>

                <button class="btn btn-brand w-100 py-2 fw-semibold" id="submitBtn">
                    <i class="fas fa-microscope me-2"></i>Analyze Image
                </button>
            </form>
        </div>

        <!-- RESULT -->
        <div id="resultContainer" class="mt-4" style="display:none;">
            <div class="card p-4 shadow-sm">
                <h4 class="fw-bold mb-3">Analysis Result</h4>

                <!-- LOADING -->
                <div id="loading" class="text-center py-4" style="display:none;">
                    <div class="spinner-border text-primary"></div>
                    <p class="mt-2">Analyzing image...</p>
                </div>

                <!-- ERROR -->
                <div id="errorBox"></div>

                <!-- RESULT -->
                <div id="resultContent" class="text-secondary"></div>

                <div class="alert alert-warning mt-4 small">
                    <i class="fas fa-exclamation-triangle me-2"></i>
                    AI-assisted result only. Not a medical diagnosis.
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
    max-height: 250px;
    border-radius: 0.5rem;
}
.btn-brand {
    background-color: var(--brand);
    color: white;
    border-radius: 50px;
}
.btn-brand:hover {
    background-color: var(--brand-dark, #0d8ec4);
}
.result-box {
    background: #f8fafc;
    padding: 1.5rem;
    border-radius: 0.5rem;
    font-size: 0.95rem;
    line-height: 1.6;
    color: #1a202c;
}
.result-box h5 {
    font-size: 1.1rem;
    margin-top: 1.25rem;
    margin-bottom: 0.5rem;
    color: var(--brand, #0ea5e9);
    font-weight: 700;
}
.result-box h5:first-of-type {
    margin-top: 0;
}
.result-box ul {
    padding-left: 1.5rem;
    margin-bottom: 1rem;
}
.result-box ul li {
    margin-bottom: 0.35rem;
}
.result-box strong {
    color: #0c4a6e;
}
.confidence-badge {
    background: linear-gradient(135deg, #059669, #10b981);
    color: white;
    padding: 0.4rem 1rem;
    border-radius: 999px;
    font-size: 0.9rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    box-shadow: 0 2px 6px rgba(5, 150, 105, 0.3);
}
.confidence-badge i {
    font-size: 0.9rem;
}

/* Mobile tweaks */
@media (max-width: 576px) {
    .card {
        padding: 1.25rem !important;
    }
    .result-box {
        padding: 1rem;
        font-size: 0.85rem;
    }
    .result-box h5 {
        font-size: 1rem;
    }
}
</style>
@endpush

@push('scripts')
<script>
const uploadArea = document.getElementById('uploadArea');
const fileInput = document.getElementById('image');
const preview = document.getElementById('preview');
const previewImg = document.getElementById('previewImg');
const placeholder = document.getElementById('uploadPlaceholder');
const patientNameInput = document.getElementById('patientName');

const form = document.getElementById('analyzeForm');
const resultBox = document.getElementById('resultContainer');
const resultContent = document.getElementById('resultContent');
const errorBox = document.getElementById('errorBox');
const loading = document.getElementById('loading');
const btn = document.getElementById('submitBtn');
const creditSpan = document.getElementById('creditCount');

let file = null;

// Click upload
uploadArea.onclick = () => fileInput.click();

// File select
fileInput.onchange = (e) => {
    file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (ev) => {
        previewImg.src = ev.target.result;
        preview.style.display = 'block';
        placeholder.style.display = 'none';
    };
    reader.readAsDataURL(file);
};

// Submit
form.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (!file) {
        showError("Please upload an image first.");
        return;
    }

    const formData = new FormData();
    formData.append('image', file);
    formData.append('patient_name', patientNameInput.value.trim());

    resultBox.style.display = 'block';
    loading.style.display = 'block';
    resultContent.innerHTML = '';
    errorBox.innerHTML = '';

    btn.disabled = true;
    btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> Processing...`;

    try {
        const res = await fetch("{{ route('analyze.store') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: formData
        });

        const data = await res.json();

        if (!res.ok || !data.success) {
            throw new Error(data.message || "AI processing failed");
        }

        // Update credits display
        if (data.data.credits_left !== undefined) {
            creditSpan.textContent = data.data.credits_left;
        }

        displayResult(data.data);

    } catch (err) {
        showError(err.message);
    }

    loading.style.display = 'none';
    btn.disabled = false;
    btn.innerHTML = `<i class="fas fa-microscope me-2"></i>Analyze Image`;
});

// Show error
function showError(message) {
    errorBox.innerHTML = `
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-circle me-2"></i>
            ${message}
        </div>
    `;
}

// Display result
function displayResult(data) {
    let summary = data.summary || "No summary returned";
    let confidence = data.confidence ?? "N/A";
    let trackingId = data.tracking_id ?? "—";
    let patientName = data.patient_name || "Not provided";

    const formattedSummary = formatMedicalSummary(summary);

    resultContent.innerHTML = `
        <div class="result-box">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <span class="badge bg-primary mb-2">Tracking ID: ${trackingId}</span>
                    <h6 class="fw-bold mb-0">Patient: ${patientName}</h6>
                </div>
                <span class="confidence-badge">
                    <i class="fas fa-shield-alt"></i> Confidence: ${confidence}%
                </span>
            </div>
            <h6 class="fw-bold text-brand mb-2">Medical Summary</h6>
            <div class="summary-text">${formattedSummary}</div>
        </div>
    `;
}

/**
 * Converts AI-generated markdown-like text into clean, professional HTML.
 * Handles: ### / #### headings, **bold**, *italic*, - list, paragraphs.
 */
/**
 * Converts Markdown-like text (###, ####, **bold**, *italic*, - list, | table) into clean HTML.
 */
function formatMedicalSummary(text) {
    if (!text) return '';
    const lines = text.split('\n');
    let html = '';
    let inList = false;
    let tableRows = [];
    let inTable = false;

    for (let i = 0; i < lines.length; i++) {
        let line = lines[i].trim();

        // ---- Table detection ----
        if (line.startsWith('|') && line.endsWith('|')) {
            // Collect rows, skip the separator row (contains --- or :--- etc.)
            if (/^\|[\s\-:]+\|$/.test(line.replace(/\|/g, '').trim() + '|')) {
                // This is the separator row – skip it but mark we're in a table
                inTable = true;
                continue;
            } else {
                // It's a data row or header row
                if (!inTable && tableRows.length === 0) {
                    // first row will be header
                    inTable = true;
                }
                tableRows.push(line);
                continue;
            }
        } else {
            // End of table (non-table line encountered)
            if (inTable && tableRows.length > 0) {
                html += buildTable(tableRows);
                tableRows = [];
                inTable = false;
            }
            // fall through to normal processing
        }

        // ---- Normal formatting ----
        if (line === '') {
            if (inList) { html += '</ul>'; inList = false; }
            continue;
        }

        // headings (###, ####)
        if (/^#{3,4}\s+(.*)/.test(line)) {
            if (inList) { html += '</ul>'; inList = false; }
            const headingText = line.replace(/^#{3,4}\s+/, '');
            html += `<h5>${parseInline(headingText)}</h5>`;
            continue;
        }

        // unordered list
        if (/^-\s+(.*)/.test(line)) {
            if (!inList) { html += '<ul>'; inList = true; }
            const itemText = line.replace(/^-\s+/, '');
            html += `<li>${parseInline(itemText)}</li>`;
            continue;
        }

        // normal paragraph
        if (inList) { html += '</ul>'; inList = false; }
        html += `<p>${parseInline(line)}</p>`;
    }

    // Close any open list or table at end of text
    if (inList) { html += '</ul>'; }
    if (inTable && tableRows.length > 0) {
        html += buildTable(tableRows);
    }

    return html;
}

function parseInline(str) {
    str = str.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');   // bold
    str = str.replace(/\*(.+?)\*/g, '<em>$1</em>');               // italic
    return str;
}

function buildTable(rows) {
    if (rows.length === 0) return '';
    let tableHtml = '<table class="table table-bordered table-sm my-3"><thead><tr>';
    const headerCells = rows[0].split('|').filter(cell => cell.trim() !== '');
    headerCells.forEach(cell => {
        tableHtml += `<th>${parseInline(cell.trim())}</th>`;
    });
    tableHtml += '</tr></thead><tbody>';

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].split('|').filter(cell => cell.trim() !== '');
        tableHtml += '<tr>';
        cells.forEach(cell => {
            tableHtml += `<td>${parseInline(cell.trim())}</td>`;
        });
        tableHtml += '</tr>';
    }
    tableHtml += '</tbody></table>';
    return tableHtml;
}

/**
 * Handles **bold** and *italic* within a text fragment.
 */
function parseInline(str) {
    str = str.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');   // bold
    str = str.replace(/\*(.+?)\*/g, '<em>$1</em>');               // italic
    return str;
}
</script>
@endpush