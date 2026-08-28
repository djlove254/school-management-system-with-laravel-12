<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FAQ — {{ setting('school_name', 'CBC School Management System') }}</title>

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
            FAQ
        </h1>

        <p class="opacity-80">
            Frequently Asked Questions
        </p>

    </div>

    {{-- FAQ Section --}}
    <section style="padding:80px 0">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="accordion" id="faqAccordion">

                        @php
                            $faqs = [
                                [
                                    'q' => 'When do admissions open?',
                                    'a' => 'Admissions are open according to the school admission calendar for each academic year. Please contact the school office for the current admission dates.'
                                ],
                                [
                                    'q' => 'What documents are required for admission?',
                                    'a' => 'Required documents may include the learner’s birth certificate or birth notification, previous school records, passport-size photos, parent or guardian identification, and other documents requested by the school.'
                                ],
                                [
                                    'q' => 'What are the school timings?',
                                    'a' => 'School timings are Monday to Friday during the scheduled school hours. Please contact the school office for the current timetable and reporting times.'
                                ],
                                [
                                    'q' => 'Is there a school transport facility?',
                                    'a' => 'Yes, school transport may be available on selected routes. Please contact the school office for information about available routes, charges, and transport arrangements.'
                                ],
                                [
                                    'q' => 'What is the medium of instruction?',
                                    'a' => 'The school follows the CBC curriculum with English as the main language of instruction, alongside the languages and learning areas prescribed by the curriculum.'
                                ],
                                [
                                    'q' => 'Are there any scholarships available?',
                                    'a' => 'Scholarship or financial-support opportunities may be available depending on the school programme. Please contact the school office for current eligibility requirements and available opportunities.'
                                ],
                                [
                                    'q' => 'How can I track my child\'s attendance?',
                                    'a' => 'Parents and guardians can use the parent portal to view their learner’s attendance, academic records, and fee information online, where enabled by the school.'
                                ],
                                [
                                    'q' => 'What extracurricular activities are available?',
                                    'a' => 'The school may offer sports, music, creative activities, clubs, debates, technology activities, and other co-curricular programmes that support holistic learner development.'
                                ],
                            ];
                        @endphp

                        @foreach($faqs as $i => $faq)

                            <div class="accordion-item border mb-2 rounded-3 overflow-hidden">

                                <h2 class="accordion-header">

                                    <button class="accordion-button {{ $i > 0 ? 'collapsed' : '' }} fw-500"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#faq{{ $i }}"
                                            style="font-weight:500;font-size:0.95rem">

                                        <i class="fas fa-question-circle text-primary me-2"></i>

                                        {{ $faq['q'] }}

                                    </button>

                                </h2>

                                <div id="faq{{ $i }}"
                                     class="accordion-collapse collapse {{ $i === 0 ? 'show' : '' }}"
                                     data-bs-parent="#faqAccordion">

                                    <div class="accordion-body text-muted"
                                         style="font-size:0.9rem">

                                        {{ $faq['a'] }}

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                    <div class="text-center mt-5">

                        <p class="text-muted">
                            Still have questions?
                        </p>

                        <a href="{{ route('contact') }}"
                           class="btn btn-primary px-5">

                            <i class="fas fa-envelope me-2"></i>
                            Contact Us

                        </a>

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
