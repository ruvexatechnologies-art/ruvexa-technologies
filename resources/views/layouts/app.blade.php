<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ruvexa Technologies | Digital Solutions')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('pics/logo.jpeg') }}">

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563EB;
            --primary-hover: #1d4ed8;
            --dark: #0B1120;
            --gray: #64748B;
        }

        html { scroll-behavior: smooth; }
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #0F172A;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            background-color: #ffffff;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F1F5F9; }
        ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--primary); }

        /* --- Scroll Progress Bar --- */
        .scroll-progress {
            position: fixed;
            top: 0; left: 0;
            width: 0%; height: 3px;
            background: linear-gradient(90deg, var(--primary), #7C3AED);
            z-index: 9999;
            transition: width 0.1s ease;
        }

        /* --- Premium Dynamic Navbar --- */
        .navbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 20px 0;
        }
        
        /* Shrink effect on scroll */
        .navbar.scrolled {
            padding: 10px 0;
            background: rgba(255, 255, 255, 0.95);
            box-shadow: 0 10px 30px -10px rgba(0,0,0,0.08);
        }
        
        /* Brand & Logo */
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
        }
        
        .brand-logo-wrapper {
            position: relative;
            width: 50px; height: 50px;
            border-radius: 50%;
            background: white;
            display: flex; align-items: center; justify-content: center;
            box-shadow: 0 4px 15px rgba(37,99,235,0.15);
            transition: all 0.4s ease;
            border: 1px solid #E2E8F0;
        }
        .navbar-brand:hover .brand-logo-wrapper {
            box-shadow: 0 8px 25px rgba(37,99,235,0.3);
            transform: translateY(-2px);
        }
        .brand-logo-img {
            width: 100%; height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .brand-text-wrapper {
            display: flex;
            flex-direction: column;
        }
        .brand-name {
            font-weight: 800;
            font-size: 1.4rem;
            letter-spacing: -0.5px;
            line-height: 1.1;
            color: #0F172A;
        }
        .brand-name span { color: var(--primary); }
        .brand-tagline {
            font-size: 0.65rem;
            color: #64748B;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            margin-top: 2px;
        }
        
        /* Nav Links with Icons */
        .nav-link {
            font-weight: 600;
            color: #475569;
            font-size: 0.95rem;
            padding: 8px 16px !important;
            transition: 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
        }
        .nav-link i {
            font-size: 1.1rem;
            margin-right: 6px;
            transition: 0.3s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary) !important;
        }
        .nav-link:hover i, .nav-link.active i {
            color: var(--primary);
            transform: translateY(-2px);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0; left: 16px;
            width: 0; height: 2px;
            background: var(--primary);
            transition: 0.3s ease;
        }
        .nav-link:hover::after, .nav-link.active::after {
            width: calc(100% - 32px);
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #4F46E5 100%);
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
            background: linear-gradient(135deg, var(--primary-hover) 0%, #4338CA 100%);
        }

        /* --- Premium Footer --- */
        .footer {
            background-color: var(--dark);
            color: #94A3B8;
            padding: 90px 0 30px;
            position: relative;
            overflow: hidden;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        
        /* Glowing background effect in footer */
        .footer::before {
            content: '';
            position: absolute;
            bottom: -20%; left: 20%;
            width: 800px; height: 800px;
            background: radial-gradient(circle, rgba(37,99,235,0.08) 0%, rgba(11,17,32,0) 60%);
            border-radius: 50%;
            pointer-events: none;
        }

        .footer h5 {
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 24px;
            position: relative;
            display: inline-block;
        }
        
        /* Footer Links with Icons */
        .footer a {
            color: #94A3B8;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            padding: 8px 0;
            font-size: 0.95rem;
        }
        .footer a i {
            font-size: 0.9rem;
            margin-right: 10px;
            color: #475569;
            transition: all 0.3s ease;
        }
        .footer a:hover {
            color: #60A5FA;
            transform: translateX(5px);
        }
        .footer a:hover i {
            color: #60A5FA;
        }

        /* Social Icons */
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 42px; height: 42px;
            border-radius: 12px;
            background: rgba(255,255,255,0.03);
            color: #E2E8F0;
            margin-right: 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255,255,255,0.05);
            text-decoration: none;
        }
        .social-icon:hover {
            background: var(--primary);
            border-color: var(--primary);
            transform: translateY(-4px);
            color: white;
            box-shadow: 0 10px 20px rgba(37,99,235,0.3);
        }

        /* Newsletter Input */
        .newsletter-box {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 6px;
            display: flex;
            transition: all 0.3s ease;
        }
        .newsletter-box:focus-within {
            border-color: #60A5FA;
            background: rgba(255,255,255,0.05);
        }
        .newsletter-box input {
            background: transparent;
            border: none;
            color: white;
            padding: 10px 15px;
            width: 100%;
            outline: none;
            font-size: 0.9rem;
        }
        .newsletter-box input::placeholder { color: #64748B; }
        .newsletter-box button {
            background: var(--primary);
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .newsletter-box button:hover { background: var(--primary-hover); }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.05);
            margin-top: 60px;
            padding-top: 30px;
            font-size: 0.9rem;
            position: relative;
        }
        
        /* Space for fixed navbar */
        main { padding-top: 90px; min-height: 80vh; }

        /* --- Floating Action Buttons --- */
        #backToTop {
            position: fixed;
            bottom: 30px; right: 30px;
            width: 50px; height: 50px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.4s ease;
            z-index: 1000;
            box-shadow: 0 10px 20px rgba(37,99,235,0.3);
        }
        #backToTop.show { opacity: 1; visibility: visible; transform: translateY(0); }
        #backToTop:hover { background: var(--primary-hover); transform: translateY(-5px); }

        .whatsapp-float {
            position: fixed;
            bottom: 90px; right: 30px;
            width: 50px; height: 50px;
            background-color: #25D366;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.4);
            z-index: 1000;
            transition: all 0.3s ease;
            animation: pulse-whatsapp 2s infinite;
            text-decoration: none;
        }
        .whatsapp-float:hover {
            background-color: #128C7E;
            color: white;
            transform: scale(1.1);
        }
        @keyframes pulse-whatsapp {
            0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
            100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
        }

        /* Mobile adjustments */
        @media (max-width: 991px) {
            .whatsapp-float { bottom: 90px; right: 20px; width: 45px; height: 45px; font-size: 1.4rem; }
            #backToTop { bottom: 30px; right: 20px; width: 45px; height: 45px; font-size: 1.2rem; }
        }
    </style>
</head>
<body>

    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <!-- Navbar Logo & Brand -->
            <a class="navbar-brand" href="/">
                <div class="brand-logo-wrapper">
                    <img src="{{ asset('pics/logo.jpeg') }}" alt="Ruvexa Logo" class="brand-logo-img">
                </div>
                <div class="brand-text-wrapper">
                    <span class="brand-name">Ruvexa<span>.</span></span>
                    <span class="brand-tagline">Technologies</span>
                </div>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/"><i class="bi bi-house-door"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about"><i class="bi bi-info-circle"></i> About Us</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('services') ? 'active' : '' }}" href="/services"><i class="bi bi-gear"></i> Services</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('portfolio') ? 'active' : '' }}" href="/portfolio"><i class="bi bi-briefcase"></i> Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="/contact"><i class="bi bi-envelope"></i> Contact</a></li>
                </ul>
                
                <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary"><i class="bi bi-grid-1x2 me-2"></i> Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> Log in</a>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary"><i class="bi bi-rocket-takeoff me-2"></i> Get Started</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Premium Footer -->
    <footer class="footer">
        <div class="container position-relative">
            <div class="row g-5">
                
                <!-- Brand Column -->
                <div class="col-lg-4 pe-lg-5">
                    <a class="navbar-brand mb-4 d-flex align-items-center gap-3" href="/" style="text-decoration: none;">
                        <div class="brand-logo-wrapper" style="width: 55px; height: 55px; box-shadow: none; border-color: rgba(255,255,255,0.1); background: white;">
                            <img src="{{ asset('pics/logo.jpeg') }}" alt="Ruvexa Logo" class="brand-logo-img">
                        </div>
                        <div class="brand-text-wrapper">
                            <span class="brand-name" style="color: white; font-size: 1.5rem;">Ruvexa<span style="color: var(--primary);">.</span></span>
                            <span class="brand-tagline" style="color: #64748B;">Your Vision. Our Technology.</span>
                        </div>
                    </a>
                    <p class="mb-4" style="line-height: 1.8; font-size: 0.95rem;">We craft high-performance digital experiences that drive business growth. From web applications to brand identity, we bring your vision to life.</p>
                    
                    <!-- Social Icons -->
                    <div class="d-flex flex-wrap gap-2">
                        <a href="https://wa.me/919881956134?text=Hi%20Ruvexa%20Technologies" target="_blank" class="social-icon" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                        <a href="https://instagram.com/ruvexatechnologies" target="_blank" class="social-icon" title="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-icon" title="GitHub"><i class="bi bi-github"></i></a>
                        <a href="#" class="social-icon" title="Twitter / X"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
                
                <!-- Links Column -->
                <div class="col-lg-2 col-md-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="/about"><i class="bi bi-chevron-right"></i> About Us</a></li>
                        <li><a href="/portfolio"><i class="bi bi-chevron-right"></i> Our Work</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Careers</a></li>
                        <li><a href="#"><i class="bi bi-chevron-right"></i> Blog</a></li>
                    </ul>
                </div>
                
                <!-- Services Column -->
                <div class="col-lg-2 col-md-4">
                    <h5>Services</h5>
                    <ul class="list-unstyled">
                        <li><a href="/services"><i class="bi bi-code-slash"></i> Web Development</a></li>
                        <li><a href="/services"><i class="bi bi-phone"></i> Mobile Apps</a></li>
                        <li><a href="/services"><i class="bi bi-palette"></i> UI/UX Design</a></li>
                        <li><a href="/services"><i class="bi bi-graph-up-arrow"></i> SEO Optimization</a></li>
                    </ul>
                </div>

                <!-- Contact Column & Newsletter -->
                <div class="col-lg-4 col-md-4">
                    <h5>Stay Updated</h5>
                    <p style="font-size: 0.9rem; margin-bottom: 15px;">Subscribe to our newsletter for the latest tech insights.</p>
                    <form class="newsletter-box mb-4">
                        <input type="email" placeholder="Enter your email" required>
                        <button type="button"><i class="bi bi-send"></i> Subscribe</button>
                    </form>

                    <ul class="list-unstyled mt-4">
                        <li class="mb-3 d-flex">
                            <i class="bi bi-geo-alt-fill text-primary me-3 fs-5"></i>
                            <span style="font-size: 0.95rem;">Narhe, Pune<br>Maharashtra 411041</span>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="bi bi-envelope-fill text-primary me-3 fs-5"></i>
                            <a href="mailto:ruvexatechnologies@gmail.com" class="p-0" style="font-size: 0.95rem;">ruvexatechnologies@gmail.com</a>
                        </li>
                        <li class="mb-3 d-flex">
                            <i class="bi bi-telephone-fill text-primary me-3 fs-5"></i>
                            <a href="tel:+919881956134" class="p-0" style="font-size: 0.95rem;">+91 98819 56134</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center">
                <p class="mb-2 mb-md-0">&copy; {{ date('Y') }} Ruvexa Technologies. All rights reserved.</p>
                <div class="d-flex gap-4">
                    <a href="#" class="p-0"><i class="bi bi-shield-check me-1"></i> Privacy Policy</a>
                    <a href="#" class="p-0"><i class="bi bi-file-earmark-text me-1"></i> Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/919881956134?text=Hi%20Ruvexa%20Technologies,%20I%20have%20a%20project%20inquiry." target="_blank" class="whatsapp-float" title="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Back to Top Button -->
    <button id="backToTop" aria-label="Back to top">
        <i class="bi bi-arrow-up-short fs-3"></i>
    </button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({ duration: 800, once: true });

        // Scroll Progress Bar & Dynamic Navbar
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById("scrollProgress").style.width = scrolled + "%";

            const navbar = document.getElementById("mainNavbar");
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }

            const backToTop = document.getElementById("backToTop");
            if (window.scrollY > 300) {
                backToTop.classList.add("show");
            } else {
                backToTop.classList.remove("show");
            }
        });

        document.getElementById("backToTop").addEventListener("click", function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
</body>
</html>