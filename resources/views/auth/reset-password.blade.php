@extends('layouts.app')

@section('title', 'Reset Password - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <div class="text-center mb-4">
                    <img 
                    id="siteLogo"
                    src="{{ asset('images/logo_light.png') }}" 
                    alt="Lifeline Logo" 
                    style="width:80px;height:80px;object-fit:contain;"
                    >
                    <h3 class="mt-3 fw-bold">Set New Password</h3>
                    <p class=" small">Choose a strong password</p>
                </div>

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-envelope" style="color: var(--brand);"></i>
                            </span>
                            <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ $email ?? old('email') }}" required autofocus readonly>
                        </div>
                        @error('email')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">New Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-lock" style="color: var(--brand);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" 
                                   id="password" name="password" placeholder="••••••••" required>
                        </div>
                        @error('password')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0">
                                <i class="fas fa-lock" style="color: var(--brand);"></i>
                            </span>
                            <input type="password" class="form-control border-start-0 ps-0" 
                                   id="password_confirmation" name="password_confirmation" placeholder="••••••••" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                        <i class="fas fa-save me-2"></i> Reset Password
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