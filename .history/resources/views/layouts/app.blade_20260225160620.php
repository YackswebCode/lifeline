<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Lifeline') - AI X‑ray Analysis</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <style>
        :root {
            --brand: #a4e9fc;
            --brand-dark: #7bcde0;
            --white: #ffffff;
            --bg-light: #f8fafc;
            --bg-dark: #1a202c;
            --text-light: #1e293b;
            --text-dark: #e2e8f0;
            --muted: #6b7280;
            --danger: #dc2626;
            --success: #10b981;
            --card-radius: 1rem;
            --shadow-soft: 0 10px 25px -5px rgba(0,0,0,0.1), 0 8px 10px -6px rgba(0,0,0,0.02);
            --transition: all 0.2s ease;
        }

        body.dark-mode {
            --bg-light: #0f172a;
            --text-light: #e2e8f0;
            --white: #1e293b;
            --muted: #94a3b8;
        }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.3s, color 0.3s;
            line-height: 1.6;
        }

        .navbar {
            background-color: var(--white) !important;
            box-shadow: 0 4px 6px -2px rgba(0,0,0,0.05);
            padding: 0.75rem 1rem;
        }
        .navbar-brand {
            font-weight: 600;
            letter-spacing: -0.02em;
        }
        .logo {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--brand) 0%, #8ee4f9 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
            box-shadow: 0 4px 8px rgba(164,233,252,0.3);
        }
        .nav-link {
            font-weight: 500;
            color: var(--text-light) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 2rem;
            margin: 0 0.2rem;
            transition: var(--transition);
        }
        .nav-link i {
            margin-right: 0.5rem;
            color: var(--brand);
            font-size: 1.1rem;
            transition: var(--transition);
        }
        .nav-link:hover {
            background-color: rgba(164,233,252,0.1);
        }
        .nav-link:hover i {
            transform: scale(1.1);
        }
        .btn-brand {
            background: var(--brand);
            color: #1e293b;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 2rem;
            font-weight: 500;
            transition: var(--transition);
        }
        .btn-brand:hover {
            background: var(--brand-dark);
            color: #0f172a;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(164,233,252,0.3);
        }
        .btn-outline-secondary {
            border: 1px solid var(--muted);
            color: var(--text-light);
            border-radius: 2rem;
            padding: 0.5rem 1.5rem;
            transition: var(--transition);
        }
        .btn-outline-secondary:hover {
            background-color: var(--muted);
            color: white;
            border-color: var(--muted);
        }

        .dark-mode-toggle {
            background: transparent;
            border: none;
            color: var(--text-light);
            font-size: 1.3rem;
            margin-left: 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: var(--transition);
        }
        .dark-mode-toggle:hover {
            background-color: rgba(164,233,252,0.2);
        }

        main {
            min-height: 70vh;
        }

        .card {
            background-color: var(--white);
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-soft);
            border: none;
            transition: var(--transition);
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -10px rgba(0,0,0,0.15);
        }

        .footer {
            background-color: var(--white);
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 3rem 0 2rem;
            margin-top: 4rem;
        }
        .footer a {
            color: var(--muted);
            text-decoration: none;
            transition: var(--transition);
        }
        .footer a:hover {
            color: var(--brand);
        }
        .footer .social-icons i {
            font-size: 1.3rem;
            margin: 0 0.7rem;
            color: var(--muted);
            transition: var(--transition);
        }
        .footer .social-icons i:hover {
            color: var(--brand);
            transform: translateY(-3px);
        }

        @media (max-width: 768px) {
            .navbar-nav {
                margin-top: 1rem;
            }
            .nav-link i {
                margin-right: 0.3rem;
            }
            .dark-mode-toggle {
                margin-left: 0;
                margin-top: 0.5rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    @php
        // For static design, set this to false to hide protected links.
        // Change to true to preview logged‑in state.
        $loggedIn = false;
    @endphp

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('landing') }}">
                <div class="logo">L</div>
                <span class="fw-bold">Lifeline</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <!-- Public: Home always visible -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('landing') }}">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>

                    <!-- Protected links: only shown when logged in -->
                    @if($loggedIn)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('analyze') }}">
                                <i class="fas fa-upload"></i> Analyze
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <i class="fas fa-chart-line"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('settings') }}">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                        </li>
                    @endif

                    <!-- More dropdown (public) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-h"></i> More
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('about') }}"><i class="fas fa-info-circle me-2"></i>About</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}"><i class="fas fa-envelope me-2"></i>Contact</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('terms') }}"><i class="fas fa-file-contract me-2"></i>Terms</a></li>
                            <li><a class="dropdown-item" href="{{ route('privacy') }}"><i class="fas fa-lock me-2"></i>Privacy</a></li>
                        </ul>
                    </li>

                    <!-- Auth buttons: shown when logged out; when logged in, we can show a profile dropdown -->
                    @if(!$loggedIn)
                        <li class="nav-item">
                            <a class="btn btn-brand ms-lg-2" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i> Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-secondary ms-2" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i> Sign Up
                            </a>
                        </li>
                    @else
                        <!-- When logged in, replace with user menu (static for design) -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle"></i> Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('settings') }}"><i class="fas fa-cog me-2"></i>Settings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif

                    <!-- Dark mode toggle (always visible) -->
                    <li class="nav-item">
                        <button class="dark-mode-toggle" id="darkModeToggle">
                            <i class="fas fa-moon"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="py-5">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <div class="logo" style="width: 35px; height: 35px; font-size: 1.1rem;">L</div>
                        <span class="fw-bold fs-5">Lifeline</span>
                    </div>
                    <p class="text-muted small">Your Health, Our AI – Accurate, Fast, Reliable.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-github"></i></a>
                    </div>
                </div>

                <!-- Product links: only shown when logged in -->
                @if($loggedIn)
                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold">Product</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('analyze') }}">Analyze</a></li>
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ route('settings') }}">Settings</a></li>
                    </ul>
                </div>
                @else
                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold">Product</h6>
                    <p class="text-muted small"><a href="{{ route('login') }}">Log in</a> to access AI tools.</p>
                </div>
                @endif

                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold">Company</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="#">Careers</a></li>
                    </ul>
                </div>

                <div class="col-md-4 mb-4">
                    <h6 class="fw-bold">Subscribe</h6>
                    <p class="text-muted small">Get updates on new features and AI advancements.</p>
                    <form class="d-flex">
                        <input type="email" class="form-control me-2" placeholder="Your email">
                        <button class="btn btn-brand" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col text-center text-muted small">
                    &copy; {{ date('Y') }} Lifeline. All rights reserved. 
                    <a href="{{ route('terms') }}">Terms</a> | 
                    <a href="{{ route('privacy') }}">Privacy</a> | 
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Dark mode script -->
    <script>
        (function() {
            const toggle = document.getElementById('darkModeToggle');
            const icon = toggle.querySelector('i');
            const body = document.body;
            const savedMode = localStorage.getItem('darkMode');
            if (savedMode === 'enabled') {
                body.classList.add('dark-mode');
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            }
            toggle.addEventListener('click', () => {
                if (body.classList.contains('dark-mode')) {
                    body.classList.remove('dark-mode');
                    icon.classList.remove('fa-sun');
                    icon.classList.add('fa-moon');
                    localStorage.setItem('darkMode', 'disabled');
                } else {
                    body.classList.add('dark-mode');
                    icon.classList.remove('fa-moon');
                    icon.classList.add('fa-sun');
                    localStorage.setItem('darkMode', 'enabled');
                }
            });
        })();
    </script>
    @stack('scripts')
</body>
</html>