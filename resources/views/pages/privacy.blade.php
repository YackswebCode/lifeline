@extends('layouts.app')

@section('title', 'Privacy Policy - Lifeline')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <div class="badge bg-brand-soft text-dark px-3 py-2 rounded-pill mb-3" style="background: rgba(164,233,252,0.15); color: var(--brand) !important;">
                <i class="fas fa-lock me-2"></i>Privacy
            </div>
            <h1 class="display-4 fw-bold mb-3">Privacy Policy</h1>
            <p class="lead text-muted">Last updated: March 2025</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Main content card -->
            <div class="card border-0 shadow-lg rounded-4 p-4 p-lg-5">
                <!-- Quick navigation -->
                <div class="mb-5">
                    <h5 class="fw-semibold mb-3">Jump to section</h5>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="#introduction" class="btn btn-sm btn-outline-secondary rounded-pill">Introduction</a>
                        <a href="#collection" class="btn btn-sm btn-outline-secondary rounded-pill">Data Collection</a>
                        <a href="#use" class="btn btn-sm btn-outline-secondary rounded-pill">Use of Data</a>
                        <a href="#sharing" class="btn btn-sm btn-outline-secondary rounded-pill">Data Sharing</a>
                        <a href="#security" class="btn btn-sm btn-outline-secondary rounded-pill">Security</a>
                        <a href="#rights" class="btn btn-sm btn-outline-secondary rounded-pill">Your Rights</a>
                        <a href="#cookies" class="btn btn-sm btn-outline-secondary rounded-pill">Cookies</a>
                        <a href="#children" class="btn btn-sm btn-outline-secondary rounded-pill">Children</a>
                        <a href="#changes" class="btn btn-sm btn-outline-secondary rounded-pill">Changes</a>
                        <a href="#contact" class="btn btn-sm btn-outline-secondary rounded-pill">Contact</a>
                    </div>
                </div>

                <!-- Introduction -->
                <section id="introduction" class="mb-5">
                    <h4 class="fw-bold mb-3">Introduction</h4>
                    <p>Lifeline Technologies, Inc. ("we", "us", "our") is committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you use our AI‑powered medical imaging platform (the "Service").</p>
                    <p>Please read this policy carefully. By accessing or using the Service, you acknowledge that you have read, understood, and agree to be bound by all the terms outlined below.</p>
                </section>

                <!-- 1. Information We Collect -->
                <section id="collection" class="mb-5">
                    <h4 class="fw-bold mb-3">1. Information We Collect</h4>
                    <h6 class="fw-semibold">a. Personal Data</h6>
                    <p>When you register for an account, we collect personal information such as your name, email address, professional affiliation (hospital/clinic), and password. We may also collect payment information if you purchase a subscription, though this is processed by our third‑party payment processors.</p>
                    <h6 class="fw-semibold mt-3">b. Medical Image Data</h6>
                    <p>You may upload medical images (X‑rays) for analysis. These images are processed by our AI models to generate findings. We store these images temporarily to provide the Service and for quality improvement, but we do not share them with third parties without your consent, except as required by law.</p>
                    <h6 class="fw-semibold mt-3">c. Usage Data</h6>
                    <p>We automatically collect information about how you interact with the Service, such as your IP address, browser type, pages visited, and timestamps. This helps us improve performance and user experience.</p>
                </section>

                <!-- 2. How We Use Your Information -->
                <section id="use" class="mb-5">
                    <h4 class="fw-bold mb-3">2. How We Use Your Information</h4>
                    <p>We use the collected information for various purposes, including:</p>
                    <ul>
                        <li>To provide, maintain, and improve the Service.</li>
                        <li>To process transactions and send related information (e.g., confirmations, invoices).</li>
                        <li>To communicate with you about updates, support, and promotional offers (you may opt out).</li>
                        <li>To monitor usage and detect, prevent, and address technical issues or fraud.</li>
                        <li>To train and enhance our AI models – only with de‑identified data and after removing personal identifiers.</li>
                    </ul>
                </section>

                <!-- 3. Sharing Your Information -->
                <section id="sharing" class="mb-5">
                    <h4 class="fw-bold mb-3">3. Sharing Your Information</h4>
                    <p>We do not sell, trade, or rent your personal information to third parties. We may share information in the following circumstances:</p>
                    <ul>
                        <li><strong>Service Providers:</strong> With trusted third‑party vendors who assist us in operating the Service (e.g., cloud hosting, payment processing), under strict confidentiality agreements.</li>
                        <li><strong>Legal Requirements:</strong> If required by law or in response to valid requests by public authorities (e.g., court order).</li>
                        <li><strong>Business Transfers:</strong> In connection with a merger, acquisition, or sale of assets, your information may be transferred as part of the transaction.</li>
                    </ul>
                </section>

                <!-- 4. Data Security -->
                <section id="security" class="mb-5">
                    <h4 class="fw-bold mb-3">4. Data Security</h4>
                    <p>We implement appropriate technical and organizational measures to protect your information against unauthorized access, alteration, disclosure, or destruction. These include encryption, access controls, and regular security audits. However, no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee absolute security.</p>
                </section>

                <!-- 5. Your Data Protection Rights -->
                <section id="rights" class="mb-5">
                    <h4 class="fw-bold mb-3">5. Your Data Protection Rights</h4>
                    <p>Depending on your location, you may have the following rights regarding your personal information:</p>
                    <ul>
                        <li><strong>Access:</strong> Request a copy of the data we hold about you.</li>
                        <li><strong>Correction:</strong> Request that we correct inaccurate or incomplete data.</li>
                        <li><strong>Deletion:</strong> Request that we delete your personal data, subject to certain legal exceptions.</li>
                        <li><strong>Restriction:</strong> Request that we restrict processing of your data.</li>
                        <li><strong>Portability:</strong> Request a copy of your data in a machine‑readable format.</li>
                    </ul>
                    <p>To exercise any of these rights, please contact us at <a href="mailto:privacy@lifeline.ai" style="color: var(--brand);">privacy@lifeline.ai</a>.</p>
                </section>

                <!-- 6. Cookies and Tracking Technologies -->
                <section id="cookies" class="mb-5">
                    <h4 class="fw-bold mb-3">6. Cookies and Tracking Technologies</h4>
                    <p>We use cookies and similar tracking technologies to track activity on our Service and hold certain information. Cookies are small data files stored on your device. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, some parts of the Service may not function properly without cookies.</p>
                    <p>We use both session cookies (which expire after you close your browser) and persistent cookies (which remain until deleted).</p>
                </section>

                <!-- 7. Children's Privacy -->
                <section id="children" class="mb-5">
                    <h4 class="fw-bold mb-3">7. Children's Privacy</h4>
                    <p>The Service is not intended for individuals under the age of 18. We do not knowingly collect personal information from children. If you become aware that a child has provided us with personal data, please contact us, and we will take steps to delete such information.</p>
                </section>

                <!-- 8. Changes to This Privacy Policy -->
                <section id="changes" class="mb-5">
                    <h4 class="fw-bold mb-3">8. Changes to This Privacy Policy</h4>
                    <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new policy on this page and updating the "Last updated" date. You are advised to review this policy periodically for any changes. Changes are effective immediately upon posting.</p>
                </section>

                <!-- 9. Contact Us -->
                <section id="contact" class="mb-5">
                    <h4 class="fw-bold mb-3">9. Contact Us</h4>
                    <p>If you have any questions or concerns about this Privacy Policy or our data practices, please contact us at:</p>
                    <div class="d-flex align-items-start mb-3">
                        <div class="bg-brand-soft rounded-circle p-2 me-3" style="background: rgba(164,233,252,0.15);">
                            <i class="fas fa-envelope" style="color: var(--brand);"></i>
                        </div>
                        <div>
                            <a href="mailto:privacy@lifeline.ai" style="color: var(--brand);">privacy@lifeline.ai</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="bg-brand-soft rounded-circle p-2 me-3" style="background: rgba(164,233,252,0.15);">
                            <i class="fas fa-map-marker-alt" style="color: var(--brand);"></i>
                        </div>
                        <div>
                            Lifeline Technologies, Inc.<br>
                            Data Protection Officer<br>
                            15B Admiralty Way, Lekki Phase 1<br>
                            Lagos, Nigeria
                        </div>
                    </div>
                </section>

                <hr class="my-5">
                <p class="text-muted small">This Privacy Policy was last updated on March 1, 2025.</p>
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
        scroll-margin-top: 80px;
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
    body.dark-mode ul li {
        color: var(--text-dark);
    }
</style>
@endpush