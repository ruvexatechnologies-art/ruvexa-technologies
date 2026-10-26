<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Ruvexa Technologies</title>
    
    <link rel="icon" type="image/jpeg" href="{{ asset('pics/logo.jpeg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    
    <style>
        :root { 
            --sidebar-bg: #0B1120; 
            --sidebar-width: 270px;
            --primary: #4F46E5; 
            --bg-body: #F8FAFC;
        }
        
        /* 1. STOP HORIZONTAL SCROLLING */
        html, body { 
            height: 100%; 
            margin: 0; 
            padding: 0;
            overflow-x: hidden; /* Kills horizontal scroll */
        }
        
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background-color: var(--bg-body); 
            -webkit-font-smoothing: antialiased;
        }

        /* Ultra-thin Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #94A3B8; }
        
        /* --- PREMIUM SIDEBAR --- */
        .sidebar { 
            width: var(--sidebar-width); 
            height: 100vh; 
            position: fixed; 
            top: 0; left: 0; 
            background: var(--sidebar-bg);
            background-image: linear-gradient(180deg, rgba(37,99,235,0.08) 0%, rgba(11,17,32,0) 100%);
            color: #94A3B8; 
            z-index: 1050; 
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
            border-right: 1px solid rgba(255,255,255,0.05);
        }
        
        .sidebar-brand { 
            padding: 25px; 
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none; 
            border-bottom: 1px solid rgba(255,255,255,0.05);
            flex-shrink: 0; /* Prevents logo from squishing */
        }
        .sidebar-brand img {
            width: 45px; height: 45px;
            border-radius: 50%;
            border: 2px solid rgba(255,255,255,0.1);
            background: white;
        }
        .sidebar-brand-text {
            font-size: 1.3rem; 
            font-weight: 800; 
            color: white; 
            line-height: 1.1;
            letter-spacing: -0.5px;
        }
        .sidebar-brand-text span { 
            display: block; 
            font-size: 0.65rem; 
            color: #64748B; 
            font-weight: 700; 
            margin-top: 4px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }
        
        /* Scrollable Navigation inside Sidebar */
        .sidebar-nav {
            flex-grow: 1;
            padding: 20px 15px;
            overflow-y: auto; /* Sidebar scrolls independently */
            display: flex;
            flex-direction: column;
        }

        .nav-section-title {
            font-size: 0.65rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #475569;
            margin: 20px 0 10px 15px;
        }

        .nav-link { 
            color: #94A3B8; 
            padding: 12px 16px; 
            font-weight: 600; 
            font-size: 0.95rem;
            display: flex; 
            align-items: center; 
            gap: 15px; 
            border-radius: 12px;
            margin-bottom: 5px;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link i { font-size: 1.2rem; width: 24px; text-align: center; transition: 0.3s; }
        
        .nav-link:hover { 
            background: rgba(255,255,255,0.04); 
            color: white; 
            transform: translateX(4px);
        }

        .nav-link.active { 
            background: linear-gradient(90deg, rgba(79, 70, 229, 0.15) 0%, rgba(79, 70, 229, 0) 100%);
            color: #818CF8; 
            border-left: 3px solid #4F46E5;
        }
        .nav-link.active i { color: #818CF8; }
        
        /* Sidebar Footer Profile */
        .sidebar-profile {
            padding: 20px;
            border-top: 1px solid rgba(255,255,255,0.05);
            display: flex;
            align-items: center;
            gap: 12px;
            background: rgba(0,0,0,0.2);
            flex-shrink: 0; /* Prevents profile from squishing */
        }
        .sidebar-profile img {
            width: 40px; height: 40px;
            border-radius: 50%;
            background: #4F46E5;
        }

        /* --- MAIN CONTENT (2. Fixed Width to stop horizontal scroll) --- */
        .main-content { 
            margin-left: var(--sidebar-width); 
            width: calc(100% - var(--sidebar-width)); /* Prevents overflow */
            min-height: 100vh; 
            display: flex;
            flex-direction: column;
            transition: 0.3s;
        }
        
        /* --- GLASSMORPHISM TOP NAVBAR --- */
        .top-navbar { 
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            height: 80px; 
            border-bottom: 1px solid #E2E8F0;
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            padding: 0 30px; 
            position: sticky;
            top: 0;
            z-index: 1000;
            flex-shrink: 0;
        }
        
        .search-box {
            background: #F1F5F9;
            border-radius: 50px;
            border: 1px solid transparent;
            transition: 0.3s;
        }
        .search-box:focus-within {
            background: white;
            border-color: #4F46E5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        }

        .profile-area { display: flex; align-items: center; gap: 15px; }
        .profile-avatar {
            width: 42px; height: 42px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4F46E5, #7C3AED);
            color: white;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.1rem;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.3);
        }
        .profile-info h6 { margin: 0; font-weight: 800; font-size: 0.9rem; color: #0F172A; }
        .profile-info small { color: #64748B; font-weight: 600; font-size: 0.75rem; }
        
        /* Page Content */
        .page-content { 
            padding: 30px; 
            flex-grow: 1; 
            overflow-x: hidden; 
        }
        
        /* Mobile */
        .sidebar-backdrop {
            position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(15, 23, 42, 0.6); backdrop-filter: blur(4px);
            z-index: 1040; opacity: 0; visibility: hidden; transition: 0.3s;
        }
        @media (max-width: 991px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; width: 100%; } /* Reset width on mobile */
            .sidebar.active { transform: translateX(0); }
            .sidebar-backdrop.active { opacity: 1; visibility: visible; }
            .profile-info { display: none; }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <a href="/" class="sidebar-brand">
            <img src="{{ asset('pics/logo.jpeg') }}" alt="Logo">
            <div class="sidebar-brand-text">
                Ruvexa.
                <span>Admin Portal</span>
            </div>
        </a>

        <nav class="nav flex-column sidebar-nav">
            <div class="nav-section-title">Main Menu</div>
            
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-envelope-paper-fill"></i> Inquiries
                <span class="badge bg-danger ms-auto rounded-pill" style="font-size:0.6rem;">New</span>
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-briefcase-fill"></i> Projects
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-people-fill"></i> Clients
            </a>

            <div class="nav-section-title">System & Settings</div>
            
            <a class="nav-link" href="#">
                <i class="bi bi-file-earmark-bar-graph-fill"></i> Reports
            </a>
            <a class="nav-link" href="#">
                <i class="bi bi-gear-fill"></i> Settings
            </a>
        </nav>
        
        <!-- Sidebar User Profile -->
        <div class="sidebar-profile">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Admin' }}&background=4F46E5&color=fff" alt="User">
            <div class="flex-grow-1">
                <div class="fw-bold text-white" style="font-size: 0.85rem;">{{ Auth::user()->name ?? 'Admin' }}</div>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger text-decoration-none fw-semibold" style="font-size: 0.75rem;">Sign Out <i class="bi bi-box-arrow-right ms-1"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </div>
        </div>
    </aside>

    <div class="sidebar-backdrop" id="sidebarBackdrop" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div class="main-content">
        
        <header class="top-navbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none shadow-none border-0" onclick="toggleSidebar()">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <div class="d-none d-lg-flex align-items-center search-box px-3 py-2" style="width: 300px;">
                    <i class="bi bi-search text-muted me-2"></i>
                    <input type="text" class="bg-transparent border-0 w-100 shadow-none" placeholder="Search inquiries, clients..." style="outline: none; font-size: 0.9rem;">
                </div>
            </div>
            
            <div class="profile-area">
                <a href="/" target="_blank" class="btn btn-sm btn-primary rounded-pill px-3 fw-bold d-none d-md-flex align-items-center" style="background: #4F46E5; border:none;">
                    <i class="bi bi-globe me-2"></i> View Live Site
                </a>
                <div class="profile-avatar">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</div>
                <div class="profile-info d-none d-sm-block">
                    <h6>{{ Auth::user()->name ?? 'Admin' }}</h6>
                    <small>Administrator</small>
                </div>
            </div>
        </header>

        <main class="page-content">
            @yield('content')
        </main>
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('sidebarBackdrop').classList.toggle('active');
        }
    </script>
    @stack('scripts')
</body>
</html>