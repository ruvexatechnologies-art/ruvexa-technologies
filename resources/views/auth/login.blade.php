<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Login | Ruvexa Technologies</title>
    
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
            --dark: #0F172A;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            height: 100vh;
            margin: 0;
            background-color: #ffffff;
            overflow: hidden; 
        }

        .login-wrapper {
            display: flex;
            height: 100vh;
            width: 100vw;
        }

        /* --- LEFT PANEL (Cinematic Branding) --- */
        .login-left {
            flex: 1;
            background-color: #0B1120;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 50px;
            color: white;
        }

        /* Glowing Mesh Gradients */
        .login-left::before {
            content: '';
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(11,17,32,0) 70%);
            top: -100px; left: -100px;
            border-radius: 50%;
            z-index: 0;
        }
        .login-left::after {
            content: '';
            position: absolute;
            width: 500px; height: 500px;
            background: radial-gradient(circle, rgba(124,58,237,0.1) 0%, rgba(11,17,32,0) 70%);
            bottom: -100px; right: -100px;
            border-radius: 50%;
            z-index: 0;
        }

        /* Tech Grid Overlay */
        .grid-overlay {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: 
                linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: 0;
            mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
            -webkit-mask-image: linear-gradient(to bottom, black 40%, transparent 100%);
        }

        .login-left-content {
            position: relative;
            z-index: 1;
        }

        /* Logo */
        .brand-logo {
            display: flex;
            align-items: center;
            gap: 15px;
            text-decoration: none;
            color: white;
            transition: transform 0.3s;
        }
        .brand-logo:hover { transform: translateY(-2px); color: white; }
        
        .brand-logo img {
            width: 55px; height: 55px;
            border-radius: 50%;
            object-fit: cover;
            background-color: white;
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        
        .brand-text-wrapper { display: flex; flex-direction: column; }
        .brand-name { font-weight: 800; font-size: 1.4rem; letter-spacing: -0.5px; line-height: 1.2; }
        .brand-tagline { font-size: 0.75rem; color: #94A3B8; font-weight: 500; letter-spacing: 0.5px; margin-top: 2px; }

        /* Hero Text */
        .hero-text h1 {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
        }
        .text-gradient {
            background: linear-gradient(to right, #60A5FA, #A78BFA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .hero-text p {
            color: #94A3B8;
            font-size: 1.1rem;
            max-width: 450px;
            line-height: 1.7;
        }

        /* --- RIGHT PANEL (The Form) --- */
        .login-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            background: #ffffff;
            position: relative;
            z-index: 2;
            box-shadow: -10px 0 30px rgba(0,0,0,0.02);
        }

        .login-form-wrapper {
            width: 100%;
            max-width: 400px;
        }

        /* Back to Home */
        .back-home {
            position: absolute;
            top: 30px; left: 30px;
            color: #64748B;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            transition: color 0.2s;
        }
        .back-home:hover { color: var(--primary); }

        .form-header h2 {
            font-weight: 800;
            font-size: 2.2rem;
            color: var(--dark);
            letter-spacing: -1px;
            margin-bottom: 8px;
        }
        .form-header p {
            color: #64748B;
            font-size: 0.95rem;
            margin-bottom: 35px;
        }

        /* Inputs */
        .input-group-custom {
            position: relative;
            margin-bottom: 20px;
        }
        .input-group-custom .input-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #94A3B8;
            font-size: 1.1rem;
            transition: color 0.3s;
        }
        .form-control {
            padding: 15px 20px 15px 50px;
            border-radius: 12px;
            border: 1.5px solid #E2E8F0;
            background-color: #F8FAFC;
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--dark);
            transition: all 0.3s ease;
        }
        .form-control:focus {
            background-color: white;
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }
        .form-control:focus + .input-icon { color: var(--primary); }

        .password-toggle {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94A3B8;
            transition: color 0.2s;
        }
        .password-toggle:hover { color: var(--dark); }

        /* Submit Button */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, #4F46E5 100%);
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(37, 99, 235, 0.4);
            background: linear-gradient(135deg, var(--primary-hover) 0%, #4338CA 100%);
        }
        .btn-primary:disabled {
            opacity: 0.7;
            transform: none;
            cursor: not-allowed;
        }

        /* Checkbox */
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        /* Trust Badges */
        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            padding-top: 25px;
            border-top: 1px solid #E2E8F0;
        }
        .trust-badge {
            color: #94A3B8;
            font-size: 0.75rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .trust-badge i { color: #10B981; font-size: 1rem; }

        /* Responsive */
        @media (max-width: 991px) {
            .login-left { display: none; }
            .login-right { flex: 1; padding: 20px; }
            .back-home { top: 20px; left: 20px; }
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    
    <!-- Left Side: Branding -->
    <div class="login-left">
        <div class="grid-overlay"></div>
        
        <a href="/" class="brand-logo login-left-content" data-aos="fade-down" data-aos-duration="800">
            <img src="{{ asset('pics/logo.jpeg') }}" alt="Ruvexa Technologies Logo">
            <div class="brand-text-wrapper">
                <span class="brand-name">Ruvexa Technologies</span>
                <span class="brand-tagline">Your Vision. Our Technology.</span>
            </div>
        </a>

        <div class="hero-text login-left-content" data-aos="fade-right" data-aos-delay="200" data-aos-duration="800">
            <h1>Secure Access to <br><span class="text-gradient">Your Dashboard.</span></h1>
            <p>Log in to manage your projects, communicate with our engineering team, and track your business growth securely.</p>
        </div>

        <div class="login-left-content" style="color: #475569; font-size: 0.85rem;" data-aos="fade-up" data-aos-delay="400">
            &copy; {{ date('Y') }} Ruvexa Technologies. All rights reserved.
        </div>
    </div>

    <!-- Right Side: Login Form -->
    <div class="login-right">
        
        <a href="/" class="back-home"><i class="bi bi-arrow-left me-2"></i> Back to Website</a>

        <div class="login-form-wrapper" data-aos="fade-left" data-aos-delay="100" data-aos-duration="800">
            
            <!-- Mobile Logo -->
            <div class="text-center mb-5 d-lg-none">
                <a href="/" class="brand-logo justify-content-center" style="color: var(--dark);">
                    <img src="{{ asset('pics/logo.jpeg') }}" alt="Ruvexa Technologies Logo" style="width: 50px; height: 50px; border: 1px solid #E2E8F0;">
                    <div class="brand-text-wrapper text-start">
                        <span class="brand-name" style="color: var(--dark); font-size: 1.2rem;">Ruvexa Technologies</span>
                        <span class="brand-tagline" style="color: #64748B;">Your Vision. Our Technology.</span>
                    </div>
                </a>
            </div>

            <div class="form-header">
                <h2>Sign In</h2>
                <p>Enter your credentials to access your account.</p>
            </div>

            <!-- Session Error Message -->
            @if ($errors->any())
                <div class="alert alert-danger mb-4 rounded-3 border-0 py-2" style="font-size: 0.9rem;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> 
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif

            <!-- Session Status (Success Message) -->
            @if(session('status'))
                <div class="alert alert-success mb-4 rounded-3 border-0 py-2" style="font-size: 0.9rem;">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" id="loginForm">
                @csrf
                
                <!-- Email Input -->
                <div class="input-group-custom" data-aos="fade-up" data-aos-delay="200">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="admin@ruvexa.com" required autofocus autocomplete="email">
                    <i class="bi bi-envelope input-icon"></i>
                </div>

                <!-- Password Input -->
                <div class="input-group-custom" data-aos="fade-up" data-aos-delay="300">
                    <input type="password" name="password" id="passwordInput" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••" required autocomplete="current-password">
                    <i class="bi bi-lock input-icon"></i>
                    <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="d-flex justify-content-between align-items-center mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label text-secondary fw-medium" for="remember" style="font-size: 0.85rem;">
                            Keep me signed in
                        </label>
                    </div>
                    <a href="#" class="text-primary text-decoration-none fw-semibold" style="font-size: 0.85rem;">Forgot password?</a>
                </div>

                <!-- Submit Button with Loading State -->
                <button type="submit" class="btn btn-primary" id="submitBtn" data-aos="fade-up" data-aos-delay="500">
                    <span id="btnText">Sign In to Dashboard</span>
                    <i class="bi bi-arrow-right" id="btnIcon"></i>
                </button>
            </form>
            
            <p class="text-center text-secondary mt-4 fw-medium" style="font-size: 0.9rem;" data-aos="fade-up" data-aos-delay="600">
                Don't have an account? <a href="{{ route('contact.index') }}" class="text-primary fw-bold text-decoration-none">Contact Sales</a>
            </p>

            <div class="trust-badges" data-aos="fade-up" data-aos-delay="700">
                <div class="trust-badge"><i class="bi bi-shield-check"></i> 256-bit SSL Secure</div>
                <div class="trust-badge"><i class="bi bi-headset"></i> 24/7 Support</div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS
    AOS.init({ once: true });

    // Password Visibility Toggle
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#passwordInput');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

    // Loading State for Submit Button (Professional Touch)
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');
    const btnText = document.getElementById('btnText');
    const btnIcon = document.getElementById('btnIcon');

    form.addEventListener('submit', function() {
        submitBtn.disabled = true;
        btnText.textContent = "Authenticating...";
        btnIcon.className = "spinner-border spinner-border-sm";
    });
</script>

</body>
</html>