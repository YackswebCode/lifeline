<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard - Lifeline') - Lifeline</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link id="favicon" rel="icon" href="{{ asset('images/favicon.png') }}" type="image/png">
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
            --sidebar-width: 260px;
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
            overflow-x: hidden;
        }

        /* Dashboard layout */
        .dashboard-wrapper {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--white);
            box-shadow: 2px 0 10px rgba(0,0,0,0.02);
            transition: transform 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1050;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar .logo {
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

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            color: var(--text-light);
            font-weight: 500;
            transition: var(--transition);
            margin: 0.2rem 0.5rem;
            border-radius: 2rem;
        }

        .sidebar .nav-link i {
            margin-right: 0.75rem;
            color: var(--brand);
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(164,233,252,0.1);
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background-color: var(--brand);
            color: #1e293b;
        }

        .sidebar .nav-link.active i {
            color: #1e293b;
        }

        /* Backdrop for mobile sidebar */
        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
            z-index: 1040;
            display: none;
        }

        .sidebar-backdrop.show {
            display: block;
        }

        /* Main content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 2rem;
            transition: margin-left 0.3s ease;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* Top navbar inside main */
        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .mobile-toggle {
            display: none;
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: var(--text-light);
            cursor: pointer;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: var(--brand);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .dark-mode-toggle {
            background: transparent;
            border: none;
            color: var(--text-light);
            font-size: 1.3rem;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .dark-mode-toggle:hover {
            background-color: rgba(164,233,252,0.2);
        }

        /* Cards - ensure equal height */
        .card {
            background-color: var(--white);
            border-radius: var(--card-radius);
            box-shadow: var(--shadow-soft);
            border: none;
            transition: var(--transition);
            height: 100%;
        }
        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px -10px rgba(0,0,0,0.15);
        }

        /* Table responsive */
        .table-responsive {
            border-radius: var(--card-radius);
            overflow-x: auto;
        }

        /* Badge customizations */
        .badge-processing {
            background-color: #fbbf24;
            color: #1e293b;
        }
        .badge-completed {
            background-color: var(--success);
            color: white;
        }
        .badge-failed {
            background-color: var(--danger);
            color: white;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 1rem;
            }
            .mobile-toggle {
                display: block;
            }
            .top-navbar {
                margin-bottom: 1rem;
            }
            /* Make cards full width on mobile with consistent height */
            .row > [class*="col-"] {
                margin-bottom: 1rem;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="dashboard-wrapper">
        <!-- Sidebar Backdrop (mobile only) -->
        <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="d-flex align-items-center gap-2">
                    <img 
                        id="sidebarLogo"
                        src="{{ asset('images/logo_light.png') }}" 
                        alt="Lifeline Logo"
                        style="width:80px;height:80px;object-fit:contain;"
                    >
                    <span class="fw-bold fs-5">Lifeline</span>
                </div>
                <button class="d-md-none btn-close" id="closeSidebar" aria-label="Close sidebar"></button>
            </div>
            <nav class="mt-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('analyze.index') }}" class="nav-link {{ request()->routeIs('analyze.index') ? 'active' : '' }}">
                            <i class="fas fa-upload"></i> Analyze
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('settings') }}" class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item mt-4">
                        <hr>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Top Navbar -->
            <div class="top-navbar">
                <button class="mobile-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="user-menu">
                    <button class="dark-mode-toggle" id="darkModeToggle">
                        <i class="fas fa-moon"></i>
                    </button>
                </div>
            </div>

            <!-- Page Content -->
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
    (function() {
        // ---------- DARK MODE LOGIC (unchanged, but integrated) ----------
        const toggle = document.getElementById('darkModeToggle');
        const icon = toggle.querySelector('i');
        const body = document.body;
        const logo = document.getElementById('sidebarLogo');
        const favicon = document.getElementById('favicon');
        const lightLogo = "{{ asset('images/logo_light.png') }}";
        const darkLogo = "{{ asset('images/logo_dark.png') }}";
        const lightIcon = "{{ asset('images/favicon.png') }}";
        const darkIcon = "{{ asset('images/favicon.png') }}";

        function setTheme(isDark) {
            if (logo) {
                logo.src = isDark ? darkLogo : lightLogo;
            }
            if (favicon) {
                favicon.href = isDark ? darkIcon : lightIcon;
            }
        }

        const savedMode = localStorage.getItem('darkMode');
        if (savedMode === 'enabled') {
            body.classList.add('dark-mode');
            icon.classList.remove('fa-moon');
            icon.classList.add('fa-sun');
            setTheme(true);
        } else {
            setTheme(false);
        }

        toggle.addEventListener('click', () => {
            const isDark = body.classList.toggle('dark-mode');
            if (isDark) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
                localStorage.setItem('darkMode', 'enabled');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
                localStorage.setItem('darkMode', 'disabled');
            }
            setTheme(isDark);
        });

        // ---------- MOBILE SIDEBAR TOGGLE FIX ----------
        // Get DOM elements
        const sidebar = document.getElementById('sidebar');
        const sidebarBackdrop = document.getElementById('sidebarBackdrop');
        const sidebarToggleBtn = document.getElementById('sidebarToggle');
        const closeSidebarBtn = document.getElementById('closeSidebar');
        const mainContent = document.getElementById('mainContent');
        
        // Helper functions to open/close sidebar on mobile
        function openSidebar() {
            if (!sidebar) return;
            sidebar.classList.add('show');
            if (sidebarBackdrop) sidebarBackdrop.classList.add('show');
            // Prevent body scrolling when sidebar is open on mobile (optional but better UX)
            document.body.style.overflow = 'hidden';
        }
        
        function closeSidebar() {
            if (!sidebar) return;
            sidebar.classList.remove('show');
            if (sidebarBackdrop) sidebarBackdrop.classList.remove('show');
            // Restore body scrolling
            document.body.style.overflow = '';
        }
        
        // Toggle sidebar: open if closed, close if open
        function toggleSidebar() {
            if (!sidebar) return;
            if (sidebar.classList.contains('show')) {
                closeSidebar();
            } else {
                openSidebar();
            }
        }
        
        // Event listeners for mobile sidebar controls
        if (sidebarToggleBtn) {
            sidebarToggleBtn.addEventListener('click', toggleSidebar);
        }
        
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', closeSidebar);
        }
        
        if (sidebarBackdrop) {
            sidebarBackdrop.addEventListener('click', closeSidebar);
        }
        
        // Auto-close sidebar on window resize if moving from mobile to desktop (>768px)
        function handleResize() {
            const isDesktop = window.innerWidth > 768;
            if (isDesktop && sidebar && sidebar.classList.contains('show')) {
                // If on desktop and sidebar is forced open (shouldn't happen), close it and remove inline overrides
                closeSidebar();
            }
            // On desktop, ensure backdrop is hidden and body overflow is reset (just in case)
            if (isDesktop) {
                if (sidebarBackdrop) sidebarBackdrop.classList.remove('show');
                document.body.style.overflow = '';
            }
        }
        
        window.addEventListener('resize', handleResize);
        // Initialize on load: make sure any leftover 'show' class is removed on desktop
        handleResize();
        
        // IMPROVEMENT: Close sidebar automatically after clicking any nav link on mobile (better UX)
        const navLinks = document.querySelectorAll('.sidebar .nav-link');
        if (navLinks.length) {
            navLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    // Only auto-close on mobile view (width <= 768) and if sidebar is open
                    if (window.innerWidth <= 768 && sidebar && sidebar.classList.contains('show')) {
                        // Slight delay to allow the click to navigate (no race condition)
                        setTimeout(() => {
                            closeSidebar();
                        }, 50);
                    }
                });
            });
        }
        
        // Edge cases: touch events on backdrop are already covered; ensure that if user clicks outside sidebar content but inside backdrop it closes.
        // Also, ensure that if user opens sidebar and presses browser back? Not needed.
        
        // Additional fix: Escape key closes sidebar when open (accessibility)
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && sidebar && sidebar.classList.contains('show')) {
                closeSidebar();
            }
        });
        
        // Make sure main content doesn't have conflicting styles when sidebar toggles on mobile
        // No additional style needed as CSS handles margin-left via .sidebar.show + main-content margin already set via media query.
        // However, on mobile main-content margin-left is zero, so no shift.
        
        // Debug: ensure that initial state is correct - if JS loads and window is mobile, sidebar starts hidden (no 'show' class)
        // Ensure that backdrop is hidden initially
        if (sidebarBackdrop) sidebarBackdrop.classList.remove('show');
        if (sidebar) sidebar.classList.remove('show');
        document.body.style.overflow = '';
        
        // Also handle potential touchstart interference? Not needed.
    })();
    </script>
    
    @stack('scripts')
</body>
</html>