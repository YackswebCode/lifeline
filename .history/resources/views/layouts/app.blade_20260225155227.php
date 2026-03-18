<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Lifeline') - AI X‑ray Analysis</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome (optional, for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --brand: #a4e9fc; /* SkyBlue */
            --white: #ffffff;
            --muted: #6b7280;
            --danger: #dc2626;
            --success: #10b981;
            --card-radius: .75rem;
            --shadow-soft: 0 6px 18px rgba(10, 27, 44, .06);
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background-color: #f8fafc;
        }

        .site-header {
            background: linear-gradient(90deg, var(--brand) 0%, #8ee4f9 100%);
            color: var(--white);
            padding: 1rem 1.5rem;
            border-radius: var(--card-radius);
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .btn-brand {
            background: var(--brand);
            color: var(--white);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 2rem;
            transition: filter 0.2s;
        }
        .btn-brand:hover {
            filter: brightness(0.95);
            color: white;
        }

        .card {
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-soft);
            border: none;
        }

        .footer {
            background-color: #fff;
            border-top: 1px solid #e9ecef;
            padding: 2rem 0;
            margin-top: 3rem;
        }

        /* logo placeholder */
        .logo {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--brand);
            font-weight: bold;
            font-size: 1.2rem;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('landing') }}">
                <div class="logo">L</div>
                <span class="fw-bold text-dark">Lifeline</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('landing') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('analyze') }}">Analyze</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}">Settings</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">More</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('about') }}">About</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}">Contact</a></li>
                            <li><a class="dropdown-item" href="{{ route('terms') }}">Terms</a></li>
                            <li><a class="dropdown-item" href="{{ route('privacy') }}">Privacy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="btn btn-brand ms-2" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-outline-secondary ms-2" href="{{ route('register') }}">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container text-center text-muted">
            <small>&copy; {{ date('Y') }} Lifeline. Your Health, Our AI – Accurate, Fast, Reliable.</small><br>
            <small><a href="{{ route('terms') }}">Terms</a> | <a href="{{ route('privacy') }}">Privacy</a> | <a href="{{ route('contact') }}">Contact</a></small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>