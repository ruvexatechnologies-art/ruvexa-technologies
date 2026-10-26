@extends('layouts.app')

@section('title', 'Our Portfolio | Ruvexa Technologies')

@section('content')
<style>
    /* ============================================================
       ULTRA-PREMIUM PORTFOLIO CARDS
       ============================================================ */
    
    /* --- Page Hero --- */
    .portfolio-hero {
        background: #0B1120;
        padding: 160px 0 120px;
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Subtle grid pattern */
    .portfolio-hero::before {
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
    .portfolio-hero::after {
        content: '';
        position: absolute;
        top: -20%; left: 50%;
        transform: translateX(-50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(11,17,32,0) 60%);
        z-index: 0;
    }

    .portfolio-hero .container { position: relative; z-index: 1; }
    
    .portfolio-hero h1 {
        font-weight: 800;
        font-size: 3.5rem;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    
    .portfolio-hero p {
        color: #94A3B8;
        font-size: 1.15rem;
        max-width: 650px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* --- Portfolio Grid Section --- */
    .portfolio-section {
        background-color: #F8FAFC;
        padding: 100px 0;
    }

    /* --- PREMIUM PROJECT CARDS --- */
    .project-card {
        background: white;
        border-radius: 24px;
        overflow: hidden;
        /* No harsh borders, just a soft, deep shadow */
        border: none;
        box-shadow: 0 4px 20px -2px rgba(0, 0, 0, 0.05);
        transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
    }
    
    .project-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 60px -12px rgba(0, 0, 0, 0.12);
    }

    /* Project Image Container */
    .project-img-wrapper {
        overflow: hidden;
        height: 260px;
        position: relative;
    }
    
    .project-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.7s ease;
    }
    
    .project-card:hover .project-img-wrapper img {
        transform: scale(1.08);
    }

    /* Minimalist Hover Overlay */
    .project-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(to top, rgba(15, 23, 42, 0.8) 0%, rgba(15, 23, 42, 0) 100%);
        display: flex;
        align-items: flex-end;
        padding: 25px;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .project-card:hover .project-overlay {
        opacity: 1;
    }
    
    .project-overlay span {
        color: white;
        font-weight: 700;
        font-size: 0.95rem;
        display: flex;
        align-items: center;
        transform: translateY(10px);
        transition: transform 0.3s ease;
    }
    .project-card:hover .project-overlay span {
        transform: translateY(0);
    }
    .project-overlay span i {
        margin-left: 8px;
        font-size: 1.1rem;
    }

    /* Project Content */
    .project-content {
        padding: 35px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    /* Category Tag */
    .project-category {
        font-size: 0.75rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #2563EB;
        margin-bottom: 12px;
    }

    .project-content h3 {
        font-weight: 800;
        font-size: 1.4rem;
        color: #0F172A;
        margin-bottom: 15px;
        letter-spacing: -0.5px;
    }

    .project-content p {
        color: #64748B;
        font-size: 0.95rem;
        line-height: 1.7;
        margin-bottom: 30px;
        flex-grow: 1;
    }

    /* Tech Tags */
    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 25px;
    }
    
    .tech-tag {
        background: #F1F5F9;
        border: none;
        color: #475569;
        font-size: 0.75rem;
        font-weight: 700;
        padding: 6px 14px;
        border-radius: 50rem; /* Pill shape */
        letter-spacing: 0.5px;
    }

    /* View Project Link */
    .project-link {
        display: inline-flex;
        align-items: center;
        color: #0F172A;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: color 0.2s;
        margin-top: auto;
    }
    .project-link i {
        margin-left: 6px;
        transition: transform 0.2s;
    }
    .project-link:hover {
        color: #2563EB;
    }
    .project-link:hover i {
        transform: translateX(5px);
    }
</style>

<!-- Hero Section -->
<div class="portfolio-hero">
    <div class="container">
        <h1>Our Work</h1>
        <p>Explore our portfolio of enterprise web applications, custom CRM systems, and data-driven platforms designed to solve complex business challenges.</p>
    </div>
</div>

<!-- Portfolio Grid Section -->
<section class="portfolio-section">
    <div class="container">
        <div class="row g-4">
            
            <!-- Project 1: Attendance System -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="project-card">
                    <div class="project-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=800&auto=format&fit=crop" alt="Attendance System">
                        <div class="project-overlay">
                            <span>View Project <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>
                    <div class="project-content">
                        <div class="project-category">Enterprise Software</div>
                        <h3>Attendance & Task Management</h3>
                        <p>A comprehensive workforce management system handling employee attendance, leave tracking, task assignment, and automated payroll calculations.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">Bootstrap</span>
                            <span class="tech-tag">AJAX</span>
                        </div>
                        <a href="{{ route('contact.index') }}" class="project-link">Discuss a Similar Project <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 2: GNR Academy CRM -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="project-card">
                    <div class="project-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?q=80&w=800&auto=format&fit=crop" alt="GNR Academy CRM">
                        <div class="project-overlay">
                            <span>View Project <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>
                    <div class="project-content">
                        <div class="project-category">CRM System</div>
                        <h3>GNR Academy CRM</h3>
                        <p>A custom Customer Relationship Management system for an educational academy to manage student registrations, enquiries, exams, and employee expenses.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">CodeIgniter</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">JavaScript</span>
                        </div>
                        <a href="{{ route('contact.index') }}" class="project-link">Discuss a Similar Project <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Project 3: Society Manager -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="project-card">
                    <div class="project-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=800&auto=format&fit=crop" alt="Society Manager">
                        <div class="project-overlay">
                            <span>View Project <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </div>
                    <div class="project-content">
                        <div class="project-category">Web Application</div>
                        <h3>Society Manager</h3>
                        <p>A secure web application built for housing societies to manage administrative tasks, member data, and secure session-based logins.</p>
                        <div class="tech-tags">
                            <span class="tech-tag">Laravel</span>
                            <span class="tech-tag">PHP</span>
                            <span class="tech-tag">MySQL</span>
                            <span class="tech-tag">MVC</span>
                        </div>
                        <a href="{{ route('contact.index') }}" class="project-link">Discuss a Similar Project <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Call To Action Section -->
<section class="py-5" style="background: linear-gradient(135deg, #2563EB 0%, #4F46E5 100%);">
    <div class="container py-5 text-center text-white" data-aos="zoom-in">
        <h2 class="display-5 fw-bold mb-4">Want to build something similar?</h2>
        <p class="lead mb-5 opacity-75 mx-auto" style="max-width: 600px;">Let's discuss how we can build a custom software solution to automate your business processes.</p>
        <a href="{{ route('contact.index') }}" class="btn btn-light btn-lg px-5 py-3 fw-bold text-primary rounded-pill shadow-lg">
            Start Your Project <i class="bi bi-arrow-right ms-2"></i>
        </a>
    </div>
</section>
@endsection