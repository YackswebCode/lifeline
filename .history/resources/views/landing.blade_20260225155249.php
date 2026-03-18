@extends('layouts.app')

@section('title', 'Lifeline - AI X-ray Analysis')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center min-vh-50 py-5">
        <div class="col-lg-6">
            <h1 class="display-4 fw-bold">Your Health, Our AI<br><span style="color: var(--brand);">Accurate, Fast, Reliable</span></h1>
            <p class="lead mt-3">Upload chest X‑rays and get instant AI‑powered insights to assist clinicians. Secure, private, and always improving.</p>
            <div class="mt-4">
                <a href="{{ route('register') }}" class="btn btn-brand btn-lg me-2">Start Free Trial</a>
                <a href="{{ route('analyze') }}" class="btn btn-outline-secondary btn-lg">Try Demo</a>
            </div>
            <div class="mt-3 text-muted">No credit card required · 10 free analyses</div>
        </div>
        <div class="col-lg-6 text-center">
            <!-- Placeholder image / illustration -->
            <img src="https://via.placeholder.com/500x400?text=X-ray+Visualization" class="img-fluid rounded shadow" alt="X-ray">
        </div>
    </div>

    <!-- Features -->
    <div class="row g-4 py-5">
        <h2 class="text-center mb-4">Why Lifeline?</h2>
        <div class="col-md-4">
            <div class="card p-4 h-100">
                <i class="fas fa-bolt fa-2x mb-3" style="color:var(--brand);"></i>
                <h5>Lightning Fast</h5>
                <p class="text-muted">Results in seconds, so you can focus on patient care.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 h-100">
                <i class="fas fa-shield-alt fa-2x mb-3" style="color:var(--brand);"></i>
                <h5>HIPAA‑Ready</h5>
                <p class="text-muted">Enterprise‑grade security and privacy by design.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 h-100">
                <i class="fas fa-microscope fa-2x mb-3" style="color:var(--brand);"></i>
                <h5>Med‑Gemma Powered</h5>
                <p class="text-muted">State‑of‑the‑art model fine‑tuned for radiology.</p>
            </div>
        </div>
    </div>

    <!-- How It Works -->
    <div class="row py-5 bg-white rounded shadow p-4">
        <h2 class="text-center mb-4">How It Works</h2>
        <div class="col-md-3 text-center">
            <div class="display-1 fw-bold" style="color:var(--brand);">1</div>
            <p>Upload X‑ray</p>
        </div>
        <div class="col-md-3 text-center">
            <div class="display-1 fw-bold" style="color:var(--brand);">2</div>
            <p>AI analyzes</p>
        </div>
        <div class="col-md-3 text-center">
            <div class="display-1 fw-bold" style="color:var(--brand);">3</div>
            <p>Get structured report</p>
        </div>
        <div class="col-md-3 text-center">
            <div class="display-1 fw-bold" style="color:var(--brand);">4</div>
            <p>Consult & decide</p>
        </div>
    </div>

    <!-- Testimonials -->
    <div class="row py-5">
        <h2 class="text-center mb-4">Trusted by healthcare professionals</h2>
        <div class="col-md-4">
            <div class="card p-3">
                <p class="fst-italic">"Lifeline has cut our preliminary reporting time by half. Incredible tool."</p>
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                    <div><strong>Dr. Ngozi</strong><br><small>Radiologist, Lagos</small></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <p class="fst-italic">"Very accurate for common findings. Great for triage in busy clinics."</p>
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                    <div><strong>Dr. Ade</strong><br><small>General Practitioner, Abuja</small></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <p class="fst-italic">"Easy to use and integrates well with our workflow. Highly recommended."</p>
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                    <div><strong>Dr. Chidi</strong><br><small>Emergency Medicine, Enugu</small></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="row py-5">
        <div class="col-12 text-center bg-brand-light p-5 rounded" style="background: rgba(164,233,252,0.1);">
            <h3>Start improving patient outcomes today</h3>
            <p class="lead">Get 10 free analyses – no strings attached.</p>
            <a href="{{ route('register') }}" class="btn btn-brand btn-lg">Sign Up Now</a>
        </div>
    </div>
</div>
@endsection