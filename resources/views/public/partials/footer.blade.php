<footer>
    <div class="container">

        <div class="row g-4 mb-4">

            {{-- School Information --}}
            <div class="col-lg-4">

                <h6>
                    <i class="fas fa-graduation-cap me-2"
                       style="color:#2563eb"></i>

                    {{ setting('school_name', 'CBC School Management System') }}
                </h6>

                <p style="font-size:0.875rem;
                          color:rgba(255,255,255,0.5)">
                    Supporting quality education and holistic learner
                    development through learner-centred CBC education.
                </p>

            </div>

            {{-- Quick Links --}}
            <div class="col-lg-2">

                <h6>Quick Links</h6>

                <a href="{{ route('home') }}">
                    Home
                </a>

                <a href="{{ route('about') }}">
                    About Us
                </a>

                <a href="{{ route('admission') }}">
                    Admission
                </a>

                <a href="{{ route('contact') }}">
                    Contact
                </a>

            </div>

            {{-- Academics --}}
            <div class="col-lg-2">

                <h6>Academics</h6>

                <a href="{{ route('public.teachers') }}">
                    Teachers
                </a>

                <a href="{{ route('fee.structure') }}">
                    Fee Structure
                </a>

                <a href="{{ route('events') }}">
                    Events
                </a>

                <a href="{{ route('news') }}">
                    News
                </a>

                <a href="{{ route('faq') }}">
                    FAQ
                </a>

                <a href="{{ route('gallery') }}">
                    Gallery
                </a>

            </div>

            {{-- Contact Information --}}
            <div class="col-lg-4">

                <h6>
                    Contact Info
                </h6>

                <p style="font-size:0.875rem;
                          color:rgba(255,255,255,0.5)">

                    <i class="fas fa-map-marker-alt me-2"></i>
                    {{ setting('school_address', 'Kenya') }}

                    <br>

                    <i class="fas fa-phone me-2 mt-1 d-inline-block"></i>
                    {{ setting('school_phone', '+254700000000') }}

                    <br>

                    <i class="fas fa-envelope me-2 mt-1 d-inline-block"></i>
                    {{ setting('school_email', 'info@school.ac.ke') }}

                </p>

            </div>

        </div>

        <hr style="border-color:rgba(255,255,255,0.1)">

        {{-- Copyright --}}
        <div class="d-flex justify-content-between
                    align-items-center
                    flex-wrap gap-2"
             style="font-size:0.8rem">

            <span>
                © {{ date('Y') }}
                {{ setting('school_name', 'CBC School Management System') }}.
                All rights reserved.
            </span>

            {{-- Footer Links --}}
            <div class="d-flex gap-3">

                <a href="{{ route('privacy') }}"
                   style="color:rgba(255,255,255,0.5)">
                    Privacy Policy
                </a>

                <a href="{{ route('terms') }}"
                   style="color:rgba(255,255,255,0.5)">
                    Terms
                </a>

                <a href="{{ route('login') }}"
                   style="color:rgba(255,255,255,0.5)">
                    Admin Login
                </a>

            </div>

        </div>

    </div>
</footer>
