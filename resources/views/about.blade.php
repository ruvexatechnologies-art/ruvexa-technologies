@extends('layouts.app')

@section('title', 'About Us | Ruvexa Technologies')

@section('content')
<style>
    /* ============================================================
       PREMIUM ABOUT PAGE STYLES
       ============================================================ */
    
    /* --- Page Hero --- */
    .about-hero {
        background: #0F172A;
        padding: 140px 0 100px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Glow Effect */
    .about-hero::before {
        content: '';
        position: absolute;
        top: -50%; left: 50%;
        transform: translateX(-50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(15,23,42,0) 60%);
        z-index: 0;
    }

    .about-hero h1 {
        font-weight: 800;
        font-size: 3.5rem;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
    }
    
    .about-hero p {
        color: #94A3B8;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
        position: relative;
        z-index: 1;
    }

    /* --- Global Section Styles --- */
    .section-padding { padding: 100px 0; }
    
    .section-title {
        font-weight: 800;
        font-size: 2.5rem;
        color: #0F172A;
        letter-spacing: -1px;
        margin-bottom: 24px;
    }
    
    .text-content p {
        color: #475569;
        font-size: 1.05rem;
        line-height: 1.8;
        margin-bottom: 20px;
    }

    /* --- Stats Section --- */
    .stats-section {
        background: white;
        border-bottom: 1px solid #E2E8F0;
        padding: 50px 0;
        margin-top: -40px;
        position: relative;
        z-index: 10;
    }
    .stat-item {
        text-align: center;
        padding: 20px;
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: #2563EB;
        margin-bottom: 5px;
    }
    .stat-label {
        color: #64748B;
        font-weight: 600;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* --- Story Image --- */
    .story-img {
        border-radius: 24px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    /* --- Timeline Section --- */
    .timeline-section {
        background-color: #F8FAFC;
        padding: 100px 0;
        border-top: 1px solid #E2E8F0;
        border-bottom: 1px solid #E2E8F0;
    }
    .timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
        padding-left: 30px;
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 0; top: 0; bottom: 0;
        width: 3px;
        background: #E2E8F0;
    }
    .timeline-item {
        position: relative;
        margin-bottom: 40px;
    }
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -36px; top: 5px;
        width: 15px; height: 15px;
        border-radius: 50%;
        background: #2563EB;
        border: 3px solid #EFF6FF;
    }
    .timeline-year {
        font-weight: 800;
        color: #2563EB;
        font-size: 1.1rem;
        margin-bottom: 5px;
    }
    .timeline-title {
        font-weight: 700;
        color: #0F172A;
        font-size: 1.2rem;
        margin-bottom: 10px;
    }

    /* --- Core Values Cards --- */
    .value-card {
        background: white;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        transition: all 0.3s ease;
    }
    .value-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.08);
        border-color: #2563EB;
    }
    .value-icon {
        width: 60px; height: 60px;
        background: #EFF6FF;
        color: #2563EB;
        border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.6rem;
        margin-bottom: 24px;
    }

    /* --- PREMIUM FOUNDER SECTION --- */
    .founder-section {
        background-color: #ffffff;
        padding: 100px 0;
    }
    
    .founder-image-wrapper {
        position: relative;
        background: linear-gradient(135deg, #E0E7FF 0%, #F3E8FF 100%);
        border-radius: 30px;
        padding: 20px;
        display: inline-block;
        width: 100%;
        max-width: 420px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
    }
    
    .founder-image {
        width: 100%;
        border-radius: 20px;
        display: block;
        object-fit: cover;
    }

    .founder-badge {
        position: absolute;
        bottom: 40px;
        right: -20px;
        background: white;
        padding: 15px 25px;
        border-radius: 12px;
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        border: 1px solid #E2E8F0;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .founder-badge i {
        font-size: 1.5rem;
        color: #2563EB;
    }
    .founder-badge span {
        font-weight: 700;
        color: #0F172A;
        font-size: 0.95rem;
    }

    .founder-role {
        color: #2563EB;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-size: 0.85rem;
        display: block;
        margin-bottom: 10px;
    }
    
    .founder-name {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0F172A;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .founder-quote {
        font-size: 1.15rem;
        color: #475569;
        line-height: 1.8;
        border-left: 4px solid #2563EB;
        padding-left: 20px;
        margin-bottom: 30px;
    }

    .skill-tag {
        display: inline-block;
        background: white;
        border: 1px solid #E2E8F0;
        color: #334155;
        font-weight: 600;
        font-size: 0.85rem;
        padding: 8px 16px;
        border-radius: 8px;
        margin: 0 8px 8px 0;
        box-shadow: 0 2px 5px rgba(0,0,0,0.02);
    }
    .skill-tag.primary {
        background: #EFF6FF;
        border-color: #BFDBFE;
        color: #1D4ED8;
    }

    .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 45px; height: 45px;
        border-radius: 50%;
        background: white;
        color: #475569;
        font-size: 1.2rem;
        text-decoration: none;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        margin-right: 10px;
        transition: all 0.3s;
        border: 1px solid #E2E8F0;
    }
    .social-btn:hover {
        background: #2563EB;
        color: white;
        border-color: #2563EB;
        transform: translateY(-3px);
    }
</style>

<!-- Hero Section -->
<div class="about-hero">
    <div class="container">
        <h1>We Are Ruvexa.</h1>
        <p>Your Vision. Our Technology. We are a team of passionate engineers dedicated to building software that drives real business growth.</p>
    </div>
</div>

<!-- Stats Section (New Addition for Social Proof) -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <h2 class="stat-number">100%</h2>
                    <p class="stat-label">Custom Code</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <h2 class="stat-number">10+</h2>
                    <p class="stat-label">Tech Stacks</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <h2 class="stat-number">24/7</h2>
                    <p class="stat-label">Support</p>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-item">
                    <h2 class="stat-number">Pune</h2>
                    <p class="stat-label">Based In</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1000&auto=format&fit=crop" 
                     alt="Modern Tech Office" class="story-img">
            </div>
            <div class="col-lg-6 text-content" data-aos="fade-left">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1.5px;">Our Story</h6>
                <h2 class="section-title">Engineering Excellence, Delivered.</h2>
                <p>
                    Founded in Pune, Ruvexa Technologies was born out of a simple idea: to bridge the gap between complex business challenges and elegant, scalable technology. 
                </p>
                <p>
                    We don't just write code; we partner with ambitious brands to build robust digital infrastructure. Whether it's a complex enterprise web application, a custom CRM, or a dynamic mobile experience, we bring your vision to life with precision and modern engineering practices.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary rounded-pill px-4 py-2">Work With Us</a>
                    <a href="/portfolio" class="btn btn-outline-dark rounded-pill px-4 py-2">View Portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section (New Addition for Enterprise Feel) -->
<section class="timeline-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">Our Process</h6>
            <h2 class="section-title">How We Deliver Excellence</h2>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">Phase 1</div>
                <div class="timeline-title">Discovery & Strategy</div>
                <p class="text-secondary">We dive deep into your business logic, identify bottlenecks, and map out a clear technical roadmap before writing a single line of code.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-year">Phase 2</div>
                <div class="timeline-title">Architecture & Design</div>
                <p class="text-secondary">We design the database schema, system architecture, and UI/UX wireframes to ensure the application is scalable and user-friendly.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                <div class="timeline-year">Phase 3</div>
                <div class="timeline-title">Agile Development</div>
                <p class="text-secondary">Our engineers build your application using modern frameworks (Laravel, React), following strict security and performance standards.</p>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                <div class="timeline-year">Phase 4</div>
                <div class="timeline-title">Launch & Support</div>
                <p class="text-secondary">After rigorous QA testing, we deploy your application to the cloud and provide dedicated post-launch maintenance and scaling support.</p>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="section-padding bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">What Drives Us</h6>
            <h2 class="section-title">Our Core Values</h2>
            <p class="text-secondary mx-auto" style="max-width: 600px;">The principles that guide every line of code we write and every project we deliver.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-lightbulb"></i></div>
                    <h4 class="fw-bold mb-3">Innovation</h4>
                    <p class="text-secondary mb-0">We stay ahead of the curve by using the latest technologies like Laravel, React, and modern cloud architectures to build future-proof solutions.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                    <h4 class="fw-bold mb-3">Transparency</h4>
                    <p class="text-secondary mb-0">No hidden fees, no confusing jargon. We maintain clear, open communication with our clients from the first discovery call to post-launch support.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="value-card">
                    <div class="value-icon"><i class="bi bi-code-square"></i></div>
                    <h4 class="fw-bold mb-3">Excellence</h4>
                    <p class="text-secondary mb-0">We are obsessed with clean, maintainable code and pixel-perfect UI. We don't settle for "it works"—we strive for "it's exceptional."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PREMIUM FOUNDER PROFILE -->
<section class="founder-section" style="background-color: #F8FAFC; border-top: 1px solid #E2E8F0;">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <!-- Founder Image -->
            <div class="col-lg-5 text-center text-lg-start" data-aos="fade-right">
                <div class="founder-image-wrapper">
                    <!-- Your Exact Image Path -->
                    <img src="{{ asset('pics/rupali.png') }}" 
                         alt="Rupali Sakat - Founder" class="founder-image">
                    
                    <!-- Floating Badge -->
                    <div class="founder-badge">
                        <i class="bi bi-patch-check-fill"></i>
                        <span>B.Tech CSE</span>
                    </div>
                </div>
            </div>
            
            <!-- Founder Info -->
            <div class="col-lg-7" data-aos="fade-left">
                <span class="founder-role">Founder & Lead Developer</span>
                <h2 class="founder-name">Rupali Sakat</h2>
                
                <p class="founder-quote">
                    "I believe that great software is born at the intersection of robust engineering and intuitive design. I founded Ruvexa Technologies to help businesses translate complex operational needs into seamless digital experiences. We don't just deliver code; we deliver a strategic advantage."
                </p>

                <p class="text-secondary" style="line-height: 1.7; margin-bottom: 30px;">
                    With a B.Tech in Computer Science and hands-on experience building enterprise-grade systems, I personally oversee the architecture, security, and technical quality of every project we ship.
                </p>
                
                <!-- Skills -->
                <div class="mb-4">
                    <span class="skill-tag primary">PHP</span>
                    <span class="skill-tag primary">Laravel</span>
                    <span class="skill-tag primary">React.js</span>
                    <span class="skill-tag primary">MySQL</span>
                    <span class="skill-tag">CodeIgniter</span>
                    <span class="skill-tag">JavaScript</span>
                    <span class="skill-tag">REST APIs</span>
                </div>

                <!-- Social Links -->
                <div class="mt-4">
                    <a href="https://www.linkedin.com/in/rupali-sakat-458629433" target="_blank" class="social-btn" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="https://github.com/rupalisakat" target="_blank" class="social-btn" title="GitHub">
                        <i class="bi bi-github"></i>
                    </a>
                    <a href="mailto:ruvexatechnologies@gmail.com" class="social-btn" title="Email">
                        <i class="bi bi-envelope-fill"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call To Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);">
    <div class="container py-5 text-center text-white" data-aos="zoom-in">
        <h2 class="display-5 fw-bold mb-4">Ready to work with us?</h2>
        <p class="lead mb-5 opacity-75 mx-auto" style="max-width: 600px;">Let's discuss how Ruvexa Technologies can build a digital product that drives your company forward.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold text-primary rounded-pill shadow-lg">
            Get in Touch <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection