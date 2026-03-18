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

                @if (session('status') == 'registration-successful')
                    <div class="alert alert-success">Registration successful! We've sent a verification link to your email.</div>
                @endif
                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success">A new verification link has been sent.</div>
                @endif

                <p class="mb-4">Before getting started, please verify your email by clicking the link we sent. If you didn't receive it, we can send another.</p>

                <div class="d-flex justify-content-between align-items-center">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-brand">Resend Verification Email</button>
                    </form>
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary">Log Out</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .btn-brand { background-color: var(--brand); color: white; border-radius: 50px; padding: 0.75rem 1.5rem; }
    .btn-outline-secondary { border-radius: 50px; padding: 0.75rem 1.5rem; }
</style>
@endpush