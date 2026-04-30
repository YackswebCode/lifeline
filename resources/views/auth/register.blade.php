@extends('layouts.app')

@section('title', 'Register - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <!-- Card with shadow and rounded corners -->
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <!-- Brand icon -->
                <div class="text-center mb-4">
                    <div class="logo mx-auto" style="width: 60px; height: 60px; font-size: 2rem;">L</div>
                    <h3 class="mt-3 fw-bold">Create Your Account</h3>
                    <p class=" small">Join Lifeline and start using AI‑powered X‑ray analysis</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-user" style="color: var(--brand);"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="name" name="name" placeholder="Dr. John Doe" required autofocus>
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-envelope" style="color: var(--brand);"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 ps-0" id="email" name="email" placeholder="name@example.com" required>
                        </div>
                    </div>

                    <!-- Hospital / Clinic (optional) -->
                    <div class="mb-3">
                        <label for="organization" class="form-label fw-semibold">Hospital / Clinic <span class="">(optional)</span></label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-hospital" style="color: var(--brand);"></i>
                            </span>
                            <input type="text" class="form-control border-start-0 ps-0" id="organization" name="organization" placeholder="e.g., Lagos University Teaching Hospital">
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-lock" style="color: var(--brand);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 ps-0" id="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-lock" style="color: var(--brand);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 ps-0" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Consent Checkbox -->
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="consent" name="consent" required>
                        <label class="form-check-label small" for="consent">
                            I agree to the <a href="{{ route('terms') }}" target="_blank" class="text-decoration-none" style="color: var(--brand);">Terms</a> and <a href="{{ route('privacy') }}" target="_blank" class="text-decoration-none" style="color: var(--brand);">Privacy Policy</a>.
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                        <i class="fas fa-user-plus me-2"></i> Sign Up – 10 Free Credits
                    </button>
                </form>

                <!-- Divider -->
                <hr class="my-4">

                <!-- Login link -->
                <p class="text-center mb-0">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: var(--brand);">Log in</a>
                </p>
            </div>

            <!-- Trust badge -->
            <p class="text-center  small mt-4">
                <i class="fas fa-shield-alt me-1"></i> Your data is encrypted and never shared
            </p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .min-vh-75 {
        min-height: 75vh;
    }

    .input-group-text {
        border: 1px solid #dee2e6;
        border-right: none;
        background-color: transparent;
    }

    .form-control {
        border-left: none;
        border-color: #dee2e6;
    }

    .form-control:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 0.2rem rgba(164, 233, 252, 0.25);
    }

    /* Dark mode adjustments */
    body.dark-mode .input-group-text,
    body.dark-mode .form-control {
        background-color: var(--white);
        border-color: #334155;
        color: var(--text-light);
    }

    body.dark-mode .form-control::placeholder {
        color: #94a3b8;
    }

    body.dark-mode .form-check-input {
        background-color: var(--white);
        border-color: #4b5563;
    }
</style>
@endpush