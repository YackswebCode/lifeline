@extends('layouts.app')

@section('title', 'Login - Lifeline')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card p-4">
                <h3 class="text-center mb-4">Welcome Back</h3>
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-brand w-100">Log In</button>
                </form>
                <hr>
                <p class="text-center mb-0">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                <p class="text-center"><a href="#">Forgot password?</a></p>
            </div>
        </div>
    </div>
</div>
@endsection