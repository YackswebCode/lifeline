@extends('layouts.app')

@section('title', 'Login - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <!-- Card with subtle shadow and rounded corners -->
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <!-- Brand icon / logo at the top -->
                <div class="text-center mb-4">
                    <div class="logo mx-auto" style="width: 60px; height: 60px; font-size: 2rem;">L</div>
                    <h3 class="mt-3 fw-bold">Welcome Back</h3>
                    <p class="text-muted small">Sign in to continue to Lifeline</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email field with icon -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0" id="email-icon">
                                <i class="fas fa-envelope" style="color: var(--brand);"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 ps-0" id="email" name="email" placeholder="name@example.com" required autofocus>
                        </div>
                    </div>

                    <!-- Password field with icon -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0" id="password-icon">
                                <i class="fas fa-lock" style="color: var(--brand);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 ps-0" id="password" name="password" placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Remember me and forgot password -->
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label small" for="remember">Remember me</label>
                        </div>
                        <a href="#" class="small text-decoration-none" style="color: var(--brand);">Forgot password?</a>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                        <i class="fas fa-sign-in-alt me-2"></i> Log In
                    </button>
                </form>

                <!-- Divider -->
                <hr class="my-4">

                <!-- Sign up link -->
                <p class="text-center mb-0">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-decoration-none fw-semibold" style="color: var(--brand);">Sign up</a>
                </p>
            </div>

            <!-- Extra info / trust badge -->
            <p class="text-center text-muted small mt-4">
                <i class="fas fa-shield-alt me-1"></i> Protected by enterprise-grade security
            </p>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Additional fine-tuning for the login page */
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