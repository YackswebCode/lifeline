@extends('layouts.app')

@section('title', 'Forgot Password - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <div class="text-center mb-4">
                    <div class="logo mx-auto" style="width: 60px; height: 60px; font-size: 2rem;">L</div>
                    <h3 class="mt-3 fw-bold">Reset Password</h3>
                    <p class="text-muted small">Enter your email to receive a reset link</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-envelope" style="color: var(--brand);"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus>
                        </div>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                        <i class="fas fa-paper-plane me-2"></i> Send Reset Link
                    </button>
                </form>

                <hr class="my-4">

                <p class="text-center mb-0">
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: var(--brand);">
                        <i class="fas fa-arrow-left me-1"></i> Back to Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .min-vh-75 { min-height: 75vh; }
    .input-group-text { border: 1px solid #dee2e6; border-right: none; background-color: transparent; }
    .form-control { border-left: none; border-color: #dee2e6; }
    .form-control:focus { border-color: var(--brand); box-shadow: 0 0 0 0.2rem rgba(164, 233, 252, 0.25); }
    .btn-brand {
        background-color: var(--brand);
        color: white;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-brand:hover {
        background-color: var(--brand-dark, #0d8ec4);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    body.dark-mode .input-group-text,
    body.dark-mode .form-control {
        background-color: var(--white);
        border-color: #334155;
        color: var(--text-light);
    }
    body.dark-mode .form-control::placeholder { color: #94a3b8; }
</style>
@endpush