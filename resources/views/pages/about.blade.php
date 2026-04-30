@extends('layouts.app')

@section('title', 'About Us - Lifeline')

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <div class="badge bg-brand-soft text-dark px-3 py-2 rounded-pill mb-3" style="background: rgba(164,233,252,0.15); color: var(--brand) !important;">
                <i class="fas fa-heartbeat me-2"></i>Our Mission
            </div>
            <h1 class="display-4 fw-bold mb-3">Democratizing Medical Imaging <span style="color: var(--brand);">with AI</span></h1>
            <p class="lead ">We believe every clinician, regardless of location, should have access to intelligent tools that enhance diagnostic accuracy and speed.</p>
        </div>
    </div>

    <!-- Story & Image -->
    <div class="row align-items-center g-5 py-4">
        <div class="col-lg-6">
            <h2 class="fw-bold mb-3">Our Story</h2>
            <p class="">Founded in 2025 by a team of radiologists, engineers, and AI researchers, Lifeline was born from a simple observation: many healthcare facilities lack immediate access to expert radiologists. Meanwhile, AI models had reached a level where they could provide meaningful preliminary insights.</p>
            <p class="">We partnered with teaching hospitals in Nigeria to fine‑tune Med‑Gemma on local data, ensuring the model understands diverse pathologies and image qualities. Today, Lifeline is used by clinics across West Africa, reducing report turnaround times and helping doctors make faster decisions.</p>
            <div class="mt-4">
                <div class="d-flex align-items-center gap-3">
                    <div>
                        <i class="fas fa-map-marker-alt fa-2x" style="color: var(--brand);"></i>
                    </div>
                    <div>
                        <strong>Headquarters</strong><br>
                        <span class="">Lagos, Nigeria</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="https://via.placeholder.com/600x400?text=Team+Photo" class="img-fluid rounded-4 shadow-lg" alt="Lifeline team">
        </div>
    </div>

    <!-- Core Values -->
    <div class="row py-5">
        <h2 class="text-center fw-bold mb-5">Our Core Values</h2>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-hand-holding-heart fa-3x" style="color: var(--brand);"></i>
                </div>
                <h5>Patient First</h5>
                <p class="">Every line of code is written with the patient's well‑being in mind. We prioritize safety and accuracy.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-flask fa-3x" style="color: var(--brand);"></i>
                </div>
                <h5>Continuous Innovation</h5>
                <p class="">We partner with researchers to keep our models at the forefront of medical AI.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card h-100 p-4 text-center">
                <div class="mb-3">
                    <i class="fas fa-lock fa-3x" style="color: var(--brand);"></i>
                </div>
                <h5>Privacy by Design</h5>
                <p class="">Your data is encrypted and never used for purposes other than analysis without consent.</p>
            </div>
        </div>
    </div>

    <!-- Team Section (Placeholder) -->
    <div class="row py-5 bg-white rounded-4 shadow p-4 mb-5">
        <h2 class="text-center fw-bold mb-5">Meet the Minds Behind Lifeline</h2>
        <div class="col-md-3 col-6 mb-4">
            <div class="text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid mb-3" style="width:120px; height:120px; object-fit:cover;">
                <h6>Dr. Ngozi Okonkwo</h6>
                <p class="small ">Co‑founder, Chief Radiologist</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid mb-3" style="width:120px; height:120px; object-fit:cover;">
                <h6>Chidi Eze</h6>
                <p class="small ">Co‑founder, Lead AI Engineer</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid mb-3" style="width:120px; height:120px; object-fit:cover;">
                <h6>Adaobi Okafor</h6>
                <p class="small ">Product Manager</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="text-center">
                <img src="https://via.placeholder.com/150" class="rounded-circle img-fluid mb-3" style="width:120px; height:120px; object-fit:cover;">
                <h6>Dr. Adebayo Sanni</h6>
                <p class="small ">Clinical Advisor</p>
            </div>
        </div>
    </div>

    <!-- Stats -->
    <div class="row text-center py-5">
        <div class="col-md-3 col-6 mb-4">
            <div class="display-4 fw-bold" style="color: var(--brand);">20+</div>
            <p class="">Hospitals</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="display-4 fw-bold" style="color: var(--brand);">5k+</div>
            <p class="">Analyses</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="display-4 fw-bold" style="color: var(--brand);">10+</div>
            <p class="">Radiologists</p>
        </div>
        <div class="col-md-3 col-6 mb-4">
            <div class="display-4 fw-bold" style="color: var(--brand);">24/7</div>
            <p class="">Support</p>
        </div>
    </div>

    <!-- CTA -->
    <div class="row py-4">
        <div class="col-12 text-center">
            <div class="p-5 rounded-4" style="background: rgba(164,233,252,0.1);">
                <h3 class="fw-bold">Join us in shaping the future of medical imaging</h3>
                <p class="lead ">Get started with 10 free analyses – no credit card required.</p>
                <a href="{{ route('register') }}" class="btn btn-brand btn-lg px-5">Sign Up Now</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Additional about page customizations */
    .bg-brand-soft {
        background: rgba(164,233,252,0.15);
    }
    .rounded-4 {
        border-radius: 1.5rem;
    }
    /* Dark mode adjustments for the white background sections */
    body.dark-mode .bg-white {
        background-color: var(--white) !important;
    }
    body.dark-mode . {
        color: #cbd5e1 !important;
    }
    body.dark-mode .card {
        background-color: var(--white);
    }
</style>
@endpush