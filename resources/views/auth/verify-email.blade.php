@extends('layouts.app')

@section('title', 'Verify Email - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-75">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <div class="text-center mb-4">
                    <img 
                    id="siteLogo"
                    src="{{ asset('images/logo_light.png') }}" 
                    alt="Lifeline Logo" 
                    style="width:80px;height:80px;object-fit:contain;"
                    >
                    <h3 class="mt-3 fw-bold">Verify Your Email Address</h3>
                    <p class=" small">Almost there! Please confirm your email to start using Lifeline.</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle me-2"></i>
                        A new verification link has been sent to your email.
                    </div>
                @endif

                @if (isset($email))
                    <div class="alert alert-info">
                        <i class="fas fa-envelope me-2"></i>
                        We sent a verification link to <strong>{{ $email }}</strong>. Please check your inbox.
                    </div>
                @else
                    <p class="mb-4">Please enter your email address to receive a verification link.</p>
                @endif

                <form method="POST" action="{{ route('verification.send') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{ old('email', $email ?? '') }}" required>
                    </div>
                    <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                        <i class="fas fa-paper-plane me-2"></i> Resend Verification Email
                    </button>
                </form>

                <hr class="my-4">

                <p class="text-center mb-0">
                    Already verified?
                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold" style="color: var(--brand);">Log in</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .min-vh-75 { min-height: 75vh; }
    .btn-brand {
        background-color: var(--brand);
        color: white;
        border: none;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    .btn-brand:hover {
        background-color: var(--brand-dark);
        transform: translateY(-2px);
    }
</style>
@endpush