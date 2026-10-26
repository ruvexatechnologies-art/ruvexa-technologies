@extends('layouts.app')

@section('title', 'Our Services | Ruvexa Technologies')

@section('content')
<style>
    /* ============================================================
       PREMIUM SERVICES PAGE
       ============================================================ */
    
    /* --- Page Hero --- */
    .services-hero {
        background: #0B1120;
        padding: 160px 0 120px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Subtle grid pattern */
    .services-hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-image: 
            linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
        background-size: 40px 40px;
        mask-image: linear-gradient(to bottom, black 20%, transparent 100%);
        -webkit-mask-image: linear-gradient(to bottom, black 20%, transparent 100%);
        z-index: 0;
    }

    /* Glowing orb */
    .services-hero::after {
        content: '';
        position: absolute;
        top: -20%; left: 50%;
        transform: translateX(-50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(11,17,32,0) 60%);
        z-index: 0;
    }

    .services-hero .container { position: relative; z-index: 1; }
    
    .services-hero h1 {
        font-weight: 800;
        font-size: 3.5rem;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    
    .services-hero p {
        color: #94A3B8;
        font-size: 1.15rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* --- Services Grid --- */
    .services-grid-section {
        background-color: #F8FAFC;
        padding: 100px 0;
    }

    .service-card {
        background: white;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        padding: 40px;
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
    }
    
    /* Top gradient border on hover */
    .service-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, #2563EB, #7C3AED);
        opacity: 0;
        transition: 0.4s;
    }
    
    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.08);
        border-color: transparent;
    }
    .service-card:hover::before {
        opacity: 1;
    }
    
    .service-icon {
        width: 70px; height: 70px;
        background: #EFF6FF;
        color: #2563EB;
        border-radius: 16px;
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem;
        margin-bottom: 30px;
        transition: all 0.4s ease;
    }
    .service-card:hover .service-icon {
        background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);
        color: white;
        transform: scale(1.1) rotate(-5deg);
        box-shadow: 0 10px 20px rgba(37, 99, 235, 0.3);
    }

    .service-card h3 {
        font-weight: 800;
        font-size: 1.4rem;
        color: #0F172A;
        margin-bottom: 15px;
    }

    .service-card p {
        color: #64748B;
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .service-features {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .service-features li {
        color: #475569;
        font-size: 0.95rem;
        margin-bottom: 12px;
        display: flex;
        align-items: flex-start;
    }
    .service-features li i {
        color: #2563EB;
        margin-right: 10px;
        font-size: 1.1rem;
        margin-top: 2px;
    }

    /* --- Process Section --- */
    .process-section {
        background-color: #ffffff;
        padding: 100px 0;
        border-top: 1px solid #E2E8F0;
    }
    
    .process-step {
        position: relative;
        padding-left: 70px;
        margin-bottom: 40px;
    }
    .process-step:last-child {
        margin-bottom: 0;
    }
    
    .process-number {
        position: absolute;
        left: 0;
        top: 0;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);
        border: none;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 1.2rem;
        z-index: 1;
        box-shadow: 0 4px 10px rgba(37,99,235,0.3);
    }
    
    /* The vertical line connecting the steps */
    .process-step::before {
        content: '';
        position: absolute;
        left: 24px;
        top: 50px;
        bottom: -40px;
        width: 2px;
        background: #E2E8F0;
        border-left: 2px dashed #CBD5E1;
    }
    .process-step:last-child::before {
        display: none;
    }

    .process-content {
        padding-top: 10px;
    }
    .process-content h4 {
        font-weight: 700;
        color: #0F172A;
        margin-bottom: 10px;
        font-size: 1.25rem;
    }
    .process-content p {
        color: #64748B;
        margin: 0;
        line-height: 1.7;
    }
</style>

<!-- Hero Section -->
<div class="services-hero">
    <div class="container">
        <h1>Enterprise Services</h1>
        <p>We provide end-to-end digital solutions. From concept and design to development and deployment, we build technology that drives your business forward.</p>
    </div>
</div>

<!-- Core Services Grid -->
<section class="services-grid-section">
    <div class="container">
        <div class="row g-4">
            
            <!-- Service 1: Web Development -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-code-slash"></i></div>
                    <h3>Web Development</h3>
                    <p>Custom, enterprise-grade web applications built with modern frameworks like Laravel and React.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> PHP & Laravel Applications</li>
                        <li><i class="bi bi-check-circle-fill"></i> React.js Frontends</li>
                        <li><i class="bi bi-check-circle-fill"></i> RESTful API Development</li>
                    </ul>
                </div>
            </div>

            <!-- Service 2: Mobile App Design -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-phone"></i></div>
                    <h3>Mobile App Development</h3>
                    <p>Native and cross-platform mobile applications that provide seamless, high-performance experiences.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> iOS & Android Apps</li>
                        <li><i class="bi bi-check-circle-fill"></i> Cross-Platform Solutions</li>
                        <li><i class="bi bi-check-circle-fill"></i> Mobile API Integration</li>
                    </ul>
                </div>
            </div>

            <!-- Service 3: UI/UX Strategy -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-palette"></i></div>
                    <h3>UI/UX Design</h3>
                    <p>User-centric design systems that look incredible, feel intuitive, and are proven to increase conversion rates.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Wireframing & Prototyping</li>
                        <li><i class="bi bi-check-circle-fill"></i> Design Systems</li>
                        <li><i class="bi bi-check-circle-fill"></i> Conversion Optimization</li>
                    </ul>
                </div>
            </div>

            <!-- Service 4: E-Commerce Solutions -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-cart-check"></i></div>
                    <h3>E-Commerce Solutions</h3>
                    <p>Secure, scalable online storefronts with seamless payment gateway integrations and inventory management.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Custom Shopping Carts</li>
                        <li><i class="bi bi-check-circle-fill"></i> Payment Gateways</li>
                        <li><i class="bi bi-check-circle-fill"></i> Order Management</li>
                    </ul>
                </div>
            </div>

            <!-- Service 5: CRM & ERP Systems -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-diagram-3"></i></div>
                    <h3>CRM & ERP Systems</h3>
                    <p>Custom internal tools and data-driven dashboards to manage your operations, employees, and clients.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Custom Admin Dashboards</li>
                        <li><i class="bi bi-check-circle-fill"></i> Role-Based Access Control</li>
                        <li><i class="bi bi-check-circle-fill"></i> Data & Analytics Reporting</li>
                    </ul>
                </div>
            </div>

            <!-- Service 6: SEO & Performance -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <h3>SEO & Performance</h3>
                    <p>Blazing-fast load times and search engine optimization to ensure your website ranks high and converts well.</p>
                    <ul class="service-features">
                        <li><i class="bi bi-check-circle-fill"></i> Speed Optimization</li>
                        <li><i class="bi bi-check-circle-fill"></i> Technical SEO</li>
                        <li><i class="bi bi-check-circle-fill"></i> Database Query Tuning</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Our Process Section -->
<section class="process-section">
    <div class="container">
        <div class="row align-items-center">
            
            <!-- Left Text -->
            <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right">
                <h6 class="text-primary fw-bold text-uppercase mb-2" style="letter-spacing: 1.5px;">How We Work</h6>
                <h2 class="fw-bold mb-4" style="font-size: 2.5rem; color: #0F172A; letter-spacing: -1px;">A proven process for flawless delivery.</h2>
                <p class="text-secondary mb-4" style="line-height: 1.8;">
                    We don't just start writing code. We follow a rigorous, transparent engineering process to ensure your project is delivered on time, within budget, and perfectly aligned with your business goals.
                </p>
                <a href="{{ route('contact.index') }}" class="btn btn-primary px-4 py-3 rounded-3 shadow-sm">Start Your Project</a>
            </div>
            
            <!-- Right Timeline -->
            <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
                
                <div class="process-step">
                    <div class="process-number">1</div>
                    <div class="process-content">
                        <h4>Discovery & Strategy</h4>
                        <p>We analyze your requirements, market, and objectives to define a clear technical roadmap.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-number">2</div>
                    <div class="process-content">
                        <h4>Design & Prototyping</h4>
                        <p>We create intuitive, high-fidelity wireframes and interactive prototypes to visualize the product.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-number">3</div>
                    <div class="process-content">
                        <h4>Development & Testing</h4>
                        <p>Our engineers build your solution using industry best practices, followed by rigorous QA testing.</p>
                    </div>
                </div>

                <div class="process-step">
                    <div class="process-number">4</div>
                    <div class="process-content">
                        <h4>Launch & Support</h4>
                        <p>We deploy your application to production and provide ongoing maintenance and support.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Call To Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);">
    <div class="container py-5 text-center text-white" data-aos="zoom-in">
        <h2 class="display-5 fw-bold mb-4">Have a project in mind?</h2>
        <p class="lead mb-5 opacity-75 mx-auto" style="max-width: 600px;">Let's discuss how Ruvexa Technologies can build a digital product that drives your company forward.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold text-primary rounded-pill shadow-lg">
            Get a Free Quote <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection