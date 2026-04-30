@extends('layouts.app')

@section('title', 'Lifeline - AI X-ray Analysis')

@section('content')
<!-- Hero Section -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge bg-brand-soft text-dark mb-3">AI-Powered Medical Imaging</span>
                <h1 class="display-4 fw-bold lh-1 mb-3">Your Health, <span style="color: var(--brand);">Our AI</span></h1>
                <p class="lead text-muted">Accurate, Fast, Reliable</p>
                <p class="mt-4">Upload chest X‑rays and get instant AI‑powered insights to assist clinicians. Secure, private, and always improving.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="{{ route('register') }}" class="btn btn-brand btn-lg px-4">Start Free Trial</a>
                    <a href="" class="btn btn-outline-secondary btn-lg px-4">Try Demo</a>
                </div>
                <p class="mt-3 text-muted"><i class="fas fa-check-circle text-brand me-2"></i>No credit card required · 10 free analyses</p>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                  <img src="{{ asset('images/hero.png') }}" class="img-fluid rounded-4 shadow" alt="X-ray Analysis">
                    <div class="position-absolute bottom-0 start-0 translate-middle-y bg-white p-3 rounded-4 shadow-sm d-none d-lg-block" style="left: 10%;">
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-robot fa-2x" style="color: var(--brand);"></i>
                            <div>
                                <strong>AI Confidence</strong>
                                <div class="progress" style="width: 150px; height: 8px;">
                                    <div class="progress-bar bg-brand" style="width: 95%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features -->
<section class="features-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Why Healthcare Professionals Choose Lifeline</h2>
            <p class="lead text-muted">Powered by cutting-edge AI, designed for clinical workflows.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-bolt fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5 class="fw-bold">Lightning Fast</h5>
                        <p class="text-muted">Results in seconds, so you can focus on patient care.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5 class="fw-bold">HIPAA‑Ready</h5>
                        <p class="text-muted">Enterprise‑grade security and privacy by design.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-lift">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-microscope fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5 class="fw-bold">Med‑Gemma Powered</h5>
                        <p class="text-muted">State‑of‑the‑art model fine‑tuned for radiology.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works py-5 bg-white dark-mode:bg-gray-800">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">How It Works</h2>
            <p class="lead text-muted">Simple, intuitive, and powerful.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number display-1 fw-bold" style="color: var(--brand); opacity: 0.3;">1</div>
                    <div class="step-content mt-3">
                        <div class="step-icon mb-3">
                            <i class="fas fa-cloud-upload-alt fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5>Upload X‑ray</h5>
                        <p class="text-muted small">Drag & drop or select a chest X‑ray image.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number display-1 fw-bold" style="color: var(--brand); opacity: 0.3;">2</div>
                    <div class="step-content mt-3">
                        <div class="step-icon mb-3">
                            <i class="fas fa-brain fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5>AI Analyzes</h5>
                        <p class="text-muted small">Our model processes the image and identifies findings.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number display-1 fw-bold" style="color: var(--brand); opacity: 0.3;">3</div>
                    <div class="step-content mt-3">
                        <div class="step-icon mb-3">
                            <i class="fas fa-file-medical fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5>Get Structured Report</h5>
                        <p class="text-muted small">Receive findings, impression, and confidence score.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="step-card text-center">
                    <div class="step-number display-1 fw-bold" style="color: var(--brand); opacity: 0.3;">4</div>
                    <div class="step-content mt-3">
                        <div class="step-icon mb-3">
                            <i class="fas fa-stethoscope fa-3x" style="color: var(--brand);"></i>
                        </div>
                        <h5>Consult & Decide</h5>
                        <p class="text-muted small">Use insights to support your clinical judgment.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Trusted by healthcare professionals</h2>
            <p class="lead text-muted">Join hundreds of clinicians across Nigeria.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="fst-italic">"Lifeline has cut our preliminary reporting time by half. Incredible tool."</p>
                        <div class="d-flex align-items-center mt-3">
                            <i class="fas fa-user-circle fa-3x me-3" style="color: var(--brand);"></i>
                            <div>
                                <strong>Dr. Ngozi</strong>
                                <p class="text-muted small mb-0">Radiologist, Lagos</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                        </div>
                        <p class="fst-italic">"Very accurate for common findings. Great for triage in busy clinics."</p>
                        <div class="d-flex align-items-center mt-3">
                            <i class="fas fa-user-circle fa-3x me-3" style="color: var(--brand);"></i>
                            <div>
                                <strong>Dr. Ade</strong>
                                <p class="text-muted small mb-0">General Practitioner, Abuja</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star text-warning"></i>
                            <i class="fas fa-star-half-alt text-warning"></i>
                        </div>
                        <p class="fst-italic">"Easy to use and integrates well with our workflow. Highly recommended."</p>
                        <div class="d-flex align-items-center mt-3">
                            <i class="fas fa-user-circle fa-3x me-3" style="color: var(--brand);"></i>
                            <div>
                                <strong>Dr. Chidi</strong>
                                <p class="text-muted small mb-0">Emergency Medicine, Enugu</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section py-5">
    <div class="container">
        <div class="bg-brand-soft rounded-5 p-5 text-center" style="background: linear-gradient(135deg, rgba(164,233,252,0.2) 0%, rgba(142,228,249,0.1) 100%);">
            <h2 class="display-6 fw-bold">Start improving patient outcomes today</h2>
            <p class="lead">Get 10 free analyses – no strings attached.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ route('register') }}" class="btn btn-brand btn-lg px-5">Sign Up Now</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-secondary btn-lg px-5">Contact Sales</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    /* Additional custom styles for landing page */
    .bg-brand-soft {
        background-color: rgba(164, 233, 252, 0.1);
    }
    .hover-lift {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
    }
    .step-number {
        line-height: 1;
        margin-bottom: -1rem;
        font-weight: 800;
    }
    .step-card {
        transition: transform 0.2s;
    }
    .step-card:hover {
        transform: scale(1.02);
    }
    .dark-mode .bg-white {
        background-color: #2d3748 !important;
    }
    .dark-mode .bg-brand-soft {
        background-color: rgba(164, 233, 252, 0.05);
    }
    .badge.bg-brand-soft {
        background-color: rgba(164, 233, 252, 0.2);
        color: var(--brand-dark);
    }
    .progress-bar.bg-brand {
        background-color: var(--brand);
    }
</style>
@endpush