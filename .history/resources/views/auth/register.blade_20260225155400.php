@extends('layouts.app')

@section('title', 'Register - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-4">
                <h3 class="text-center mb-4">Create Your Account</h3>
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="organization" class="form-label">Hospital / Clinic (optional)</label>
                        <input type="text" class="form-control" id="organization">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="consent" required>
                        <label class="form-check-label" for="consent">I agree to the <a href="{{ route('terms') }}" target="_blank">Terms</a> and <a href="{{ route('privacy') }}" target="_blank">Privacy Policy</a>.</label>
                    </div>
                    <button type="submit" class="btn btn-brand w-100">Sign Up (10 free credits)</button>
                </form>
                <hr>
                <p class="text-center">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
            </div>
        </div>
    </div>
</div>
@endsection