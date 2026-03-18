@extends('layouts.app')

@section('title', 'Terms of Service - Lifeline')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <div class="badge bg-brand-soft text-dark px-3 py-2 rounded-pill mb-3" style="background: rgba(164,233,252,0.15); color: var(--brand) !important;">
                <i class="fas fa-file-contract me-2"></i>Legal
            </div>
            <h1 class="display-4 fw-bold mb-3">Terms of Service</h1>
            <p class="lead text-muted">Last updated: March 2025</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Main content card -->
            <div class="card border-0 shadow-lg rounded-4 p-4 p-lg-5">
                <!-- Quick navigation (optional) -->
                <div class="mb-5">
                    <h5 class="fw-semibold mb-3">Jump to section</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#acceptance" class="btn btn-sm btn-outline-secondary rounded-pill">Acceptance</a>
                        <a href="#eligibility" class="btn btn-sm btn-outline-secondary rounded-pill">Eligibility</a>
                        <a href="#services" class="btn btn-sm btn-outline-secondary rounded-pill">Services</a>
                        <a href="#accounts" class="btn btn-sm btn-outline-secondary rounded-pill">Accounts</a>
                        <a href="#privacy" class="btn btn-sm btn-outline-secondary rounded-pill">Privacy</a>
                        <a href="#disclaimers" class="btn btn-sm btn-outline-secondary rounded-pill">Disclaimers</a>
                        <a href="#limitations" class="btn btn-sm btn-outline-secondary rounded-pill">Limitations</a>
                        <a href="#changes" class="btn btn-sm btn-outline-secondary rounded-pill">Changes</a>
                        <a href="#contact" class="btn btn-sm btn-outline-secondary rounded-pill">Contact</a>
                    </div>
                </div>

                <!-- Introduction -->
                <section class="mb-5">
                    <p class="fw-light">Please read these Terms of Service ("Terms", "Terms of Service") carefully before using the Lifeline website and AI analysis platform (the "Service") operated by Lifeline Technologies, Inc. ("us", "we", or "our").</p>
                    <p class="fw-light">Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>
                    <p class="fw-light">By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service.</p>
                </section>

                <!-- 1. Acceptance of Terms -->
                <section id="acceptance" class="mb-5">
                    <h4 class="fw-bold mb-3">1. Acceptance of Terms</h4>
                    <p>By using Lifeline, you agree to these Terms, our Privacy Policy, and any additional terms applicable to certain programs or features. If you are using the Service on behalf of a healthcare organization, you represent that you have the authority to bind that organization.</p>
                </section>

                <!-- 2. Eligibility -->
                <section id="eligibility" class="mb-5">
                    <h4 class="fw-bold mb-3">2. Eligibility</h4>
                    <p>You must be at least 18 years old to use the Service. By agreeing to these Terms, you represent and warrant that you are of legal age and have the full power and authority to enter into this agreement.</p>
                </section>

                <!-- 3. Description of Service -->
                <section id="services" class="mb-5">
                    <h4 class="fw-bold mb-3">3. Description of Service</h4>
                    <p>Lifeline provides an AI‑powered platform that analyzes medical images (specifically chest X‑rays) and generates preliminary findings. The Service is intended to assist licensed healthcare professionals and is not a substitute for professional medical judgment. We do not provide medical advice, diagnosis, or treatment.</p>
                </section>

                <!-- 4. User Accounts -->
                <section id="accounts" class="mb-5">
                    <h4 class="fw-bold mb-3">4. User Accounts</h4>
                    <p>When you create an account with us, you must provide accurate, complete, and current information. You are solely responsible for safeguarding your password and for all activities under your account. You agree to notify us immediately of any unauthorized use.</p>
                </section>

                <!-- 5. Privacy and Data Handling -->
                <section id="privacy" class="mb-5">
                    <h4 class="fw-bold mb-3">5. Privacy and Data Handling</h4>
                    <p>Your use of the Service is also governed by our <a href="{{ route('privacy') }}" style="color: var(--brand);">Privacy Policy</a>, which explains how we collect, use, and protect your personal information. By using Lifeline, you consent to the collection and use of information as described in the Privacy Policy.</p>
                </section>

                <!-- 6. Disclaimers -->
                <section id="disclaimers" class="mb-5">
                    <h4 class="fw-bold mb-3">6. Disclaimers</h4>
                    <p><strong>No Medical Advice:</strong> The Service provides AI‑generated findings that are preliminary in nature. They should not be used as the sole basis for clinical decisions. You must always consult a qualified healthcare provider.</p>
                    <p><strong>As‑Is Basis:</strong> The Service is provided on an "AS IS" and "AS AVAILABLE" basis. We make no warranties, expressed or implied, regarding the accuracy, reliability, or completeness of the output.</p>
                </section>

                <!-- 7. Limitation of Liability -->
                <section id="limitations" class="mb-5">
                    <h4 class="fw-bold mb-3">7. Limitation of Liability</h4>
                    <p>To the maximum extent permitted by law, Lifeline Technologies shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits or revenues, whether incurred directly or indirectly, or any loss of data, use, goodwill, or other intangible losses, resulting from (i) your use or inability to use the Service; (ii) any conduct or content of any third party on the Service.</p>
                </section>

                <!-- 8. Changes to Terms -->
                <section id="changes" class="mb-5">
                    <h4 class="fw-bold mb-3">8. Changes to Terms</h4>
                    <p>We reserve the right to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days' notice prior to any new terms taking effect. By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms.</p>
                </section>

                <!-- 9. Contact Us -->
                <section id="contact">
                    <h4 class="fw-bold mb-3">9. Contact Us</h4>
                    <p>If you have any questions about these Terms, please contact us at:</p>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-brand-soft rounded-circle p-2 me-3" style="background: rgba(164,233,252,0.15);">
                            <i class="fas fa-envelope" style="color: var(--brand);"></i>
                        </div>
                        <div>
                            <a href="mailto:legal@lifeline.ai" style="color: var(--brand);">legal@lifeline.ai</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="bg-brand-soft rounded-circle p-2 me-3" style="background: rgba(164,233,252,0.15);">
                            <i class="fas fa-map-marker-alt" style="color: var(--brand);"></i>
                        </div>
                        <div>
                            Lifeline Technologies, Inc.<br>
                            15B Admiralty Way, Lekki Phase 1<br>
                            Lagos, Nigeria
                        </div>
                    </div>
                </section>

                <!-- Last updated note (repeated) -->
                <hr class="my-5">
                <p class="text-muted small">These Terms of Service were last updated on March 1, 2025.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-brand-soft {
        background: rgba(164,233,252,0.15);
    }
    .rounded-4 {
        border-radius: 1.5rem;
    }
    section {
        scroll-margin-top: 80px; /* offset for sticky nav */
    }
    .btn-outline-secondary {
        border-color: var(--muted);
        color: var(--text-light);
    }
    .btn-outline-secondary:hover {
        background-color: var(--brand);
        border-color: var(--brand);
        color: #1e293b;
    }
    /* Dark mode adjustments */
    body.dark-mode .btn-outline-secondary {
        color: var(--text-dark);
        border-color: #4b5563;
    }
    body.dark-mode .btn-outline-secondary:hover {
        background-color: var(--brand);
        color: #0f172a;
    }
    body.dark-mode .text-muted {
        color: #cbd5e1 !important;
    }
</style>
@endpush