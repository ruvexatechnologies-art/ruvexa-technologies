@extends('layouts.app')

@section('title', 'Contact Us | Ruvexa Technologies')

@section('content')
<style>
    /* ============================================================
       PREMIUM CONTACT PAGE
       ============================================================ */
    
    /* --- Page Hero --- */
    .contact-hero {
        background: #0B1120;
        padding: 160px 0 180px; 
        color: white;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    
    /* Subtle grid pattern */
    .contact-hero::before {
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
    .contact-hero::after {
        content: '';
        position: absolute;
        top: -20%; left: 50%;
        transform: translateX(-50%);
        width: 800px; height: 800px;
        background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, rgba(11,17,32,0) 60%);
        z-index: 0;
    }

    .contact-hero .container { position: relative; z-index: 1; }
    
    .contact-hero h1 {
        font-weight: 800;
        font-size: 3.5rem;
        letter-spacing: -1.5px;
        margin-bottom: 20px;
    }
    
    .contact-hero p {
        color: #94A3B8;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* --- Main Layout --- */
    .contact-section {
        background: #F8FAFC;
        padding-bottom: 100px;
        margin-top: -100px; 
        position: relative;
        z-index: 10;
    }

    /* --- Dark Contact Info Card --- */
    .contact-card-dark {
        background: #1E293B;
        border-radius: 24px;
        padding: 50px 40px;
        color: white;
        height: 100%;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
        border: 1px solid rgba(255,255,255,0.05);
        position: relative;
        overflow: hidden;
    }

    /* --- Light Form Card --- */
    .contact-card-light {
        background: white;
        border-radius: 24px;
        padding: 50px 40px;
        height: 100%;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.08);
        border: 1px solid #E2E8F0;
    }

    /* --- Contact Info Items --- */
    .info-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 35px;
    }
    .info-icon {
        width: 48px;
        height: 48px;
        background: rgba(37,99,235,0.15);
        color: #60A5FA;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        flex-shrink: 0;
        margin-right: 20px;
        border: 1px solid rgba(37,99,235,0.3);
    }
    .info-content h5 {
        font-weight: 600;
        color: #F8FAFC;
        margin-bottom: 5px;
        font-size: 1.05rem;
    }
    .info-content p, .info-content a {
        color: #94A3B8;
        margin: 0;
        font-size: 0.95rem;
        text-decoration: none;
        transition: color 0.2s;
        line-height: 1.6;
    }
    .info-content a:hover {
        color: #60A5FA;
    }

    /* --- Custom Instagram Button Color --- */
    .btn-instagram {
        background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        color: white;
        border: none;
        transition: all 0.3s ease;
    }
    .btn-instagram:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220, 39, 67, 0.4);
    }

    /* --- Form Styles --- */
    .form-label {
        font-weight: 600;
        color: #475569;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }
    .form-control {
        background-color: #F8FAFC;
        border: 1px solid #E2E8F0;
        padding: 15px 20px;
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background-color: white;
        border-color: #2563EB;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    }

    /* --- Map --- */
    .map-wrapper {
        margin-top: 40px;
        border-radius: 16px;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .map-wrapper iframe {
        width: 100%;
        height: 220px;
        border: 0;
        /* Dark mode filter for the map */
        filter: grayscale(100%) invert(90%) contrast(80%);
    }
</style>

<!-- Header -->
<div class="contact-hero">
    <div class="container">
        <h1>Let's Build Something Great</h1>
        <p class="mt-3">Have a project in mind? Fill out the form or reach out to us directly. We are ready to help you scale.</p>
    </div>
</div>

<!-- Main Content -->
<div class="contact-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- Left Side: Dark Contact Info Panel -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="contact-card-dark">
                    <h3 class="fw-bold mb-4">Contact Information</h3>
                    <p class="text-secondary mb-5">We'd love to hear from you. Here's how you can reach us.</p>

                    <!-- Address -->
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                        <div class="info-content">
                            <h5>Our Location</h5>
                            <p>Narhe, Pune<br>Maharashtra 411041</p>
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
                        <div class="info-content">
                            <h5>Call Us</h5>
                            <a href="tel:+919881956134">+91 98819 56134</a>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
                        <div class="info-content">
                            <h5>Email Us</h5>
                            <a href="mailto:ruvexatechnologies@gmail.com">ruvexatechnologies@gmail.com</a>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="d-flex gap-2 mt-4">
                        <a href="https://wa.me/919881956134" target="_blank" class="btn btn-success w-50 py-2 rounded-3 fw-semibold shadow-sm">
                            <i class="bi bi-whatsapp me-2"></i> WhatsApp
                        </a>
                        <!-- Instagram button with brand gradient -->
                        <a href="https://instagram.com/ruvexatechnologies" target="_blank" class="btn btn-instagram w-50 py-2 rounded-3 fw-semibold shadow-sm">
                            <i class="bi bi-instagram me-2"></i> Instagram
                        </a>
                    </div>

                    <!-- Dark Themed Map -->
                    <div class="map-wrapper">
                        <iframe src="https://maps.google.com/maps?q=Narhe,%20Pune,%20Maharashtra&t=&z=13&ie=UTF8&iwloc=&output=embed" 
                                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Right Side: Clean White Form Panel -->
            <div class="col-lg-7" data-aos="fade-left">
                <div class="contact-card-light">
                    <h3 class="fw-bold mb-4" style="color: #0F172A;">Send Us a Message</h3>
                    
                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 mb-4" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">Email Address *</label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
                                @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Subject *</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" required>
                                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Your Message *</label>
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="6" required>{{ old('message') }}</textarea>
                                @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12 mt-4">
                                <!-- Upgraded to use the premium gradient button class -->
                                <button type="submit" class="btn btn-primary w-100 py-3 fs-6 rounded-3">
                                    Send Message <i class="bi bi-send ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection