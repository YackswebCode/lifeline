@extends('layouts.dashboard')

@section('title', 'Settings - Lifeline')

@section('content')
<div class="row">
    <!-- Side navigation -->
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
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="tab-content">
            <!-- Profile Tab -->
            <div class="tab-pane fade show active" id="profile">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-user me-2" style="color: var(--brand);"></i>Profile Information</h4>
                    <form method="POST" action="{{ route('settings.profile') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-user" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 @error('name') is-invalid @enderror" 
                                       name="name" value="{{ old('name', $user->name) }}" required>
                            </div>
                            @error('name')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-envelope" style="color: var(--brand);"></i>
                                </span>
                                <input type="email" class="form-control border-start-0 @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', $user->email) }}" required>
                            </div>
                            @error('email')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Organization</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-hospital" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" 
                                       name="organization" value="{{ old('organization', $user->organization) }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-brand">Update Profile</button>
                    </form>
                </div>
            </div>

            <!-- Plan & Billing Tab -->
            <div class="tab-pane fade" id="plan">
                <div class="card p-4 mb-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-credit-card me-2" style="color: var(--brand);"></i>Current Credits</h4>
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div>
                            <div class="display-4 fw-bold" style="color: var(--brand);">{{ $user->credits }}</div>
                            <p class="text-muted">Available credits (1 credit = 1 analysis)</p>
                        </div>
                    </div>
                </div>

                <div class="card p-4">
                    <h5 class="fw-bold mb-3">Buy Credits</h5>
                    <p class="text-muted small">10 credits = 500 NGN. Each analysis consumes 1 credit.</p>
                    <form method="POST" action="{{ route('settings.pay') }}">
                        @csrf
                        <div class="row g-3 align-items-end">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Select Package</label>
                                <select name="credits" class="form-select">
                                    <option value="10">10 credits - 500 NGN</option>
                                    <option value="20">20 credits - 1000 NGN</option>
                                    <option value="50">50 credits - 2500 NGN</option>
                                    <option value="100">100 credits - 5000 NGN</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-brand w-100">
                                    <i class="fas fa-shopping-cart me-2"></i>Pay with Paystack
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="card p-4 mt-4">
                    <h5 class="fw-bold mb-3">Billing History</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Credits</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Reference</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($user->creditPurchases as $purchase)
                                <tr>
                                    <td>{{ $purchase->created_at->format('M j, Y') }}</td>
                                    <td>{{ $purchase->credits }}</td>
                                    <td>{{ number_format($purchase->amount / 100, 2) }} NGN</td>
                                    <td>
                                        @if($purchase->status == 'success')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td><small>{{ $purchase->reference }}</small></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No purchases yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Security Tab -->
            <div class="tab-pane fade" id="security">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-lock me-2" style="color: var(--brand);"></i>Change Password</h4>
                    <form method="POST" action="{{ route('settings.password') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Current Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-lock" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0 @error('current_password') is-invalid @enderror" 
                                       name="current_password" placeholder="••••••••" required>
                            </div>
                            @error('current_password')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-key" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0 @error('new_password') is-invalid @enderror" 
                                       name="new_password" placeholder="••••••••" required>
                            </div>
                            @error('new_password')<span class="text-danger small">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Confirm New Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-check-circle" style="color: var(--brand);"></i>
                                </span>
                                <input type="password" class="form-control border-start-0" 
                                       name="new_password_confirmation" placeholder="••••••••" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">Update Password</button>
                    </form>
                </div>
            </div>

            <!-- Notifications Tab -->
            <div class="tab-pane fade" id="notifications">
                <div class="card p-4">
                    <h4 class="fw-bold mb-3"><i class="fas fa-bell me-2" style="color: var(--brand);"></i>Notification Preferences</h4>
                    <form method="POST" action="{{ route('settings.notifications') }}">
                        @csrf
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="email_notifications" id="emailNotifications" value="1" {{ $user->email_notifications ? 'checked' : '' }}>
                            <label class="form-check-label" for="emailNotifications">Email notifications for analysis results</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="marketing_emails" id="marketingEmails" value="1" {{ $user->marketing_emails ? 'checked' : '' }}>
                            <label class="form-check-label" for="marketingEmails">Receive product updates and offers</label>
                        </div>
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" name="billing_alerts" id="billingAlerts" value="1" {{ $user->billing_alerts ? 'checked' : '' }}>
                            <label class="form-check-label" for="billingAlerts">Billing alerts and receipts</label>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">Save Preferences</button>
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