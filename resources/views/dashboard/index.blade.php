@extends('layouts.dashboard')

@section('title', 'Dashboard - Lifeline')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
<div class="container-fluid px-0">

    <!-- Welcome Row -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">
                Welcome back, {{ $user->name }}
            </h2>
            <p>Here's what's happening with your account today.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-sm-6">
            <div class="card p-3 shadow-sm border-0 rounded-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3 bg-brand-soft">
                        <i class="fas fa-coins fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Credits Left</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">
                            {{ $user->credits ?? 0 }}
                        </h3>
                    </div>
                </div>
                <a href="{{ route('settings') }}" class="btn btn-sm btn-outline-brand w-100 mt-3">Buy More</a>
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="card p-3 shadow-sm border-0 rounded-4">
                <div class="d-flex align-items-center">
                    <div class="rounded-circle p-3 me-3 bg-brand-soft">
                        <i class="fas fa-x-ray fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="mb-1">Total Analyses</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">
                            {{ $analyses->count() }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Analyses with DataTable -->
    <div class="card p-4 shadow-sm border-0 rounded-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Recent Analyses</h4>
            <a href="{{ route('analyze.index') }}" class="btn btn-outline-brand text-secondary">
                <i class="fas fa-plus me-2"></i> New Analysis
            </a>
        </div>

        <div class="table-responsive">
            <table id="analysesTable" class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Tracking ID</th>
                        <th>Patient</th>
                        <th>Image</th>
                        <th>Summary</th>
                        <th>Confidence</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($analyses as $analysis)
                    <tr id="row-{{ $analysis->id }}">
                        <td class="text-secondary">{{ $analysis->created_at->format('M d, Y') }}</td>
                        <td class="fw-semibold text-primary">{{ $analysis->tracking_id }}</td>
                        <td class="text-secondary">{{ $analysis->patient_name ?? '—' }}</td>
                        <td>
                            <img src="{{ asset('storage/'.$analysis->image) }}"
                                 class="rounded shadow-sm"
                                 style="width:45px; height:45px; object-fit:cover;">
                        </td>
                        <td>
                            <span class="text-truncate d-inline-block text-secondary" style="max-width: 200px;">
                                {{ Str::limit(trim(preg_replace('/[*#]|-\s/', ' ', $analysis->summary)), 80) }}
                            </span>
                        </td>
                        <td>
                            @if($analysis->confidence >= 80)
                                <span class="badge bg-success">High</span>
                            @elseif($analysis->confidence >= 50)
                                <span class="badge bg-warning text-dark">Medium</span>
                            @else
                                <span class="badge bg-danger">Low</span>
                            @endif
                        </td>
                        <td>
                            @if($analysis->status == 'completed')
                                <span class="badge badge-completed">Completed</span>
                            @else
                                <span class="badge badge-processing">Processing</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <button class="btn btn-sm btn-outline-brand view-detail"
                                        data-id="{{ $analysis->id }}"
                                        title="View Full Details">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <a href="{{ route('analysis.download', $analysis->id) }}"
                                   class="btn btn-sm btn-outline-secondary"
                                   title="Download PDF">
                                    <i class="fas fa-file-pdf"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger delete-analysis"
                                        data-id="{{ $analysis->id }}"
                                        title="Delete Analysis">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- DETAILS MODAL -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">Analysis Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Loaded via JS -->
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .btn-outline-brand {
        border: 1px solid var(--brand);
        color: var(--brand);
        background: transparent;
    }
    .btn-outline-brand:hover {
        background: var(--brand);
        color: #fff;
    }
    .btn-outline-danger {
        border: 1px solid #dc3545;
        color: #dc3545;
        background: transparent;
    }
    .btn-outline-danger:hover {
        background: #dc3545;
        color: #fff;
    }
    .badge-completed {
        background-color: #22c55e;
        color: white;
    }
    .badge-processing {
        background-color: #fbbf24;
        color: #1e293b;
    }
    .bg-brand-soft {
        background: rgba(14, 165, 233, 0.1);
    }
    .text-truncate {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        border-radius: 2rem;
        padding: 0.25rem 0.75rem;
    }
    body.dark-mode .card {
        background-color: #1e293b;
        border-color: #334155;
    }
    body.dark-mode .table-light {
        background-color: #334155;
    }
    body.dark-mode .dataTables_wrapper .dataTables_filter input {
        background-color: #1e293b;
        color: #fff;
        border-color: #4b5563;
    }
    body.dark-mode .modal-content {
        background-color: #1e293b;
        color: #e2e8f0;
        border-color: #334155;
    }
    body.dark-mode .modal-header {
        border-bottom-color: #334155;
    }
    body.dark-mode .modal-header .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
    body.dark-mode .modal-footer {
        border-top-color: #334155;
    }
    body.dark-mode .modal-body .badge {
        color: inherit;
    }
    body.dark-mode .modal-body .text-secondary {
        color: #cbd5e1 !important;
    }
    body.dark-mode .modal-body .text-brand {
        color: var(--brand) !important;
    }
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function () {
    $('#analysesTable').DataTable({
        "paging": true,
        "pageLength": 10,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "language": {
            "search": "",
            "searchPlaceholder": "Search by patient, tracking ID, or summary..."
        },
        "columnDefs": [
            { "orderable": false, "targets": [3, 7] }
        ]
    });

    $('.dataTables_filter input').addClass('form-control form-control-sm');
});

// ── Delete button handler ──
document.addEventListener('click', function (e) {
    const deleteBtn = e.target.closest('.delete-analysis');
    if (!deleteBtn) return;

    if (!confirm('Are you sure you want to delete this analysis? This action cannot be undone.')) return;

    const analysisId = deleteBtn.dataset.id;
    const row = document.getElementById(`row-${analysisId}`);

    fetch(`/analysis/${analysisId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Remove row from DataTable
            const table = $('#analysesTable').DataTable();
            table.row(row).remove().draw(false);
        } else {
            alert('Failed to delete analysis.');
        }
    })
    .catch(err => {
        console.error(err);
        alert('An error occurred.');
    });
});

// ── Modal logic ──
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.view-detail');
    if (!btn) return;

    const analysisId = btn.dataset.id;

    fetch(`/analysis/${analysisId}`)
        .then(response => response.json())
        .then(data => {
            const modalBody = document.getElementById('modalBody');
            const formattedSummary = formatMedicalSummary(data.summary);

            modalBody.innerHTML = `
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="badge bg-primary mb-2">Tracking ID: ${data.tracking_id || '—'}</span>
                        <h6 class="fw-bold mb-0">Patient: ${data.patient_name || 'Not provided'}</h6>
                    </div>
                    <span class="badge bg-success fs-6">Confidence: ${data.confidence}%</span>
                </div>
                <div class="text-center mb-4">
                    <img src="${data.image_url}" class="img-fluid rounded shadow-sm" style="max-height: 300px;">
                </div>
                <h6 class="fw-bold text-brand mb-2">Medical Summary</h6>
                <div class="lh-base">${formattedSummary}</div>
                <hr>
                <span class="small">Date: ${data.date}</span>
            `;

            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        })
        .catch(err => {
            alert('Could not load details.');
        });
});

// ── Markdown to clean HTML (now also handles *italic*) ──
function formatMedicalSummary(text) {
    if (!text) return '';
    const lines = text.split('\n');
    let html = '';
    let inList = false;

    for (let i = 0; i < lines.length; i++) {
        let line = lines[i].trim();
        if (line === '') {
            if (inList) { html += '</ul>'; inList = false; }
            continue;
        }

        if (/^#{3,4}\s+(.*)/.test(line)) {
            if (inList) { html += '</ul>'; inList = false; }
            const headingText = line.replace(/^#{3,4}\s+/, '');
            html += `<h5>${parseInline(headingText)}</h5>`;
            continue;
        }

        if (/^-\s+(.*)/.test(line)) {
            if (!inList) { html += '<ul>'; inList = true; }
            const itemText = line.replace(/^-\s+/, '');
            html += `<li>${parseInline(itemText)}</li>`;
            continue;
        }

        if (inList) { html += '</ul>'; inList = false; }
        html += `<p>${parseInline(line)}</p>`;
    }

    if (inList) { html += '</ul>'; }
    return html;
}

function parseInline(str) {
    str = str.replace(/\*\*(.+?)\*\*/g, '<strong>$1</strong>');
    str = str.replace(/\*(.+?)\*/g, '<em>$1</em>');
    return str;
}
</script>
@endpush