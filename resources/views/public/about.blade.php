<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        About Us — {{ setting('school_name', 'CBC School Management System') }}
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
          rel="stylesheet">

    @include('public.partials.style')
</head>

<body>

    {{-- Navbar section --}}
    @include('public.partials.navbar')

    {{-- Page Header --}}
    <div style="background:linear-gradient(135deg,#1e293b,#2563eb);
                padding:80px 0;
                text-align:center;
                color:#fff">

        <h1 class="fw-bold mb-2">
            About Us
        </h1>

        <nav aria-label="breadcrumb"
             class="justify-content-center d-flex">

            <ol class="breadcrumb" style="background:none">

                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}"
                       style="color:rgba(255,255,255,0.7)">
                        Home
                    </a>
                </li>

                <li class="breadcrumb-item active text-white">
                    About
                </li>

            </ol>

        </nav>

    </div>

    {{-- About Content --}}
    <section style="padding:80px 0">

        <div class="container">

            <div class="row g-5 align-items-center">

                <div class="col-lg-6">

                    <span class="badge-section">
                        Our Story
                    </span>

                    <h2 class="section-title mt-3">
                        Empowering Learners Through CBC Education
                    </h2>

                    <p class="text-muted mt-3">
                        {{ setting('school_name', 'Our School') }}
                        is committed to providing a supportive and
                        learner-centred educational environment where
                        every learner is encouraged to discover their
                        strengths, develop practical skills, and achieve
                        their potential.
                    </p>

                    <p class="text-muted">
                        Through the Competency Based Curriculum, we seek
                        to develop knowledge, skills, values, creativity,
                        confidence, and responsible citizenship while
                        working closely with parents and the wider school
                        community.
                    </p>

                    <div class="row g-3 mt-2">

                        <div class="col-6">
                            <div class="p-3 rounded-3"
                                 style="background:#f8fafc;
                                        border:1px solid #e2e8f0">

                                <div class="fw-bold fs-3 text-primary">
                                    CBC
                                </div>

                                <small class="text-muted">
                                    Learner-Centred Curriculum
                                </small>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3"
                                 style="background:#f8fafc;
                                        border:1px solid #e2e8f0">

                                <div class="fw-bold fs-3 text-success">
                                    360°
                                </div>

                                <small class="text-muted">
                                    Holistic Development
                                </small>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3"
                                 style="background:#f8fafc;
                                        border:1px solid #e2e8f0">

                                <div class="fw-bold fs-3 text-warning">
                                    Skills
                                </div>

                                <small class="text-muted">
                                    Practical Learning
                                </small>

                            </div>
                        </div>

                        <div class="col-6">
                            <div class="p-3 rounded-3"
                                 style="background:#f8fafc;
                                        border:1px solid #e2e8f0">

                                <div class="fw-bold fs-3 text-danger">
                                    Values
                                </div>

                                <small class="text-muted">
                                    Character Development
                                </small>

                            </div>
                        </div>

                    </div>

                </div>

                <div class="col-lg-6">

                    <div style="background:linear-gradient(135deg,#2563eb,#1d4ed8);
                                border-radius:20px;
                                padding:40px;
                                color:#fff">

                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-bullseye me-2"></i>
                            Our Vision
                        </h5>

                        <p class="opacity-90">
                            To nurture confident, capable, creative, and
                            responsible learners who are prepared to
                            contribute positively to their families,
                            communities, and society.
                        </p>

                        <hr style="border-color:rgba(255,255,255,0.2)">

                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-heart me-2"></i>
                            Our Mission
                        </h5>

                        <p class="opacity-90">
                            To provide quality, inclusive, and learner-centred
                            education through effective teaching, practical
                            learning experiences, strong values, and
                            meaningful engagement with parents and the
                            school community.
                        </p>

                        <hr style="border-color:rgba(255,255,255,0.2)">

                        <h5 class="fw-bold mb-4">
                            <i class="fas fa-star me-2"></i>
                            Our Values
                        </h5>

                        <div class="d-flex flex-wrap gap-2">

                            @foreach([
                                'Excellence',
                                'Integrity',
                                'Respect',
                                'Responsibility',
                                'Innovation',
                                'Teamwork'
                            ] as $value)

                                <span style="background:rgba(255,255,255,0.15);
                                             padding:4px 12px;
                                             border-radius:50px;
                                             font-size:0.8rem">

                                    {{ $value }}

                                </span>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Principal Message --}}
    <section style="background:#f8fafc;padding:80px 0">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge-section">
                    Leadership
                </span>

                <h2 class="section-title mt-3">
                    Principal's Message
                </h2>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="page-card text-center">

                        <div class="rounded-circle mx-auto mb-3
                                    d-flex align-items-center
                                    justify-content-center
                                    fw-bold text-white"
                             style="width:80px;
                                    height:80px;
                                    background:#2563eb;
                                    font-size:1.5rem">

                            P

                        </div>

                        <h5 class="fw-bold mb-1"
                            style="color:#1e293b">

                            {{ setting('principal_name', 'School Principal') }}

                        </h5>

                        <p class="text-primary mb-3"
                           style="font-size:0.875rem;font-weight:500">

                            Principal,
                            {{ setting('school_name', 'Our School') }}

                        </p>

                        <p class="text-muted"
                           style="font-style:italic;line-height:1.8">

                            "We believe that every learner has unique
                            abilities and potential. Our responsibility
                            is to create an environment where learners
                            feel supported, challenged, valued, and
                            inspired to grow. Through CBC education,
                            dedicated teaching, practical experiences,
                            and partnership with parents and guardians,
                            we aim to prepare learners for a successful
                            and responsible future."

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    {{-- Footer section --}}
    @include('public.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
