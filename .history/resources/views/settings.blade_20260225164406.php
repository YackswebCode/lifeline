@extends('layouts.dashboard')

@section('title', 'Settings - Lifeline')

@section('content')
<div class="row">
    <!-- Side navigation (optional, could use tabs) -->
    <div class="col-md-3 mb-4">
        <div class="card p-3">
            <h6 class="fw-bold mb-3">Quick Links</h6>
            <ul class="nav flex-column nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#profile" data-bs-toggle="pill">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#plan" data-bs-toggle="pill">
                        <i class="fas fa-credit-card me-2"></i>Plan & Billing
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#security" data-bs-toggle="pill">
                        <i class="fas fa-lock me-2"></i>Security
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#notifications" data-bs-toggle="pill">
                        <i class="fas fa-bell me-2"></i>Notifications
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Tab content -->
    <div class="col-md-9">
        <div class="tab-content">
            <!-- Profile Tab -->
            <div class="tab-pane fade show active" id="profile">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-user me-2" style="color: var(--brand);"></i>Profile Information</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-user" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" value="Dr. Jane Doe">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-envelope" style="color: var(--brand);"></i>
                                </span>
                                <input type="email" class="form-control border-start-0" value="jane.doe@hospital.ng">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Organization</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-hospital" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" value="Lagos University Teaching Hospital">
                            </div>
                        </div>
                        <button class="btn btn-brand">Update Profile</button>
                    </form>
                </div>
            </div>

            <!-- Plan & Billing Tab -->
            <div class="tab-pane fade" id="plan">
                <div class="card p-4 mb-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-credit-card me-2" style="color: var(--brand);"></i>Current Plan</h4>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <span class="badge bg-brand text-dark px-3 py-2">Trial</span>
                            <p class="mt-2 mb-0"><strong>10 free analyses remaining</strong></p>
                            <p class="text-muted small">Upgrade to Pro for unlimited analyses and priority support.</p>
                        </div>
                        <a href="#" class="btn btn-brand">Upgrade to Pro</a>
                    </div>
                </div>

                <div class="card p-4">
                    <h5 class="fw-bold mb-3">Billing History</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Feb 1, 2025</td>
                                    <td>Pro Plan</td>
                                    <td>$29</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-brand">Receipt</a></td>
                                </tr>
                                <tr>
                                    <td>Jan 1, 2025</td>
                                    <td>Pro Plan</td>
                                    <td>$29</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><a href="#" class="btn btn-sm btn-outline-brand">Receipt</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Security Tab -->
            <div class="tab-pane fade" id="security">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-lock me-2" style="color: var(--brand);"></i>Change Password</h4>
                    <form>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-lock" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" placeholder="••••••••">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-key" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" placeholder="••••••••">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-check-circle" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" placeholder="••••••••">
                            </div>
                        </div>
                        <button class="btn btn-brand">Update Password</button>
                    </form>
                </div>
            </div>

            <!-- Notifications Tab -->
            <div class="tab-pane fade" id="notifications">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-bell me-2" style="color: var(--brand);"></i>Notification Preferences</h4>
                    <form>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                            <label class="form-check-label" for="emailNotifications">Email notifications for analysis results</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="marketingEmails">
                            <label class="form-check-label" for="marketingEmails">Receive product updates and offers</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="billingAlerts" checked>
                            <label class="form-check-label" for="billingAlerts">Billing alerts and receipts</label>
                        </div>
                        <button class="btn btn-brand">Save Preferences</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .nav-pills .nav-link {
        color: var(--text-light);
        border-radius: 2rem;
        margin-bottom: 0.25rem;
    }
    .nav-pills .nav-link.active {
        background-color: var(--brand);
        color: #1e293b;
    }
    .nav-pills .nav-link i {
        width: 1.5rem;
    }
    .input-group-text {
        border: 1px solid #dee2e6;
        border-right: none;
    }
    .form-control {
        border-left: none;
    }
    .form-control:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 0.2rem rgba(164,233,252,0.25);
    }
    /* Dark mode adjustments */
    body.dark-mode .nav-pills .nav-link {
        color: var(--text-dark);
    }
    body.dark-mode .nav-pills .nav-link.active {
        color: #1e293b;
    }
    body.dark-mode .input-group-text,
    body.dark-mode .form-control {
        background-color: var(--white);
        border-color: #334155;
        color: var(--text-light);
    }
</style>
@endpush