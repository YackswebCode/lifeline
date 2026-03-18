@extends('layouts.app')

@section('title', 'Verify Email - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="logo mx-auto" style="width: 60px; height: 60px; font-size: 2rem;">L</div>
                    <h3 class="mt-3 fw-bold">Verify Your Email Address</h3>
                    <p class="text-muted small">Almost there! Please confirm your email to start using Lifeline.</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        A new verification link has been sent to your email address.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="mb-4 text-center">
                    <p class="mb-3">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just sent to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-brand">
                            <i class="fas fa-paper-plane me-2"></i>Resend Verification Email
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fas fa-sign-out-alt me-2"></i>Log Out
                        </button>
                    </form>
                </div>

                <hr class="my-4">

                <p class="text-center text-muted small mb-0">
                    <i class="fas fa-shield-alt me-1"></i> Your email is safe with us.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .min-vh-75 {
        min-height: 75vh;
    }

    .btn-brand {
        background-color: var(--brand);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        transition: all 0.3s ease;
    }

    .btn-brand:hover {
        background-color: var(--brand-dark, #0d8ec4);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-secondary {
        border-radius: 50px;
        padding: 0.75rem 1.5rem;
    }

    /* Dark mode adjustments (if any) */
    body.dark-mode .btn-outline-secondary {
        color: var(--text-light);
        border-color: #4b5563;
    }
</style>
@endpush