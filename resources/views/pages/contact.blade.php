@extends('layouts.app')

@section('title', 'Contact Us - Lifeline')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <div class="badge bg-brand-soft text-dark px-3 py-2 rounded-pill mb-3" style="background: rgba(164,233,252,0.15); color: var(--brand) !important;">
                <i class="fas fa-headset me-2"></i>Get in Touch
            </div>
            <h1 class="display-4 fw-bold mb-3">We'd love to hear from you</h1>
            <p class="lead ">Whether you have a question about our AI, need support, or want to partner with us, our team is ready to help.</p>
        </div>
    </div>

    <div class="row g-5">
        <!-- Contact Information -->
        <div class="col-lg-5">
            <h2 class="fw-bold mb-4">Contact Information</h2>
            <p class=" mb-4">Reach out through any of these channels, or use the form. We typically respond within 24 hours.</p>

            <!-- Info Cards -->
            <div class="d-flex align-items-start mb-4">
                <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                    <i class="fas fa-envelope fa-xl" style="color: var(--brand);"></i>
                </div>
                <div>
                    <h5 class="fw-semibold">Email</h5>
                    <a href="mailto:support@lifeline.ai" class="text-decoration-none" style="color: var(--brand);">support@lifeline.ai</a><br>
                    <small class="">For general inquiries & support</small>
                </div>
            </div>

            <div class="d-flex align-items-start mb-4">
                <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                    <i class="fas fa-phone-alt fa-xl" style="color: var(--brand);"></i>
                </div>
                <div>
                    <h5 class="fw-semibold">Phone</h5>
                    <a href="tel:+2348001234567" class="text-decoration-none" style="color: var(--brand);">+234 800 123 4567</a><br>
                    <small class="">Monday–Friday, 9am–5pm WAT</small>
                </div>
            </div>

            <div class="d-flex align-items-start mb-4">
                <div class="bg-brand-soft rounded-circle p-3 me-3" style="background: rgba(164,233,252,0.15);">
                    <i class="fas fa-map-marker-alt fa-xl" style="color: var(--brand);"></i>
                </div>
                <div>
                    <h5 class="fw-semibold">Office</h5>
                    <p class="mb-0">15B Admiralty Way, Lekki Phase 1<br>Lagos, Nigeria</p>
                </div>
            </div>

            <!-- Map Placeholder (static image for now, can be replaced with Google Maps embed) -->
            <div class="mt-4">
                <img src="https://via.placeholder.com/500x250?text=Map+Placeholder" class="img-fluid rounded-4 shadow" alt="Office location map">
            </div>

            <!-- Social Links -->
            <div class="mt-4">
                <h5 class="fw-semibold mb-3">Follow us</h5>
                <div class="d-flex gap-3">
                    <a href="#" class="text-decoration-none" style="color: var(--brand);"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="#" class="text-decoration-none" style="color: var(--brand);"><i class="fab fa-linkedin-in fa-2x"></i></a>
                    <a href="#" class="text-decoration-none" style="color: var(--brand);"><i class="fab fa-github fa-2x"></i></a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-lg rounded-4 p-4 p-lg-5">
                <h3 class="fw-bold mb-4">Send us a message</h3>
                <form>
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-user" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="name" placeholder="John Doe" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-envelope" style="color: var(--brand);"></i>
                                </span>
                                <input type="email" class="form-control border-start-0 ps-0" id="email" placeholder="name@example.com" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label fw-semibold">Subject</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <i class="fas fa-tag" style="color: var(--brand);"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" id="subject" placeholder="How can we help?">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label fw-semibold">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-brand w-100 py-2 fw-semibold">
                                <i class="fas fa-paper-plane me-2"></i> Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Additional CTA (optional) -->
    <div class="row py-5">
        <div class="col-12 text-center">
            <p class="">Prefer email? Write to us at <a href="mailto:support@lifeline.ai" style="color: var(--brand);">support@lifeline.ai</a> and we'll get back to you shortly.</p>
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
    .input-group-text {
        border: 1px solid #dee2e6;
        border-right: none;
        background-color: transparent;
    }
    .form-control {
        border-left: none;
        border-color: #dee2e6;
    }
    .form-control:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 0.2rem rgba(164, 233, 252, 0.25);
    }
    textarea.form-control {
        border-left: 1px solid #dee2e6; /* full border for textarea */
        border-radius: 0.5rem;
    }
    /* Dark mode adjustments */
    body.dark-mode .input-group-text,
    body.dark-mode .form-control {
        background-color: var(--white);
        border-color: #334155;
        color: var(--text-light);
    }
    body.dark-mode .form-control::placeholder {
        color: #94a3b8;
    }
    body.dark-mode textarea.form-control {
        background-color: var(--white);
        border-color: #334155;
    }
</style>
@endpush