@extends('layouts.app')

@section('title', 'Ruvexa Technologies | Digital Solutions')

@section('content')
<style>
    /* ============================================================
       PREMIUM HOMEPAGE STYLES
       ============================================================ */
    
    /* --- Premium Hero Background --- */
    .hero-wrap {
        background: #0B1120;
        position: relative;
        overflow: hidden;
        padding: 160px 0 120px;
        color: white;
    }
    
    /* Subtle grid pattern in the background */
    .hero-wrap::before {
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
    
    /* Glowing orbs */
    .hero-wrap::after {
        content: '';
        position: absolute;
        top: -20%; left: 50%;
        transform: translateX(-50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(11,17,32,0) 60%);
        z-index: 0;
    }

    .hero-content { position: relative; z-index: 1; }
    
    .hero-title {
        font-size: 4.2rem;
        font-weight: 800;
        line-height: 1.1;
        letter-spacing: -1.5px;
        margin-bottom: 24px;
    }
    
    .text-gradient {
        background: linear-gradient(to right, #60A5FA, #A78BFA);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        color: #CBD5E1;
        max-width: 650px;
        margin: 0 auto 40px;
        line-height: 1.7;
    }

    /* Floating Cinematic Image */
    .hero-image-wrapper {
        position: relative;
        margin-top: 60px;
        z-index: 1;
        animation: floatImage 6s ease-in-out infinite;
    }
    
    @keyframes floatImage {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }

    /* Glow behind the image */
    .hero-image-wrapper::before {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        transform: translate(-50%, -50%);
        width: 90%; height: 90%;
        background: var(--primary);
        filter: blur(100px);
        opacity: 0.4;
        z-index: -1;
    }
    
    .hero-image {
        border-radius: 20px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.8), 0 0 40px rgba(37,99,235,0.2);
        border: 1px solid rgba(255,255,255,0.1);
        transform: perspective(1000px) rotateX(4deg);
        transition: transform 0.5s ease;
        width: 100%;
        object-fit: cover;
    }
    
    .hero-image:hover {
        transform: perspective(1000px) rotateX(0deg) translateY(-5px);
    }

    /* --- Tech Stack Icons Section --- */
    .tech-section {
        background: #0F172A;
        padding: 50px 0;
        border-top: 1px solid rgba(255,255,255,0.05);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    .tech-icon {
        font-size: 2.8rem;
        color: #64748B;
        transition: all 0.3s ease;
    }
    .tech-icon:hover {
        color: var(--primary);
        transform: translateY(-8px) scale(1.1);
    }

    /* --- Technical Skills Grid --- */
    .skills-section {
        background-color: #F8FAFC;
        padding: 100px 0;
        border-bottom: 1px solid #E2E8F0;
    }
    
    .skill-card {
        background: white;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        padding: 35px 30px;
        height: 100%;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }
    
    .skill-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; width: 100%; height: 4px;
        background: linear-gradient(90deg, #2563EB, #7C3AED);
        opacity: 0;
        transition: 0.4s;
    }
    
    .skill-card:hover {
        box-shadow: 0 20px 40px -10px rgba(0,0,0,0.08);
        border-color: rgba(37,99,235,0.2);
        transform: translateY(-5px);
    }
    .skill-card:hover::before { opacity: 1; }
    
    .skill-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }
    .skill-list li {
        padding: 12px 0;
        color: #475569;
        font-weight: 500;
        display: flex;
        align-items: center;
        border-bottom: 1px dashed #E2E8F0;
        font-size: 0.95rem;
    }
    .skill-list li:last-child { border-bottom: none; }
    .skill-list li::before {
        content: "▹";
        color: #2563EB;
        margin-right: 12px;
        font-weight: bold;
        font-size: 1.1rem;
    }

    /* --- Professional Service Cards --- */
    .service-card {
        background: white;
        border: 1px solid #E2E8F0;
        border-radius: 20px;
        overflow: hidden;
        height: 100%;
        transition: all 0.4s ease;
    }
    
    .service-card:hover {
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.1);
        border-color: rgba(37,99,235,0.3);
        transform: translateY(-8px);
    }
    
    .service-img-wrapper {
        overflow: hidden;
        height: 220px;
    }
    
    .service-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    
    .service-card:hover .service-img {
        transform: scale(1.08);
    }
    
    .service-body {
        padding: 35px 30px;
    }

    /* --- About Image --- */
    .about-image {
        border-radius: 24px;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.15);
        border: 8px solid white;
        width: 100%;
        object-fit: cover;
        height: 480px;
    }
</style>

<!-- Hero Section -->
<section class="hero-wrap text-center">
    <div class="container hero-content">
        <div class="row justify-content-center">
            <div class="col-lg-10" data-aos="fade-up">
                <span class="badge bg-primary bg-opacity-25 text-white border border-primary border-opacity-50 px-4 py-2 rounded-pill mb-4 fw-bold">
                    ✨ Enterprise Digital Solutions
                </span>
                <h1 class="hero-title">
                    We Build Digital Products That <br>
                    <span class="text-gradient">Define the Future.</span>
                </h1>
                <p class="hero-subtitle mx-auto">
                    Ruvexa Technologies empowers ambitious brands with world-class web development, mobile apps, and digital experiences that convert.
                </p>
                <div class="d-flex flex-column flex-sm-row justify-content-center gap-3 mt-4">
                    <a href="{{ route('contact.index') }}" class="btn btn-primary btn-lg px-5 py-3 fs-6 rounded-pill">Start Your Project</a>
                    <a href="#skills" class="btn btn-outline-light btn-lg px-5 py-3 fs-6 rounded-pill border-opacity-50">Explore Skills</a>
                </div>
            </div>
        </div>

        <!-- Floating Cinematic Image -->
        <div class="row justify-content-center">
            <div class="col-lg-10 hero-image-wrapper" data-aos="fade-up" data-aos-delay="200">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=2070&auto=format&fit=crop" 
                     alt="Ruvexa Cinematic Coding Environment" class="hero-image">
            </div>
        </div>
    </div>
</section>

<!-- Tech Stack Icons Section -->
<section class="tech-section">
    <div class="container text-center">
        <p class="text-secondary mb-4 text-uppercase fw-bold" style="letter-spacing: 2px; font-size: 0.8rem;">Powered by Industry-Leading Technologies</p>
        <div class="d-flex justify-content-center flex-wrap gap-4 gap-md-5">
            <i class="bi bi-filetype-php tech-icon" title="PHP"></i>
            <i class="bi bi-database tech-icon" title="MySQL"></i>
            <i class="bi bi-filetype-js tech-icon" title="JavaScript"></i>
            <i class="bi bi-bootstrap tech-icon" title="Bootstrap"></i>
            <i class="bi bi-git tech-icon" title="Git"></i>
            <i class="bi bi-cloud tech-icon" title="Cloud Hosting"></i>
        </div>
    </div>
</section>

<!-- Technical Skills & Languages Section -->
<section id="skills" class="skills-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase tracking-wide" style="letter-spacing: 1.5px;">Our Expertise</h6>
            <h2 class="display-6 fw-bold mb-3">Technical Skills & Languages</h2>
            <p class="text-secondary mx-auto" style="max-width: 600px;">We use modern, reliable, and scalable technologies to build digital products that stand the test of time.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Backend -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="skill-card text-center">
                    <i class="bi bi-server text-primary fs-1 mb-3 d-block"></i>
                    <h4 class="fw-bold mb-4">Backend</h4>
                    <ul class="skill-list text-start">
                        <li>PHP (Laravel & CodeIgniter)</li>
                        <li>RESTful API Development</li>
                        <li>Node.js</li>
                        <li>MVC Architecture</li>
                    </ul>
                </div>
            </div>
            
            <!-- Frontend -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="skill-card text-center">
                    <i class="bi bi-window-stack text-primary fs-1 mb-3 d-block"></i>
                    <h4 class="fw-bold mb-4">Frontend</h4>
                    <ul class="skill-list text-start">
                        <li>React.js</li>
                        <li>JavaScript & jQuery</li>
                        <li>Bootstrap & Tailwind CSS</li>
                        <li>HTML5 & CSS3</li>
                    </ul>
                </div>
            </div>

            <!-- Database -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="skill-card text-center">
                    <i class="bi bi-database text-primary fs-1 mb-3 d-block"></i>
                    <h4 class="fw-bold mb-4">Database</h4>
                    <ul class="skill-list text-start">
                        <li>MySQL</li>
                        <li>SQL Query Optimization</li>
                        <li>Database Architecture</li>
                        <li>Data Security</li>
                    </ul>
                </div>
            </div>

            <!-- Tools -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="skill-card text-center">
                    <i class="bi bi-tools text-primary fs-1 mb-3 d-block"></i>
                    <h4 class="fw-bold mb-4">Tools & DevOps</h4>
                    <ul class="skill-list text-start">
                        <li>Git & GitHub</li>
                        <li>Postman (API Testing)</li>
                        <li>XAMPP & Composer</li>
                        <li>VS Code</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6" data-aos="fade-right">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=1000&auto=format&fit=crop" 
                     alt="Ruvexa Team Working" class="about-image">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">Who We Are</h6>
                <h2 class="display-6 fw-bold mb-4">Engineering excellence, delivered.</h2>
                <p class="text-secondary mb-4 fs-5" style="line-height: 1.8;">
                    We are a team of dedicated engineers, designers, and strategists. We don't just write code; we partner with you to build robust digital infrastructure that scales with your business.
                </p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-primary fs-5 me-3"></i>
                        <span class="text-dark fw-semibold">Secure & Scalable Architectures</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-primary fs-5 me-3"></i>
                        <span class="text-dark fw-semibold">Modern UI/UX Best Practices</span>
                    </li>
                    <li class="mb-3 d-flex align-items-center">
                        <i class="bi bi-check-circle-fill text-primary fs-5 me-3"></i>
                        <span class="text-dark fw-semibold">Dedicated Post-Launch Support</span>
                    </li>
                </ul>
                
                <!-- Buttons: Learn More & LinkedIn -->
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="/about" class="btn btn-outline-primary rounded-pill px-4 py-2">Learn More About Us</a>
                    <a href="https://www.linkedin.com/in/rupali-sakat-458629433" target="_blank" class="btn btn-outline-dark rounded-pill px-4 py-2 d-flex align-items-center">
                        <i class="bi bi-linkedin me-2 fs-5"></i> Connect on LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5" style="background-color: #F8FAFC;">
    <div class="container py-4">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase tracking-wide" style="letter-spacing: 1.5px;">What We Do</h6>
            <h2 class="display-6 fw-bold mb-3">Solutions built for growth.</h2>
            <p class="text-secondary mx-auto" style="max-width: 600px;">We provide end-to-end solutions, from designing stunning interfaces to engineering robust backend architectures.</p>
        </div>
        
        <div class="row g-4">
            <!-- Web Development -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?q=80&w=800&auto=format&fit=crop" alt="Web Development" class="service-img">
                    </div>
                    <div class="service-body">
                        <h4 class="fw-bold mb-3">Web Development</h4>
                        <p class="text-secondary mb-4" style="line-height: 1.7;">Blazing fast, secure, and scalable web applications built with the latest modern frameworks.</p>
                        <a href="{{ route('contact.index') }}" class="text-primary fw-bold text-decoration-none">Discuss Your Project <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- Mobile App -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?q=80&w=800&auto=format&fit=crop" alt="Mobile App Development" class="service-img">
                    </div>
                    <div class="service-body">
                        <h4 class="fw-bold mb-3">Mobile App Design</h4>
                        <p class="text-secondary mb-4" style="line-height: 1.7;">Native and cross-platform mobile applications that provide seamless experiences on iOS and Android.</p>
                        <a href="{{ route('contact.index') }}" class="text-primary fw-bold text-decoration-none">Discuss Your Project <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            
            <!-- UI/UX -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1586717791821-3f44a563fa4c?q=80&w=800&auto=format&fit=crop" alt="UI UX Design" class="service-img">
                    </div>
                    <div class="service-body">
                        <h4 class="fw-bold mb-3">UI/UX Strategy</h4>
                        <p class="text-secondary mb-4" style="line-height: 1.7;">User-centric design systems that not only look incredible but are proven to increase conversion rates.</p>
                        <a href="{{ route('contact.index') }}" class="text-primary fw-bold text-decoration-none">Discuss Your Project <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEW SECTION: WHY CHOOSE US -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">Why Choose Ruvexa</h6>
            <h2 class="display-6 fw-bold mb-3">Built for Enterprise Standards.</h2>
            <p class="text-secondary mx-auto" style="max-width: 600px;">We don't just write code; we engineer digital assets that are secure, scalable, and designed to drive revenue.</p>
        </div>
        
        <div class="row g-4 text-center">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 rounded-4 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0; transition: 0.3s;">
                    <i class="bi bi-lightning-charge-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Blazing Fast</h5>
                    <p class="text-secondary mb-0 fs-6" style="line-height: 1.6;">Optimized code and caching for lightning-fast load times.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 rounded-4 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0; transition: 0.3s;">
                    <i class="bi bi-shield-lock-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">100% Secure</h5>
                    <p class="text-secondary mb-0 fs-6" style="line-height: 1.6;">Enterprise-grade security and data encryption protocols.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 rounded-4 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0; transition: 0.3s;">
                    <i class="bi bi-phone-fill text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">Fully Responsive</h5>
                    <p class="text-secondary mb-0 fs-6" style="line-height: 1.6;">Flawless performance on desktop, tablet, and mobile.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="p-4 rounded-4 h-100" style="background: #F8FAFC; border: 1px solid #E2E8F0; transition: 0.3s;">
                    <i class="bi bi-headset text-primary fs-1 mb-3"></i>
                    <h5 class="fw-bold">24/7 Support</h5>
                    <p class="text-secondary mb-0 fs-6" style="line-height: 1.6;">Dedicated post-launch maintenance and support.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEW SECTION: TESTIMONIALS -->
<section class="py-5" style="background-color: #F8FAFC;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">Client Success</h6>
            <h2 class="display-6 fw-bold mb-3">Trusted by Businesses</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-secondary fst-italic mb-4" style="line-height: 1.7;">"Ruvexa transformed our manual HR and payroll process into a fully automated web application. The attention to detail and security is unmatched."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">S</div>
                        <div>
                            <h6 class="fw-bold mb-0">Operations Director</h6>
                            <small class="text-muted">Enterprise Client</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-secondary fst-italic mb-4" style="line-height: 1.7;">"The CRM system built by Ruvexa streamlined our entire academy workflow. Enquiries, registrations, and expenses are now in one place."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">A</div>
                        <div>
                            <h6 class="fw-bold mb-0">Academy Founder</h6>
                            <small class="text-muted">GNR Academy</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="text-warning mb-3">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                    </div>
                    <p class="text-secondary fst-italic mb-4" style="line-height: 1.7;">"Rupali and her team delivered our project ahead of schedule. Their technical expertise in Laravel and React is exceptional."</p>
                    <div class="d-flex align-items-center mt-auto">
                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; font-weight: bold;">R</div>
                        <div>
                            <h6 class="fw-bold mb-0">Project Manager</h6>
                            <small class="text-muted">Tech Agency Partner</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NEW SECTION: FAQ -->
<section class="py-5 bg-white">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5" data-aos="fade-up">
                    <h6 class="text-primary fw-bold text-uppercase" style="letter-spacing: 1.5px;">Got Questions?</h6>
                    <h2 class="display-6 fw-bold mb-3">Frequently Asked Questions</h2>
                </div>
                
                <div class="accordion accordion-flush" id="faqAccordion" data-aos="fade-up" data-aos-delay="100">
                    <div class="accordion-item border-bottom py-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                How long does a typical project take?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary" style="line-height: 1.8;">
                                A standard web application takes 4-8 weeks depending on complexity. During our initial discovery phase, we provide a detailed timeline and milestone breakdown so you know exactly what to expect.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-bottom py-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Do you provide post-launch support?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary" style="line-height: 1.8;">
                                Absolutely. We provide dedicated maintenance packages, bug fixing, and feature upgrades to ensure your application scales smoothly and remains secure after launch.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-bottom py-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                How do you handle project communication?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary" style="line-height: 1.8;">
                                We believe in complete transparency. You will have direct access to our team via a dedicated Slack channel or WhatsApp, along with weekly progress reports and staging links to test the application as it's being built.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-bottom py-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold fs-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                What is your pricing model?
                            </button>
                        </h2>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary" style="line-height: 1.8;">
                                We offer both fixed-price contracts for well-defined projects and monthly retainer models for ongoing development. We'll recommend the best approach after understanding your specific business needs during our discovery call.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call To Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);">
    <div class="container py-5 text-center text-white" data-aos="zoom-in">
        <h2 class="display-5 fw-bold mb-4">Ready to build something amazing?</h2>
        <p class="lead mb-5 opacity-75 mx-auto" style="max-width: 600px;">Let's discuss how Ruvexa Technologies can build a digital product that drives your company forward.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold text-primary rounded-pill shadow-lg">
            Let's Talk <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection