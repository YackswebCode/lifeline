@extends('layouts.dashboard')

@section('title', 'Dashboard - Lifeline')

@section('content')
<div class="container-fluid px-0">
    <!-- Welcome Row -->
    <div class="row mb-4">
        <div class="col">
            <h2 class="fw-bold">Welcome back, Dr. Ngozi</h2>
            <p class="text-muted">Here's what's happening with your account today.</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-3 col-sm-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                        <i class="fas fa-coins fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Credits Left</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">10</h3>
                    </div>
                </div>
                <a href="{{ route('settings') }}" class="btn btn-sm btn-outline-brand w-100 mt-3">Buy More</a>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                        <i class="fas fa-x-ray fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Analyses</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">24</h3>
                    </div>
                </div>
                <div class="progress mt-2" style="height: 6px;">
                    <div class="progress-bar bg-brand" style="width: 70%;"></div>
                </div>
                <small class="text-muted">70% of monthly quota</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                        <i class="fas fa-check-circle fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Success Rate</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">92%</h3>
                    </div>
                </div>
                <small class="text-muted">Last 30 days</small>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                        <i class="fas fa-clock fa-xl" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Avg. Response</h6>
                        <h3 class="fw-bold mb-0" style="color: var(--brand);">3.2s</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Analyses -->
    <div class="card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold mb-0">Recent Analyses</h4>
            <a href="{{ route('analyze') }}" class="btn btn-brand">
                <i class="fas fa-plus me-2"></i> New Analysis
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Findings Summary</th>
                        <th>Confidence</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2025-02-20</td>
                        <td><img src="https://via.placeholder.com/40" class="rounded" style="width:40px; height:40px; object-fit:cover;"></td>
                        <td>Opacity in right lower zone</td>
                        <td><span class="badge bg-success">High</span></td>
                        <td><span class="badge badge-completed">Completed</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-brand"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-02-19</td>
                        <td><img src="https://via.placeholder.com/40" class="rounded" style="width:40px; height:40px; object-fit:cover;"></td>
                        <td>Normal study</td>
                        <td><span class="badge bg-success">High</span></td>
                        <td><span class="badge badge-completed">Completed</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-brand"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-02-18</td>
                        <td><img src="https://via.placeholder.com/40" class="rounded" style="width:40px; height:40px; object-fit:cover;"></td>
                        <td>Cardiomegaly suspected</td>
                        <td><span class="badge bg-warning">Medium</span></td>
                        <td><span class="badge badge-processing">Processing</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-brand disabled"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2025-02-17</td>
                        <td><img src="https://via.placeholder.com/40" class="rounded" style="width:40px; height:40px; object-fit:cover;"></td>
                        <td>Pneumonia findings</td>
                        <td><span class="badge bg-success">High</span></td>
                        <td><span class="badge badge-completed">Completed</span></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-brand"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-download"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-brand-soft {
        background: rgba(164,233,252,0.15);
    }
    .btn-outline-brand {
        border: 1px solid var(--brand);
        color: var(--brand);
        background: transparent;
    }
    .btn-outline-brand:hover {
        background: var(--brand);
        color: #1e293b;
    }
    .badge-completed {
        background-color: var(--success);
        color: white;
    }
    .badge-processing {
        background-color: #fbbf24;
        color: #1e293b;
    }
    .progress-bar.bg-brand {
        background-color: var(--brand) !important;
    }
</style>
@endpush