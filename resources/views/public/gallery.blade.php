<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Gallery — {{ setting('school_name', 'CBC School Management System') }}
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

    {{-- Navbar --}}
    @include('public.partials.navbar')

    {{-- Page Header --}}
    <div style="background:linear-gradient(135deg,#1e293b,#2563eb);
                padding:80px 0;
                text-align:center;
                color:#fff">

        <h1 class="fw-bold mb-2">
            School Gallery
        </h1>

        <p class="opacity-80 mb-0">
            A glimpse into our learning environment and activities
        </p>

    </div>

    {{-- Gallery --}}
    <section style="padding:80px 0">

        <div class="container">

            <div class="text-center mb-5">

                <span class="badge-section">
                    Our Campus
                </span>

                <h2 class="section-title mt-3">
                    Life at {{ setting('school_name', 'Our School') }}
                </h2>

                <p class="section-subtitle mx-auto mt-2">
                    Explore highlights from learning, creativity,
                    sports, innovation, and school activities.
                </p>

            </div>

            @php
                $galleryItems = [
                    [
                        'title' => 'Classroom Learning',
                        'category' => 'Learning',
                        'image' => 'https://picsum.photos/seed/classroom1/800/550',
                    ],
                    [
                        'title' => 'Science Activities',
                        'category' => 'Learning',
                        'image' => 'https://picsum.photos/seed/science1/800/550',
                    ],
                    [
                        'title' => 'School Library',
                        'category' => 'Learning',
                        'image' => 'https://picsum.photos/seed/library1/800/550',
                    ],
                    [
                        'title' => 'Sports Activities',
                        'category' => 'Sports',
                        'image' => 'https://picsum.photos/seed/sports1/800/550',
                    ],
                    [
                        'title' => 'Creative Activities',
                        'category' => 'Activities',
                        'image' => 'https://picsum.photos/seed/creative1/800/550',
                    ],
                    [
                        'title' => 'Technology Learning',
                        'category' => 'Technology',
                        'image' => 'https://picsum.photos/seed/computer1/800/550',
                    ],
                    [
                        'title' => 'School Events',
                        'category' => 'Events',
                        'image' => 'https://picsum.photos/seed/event1/800/550',
                    ],
                    [
                        'title' => 'Learner Activities',
                        'category' => 'Activities',
                        'image' => 'https://picsum.photos/seed/students1/800/550',
                    ],
                    [
                        'title' => 'Innovation Projects',
                        'category' => 'Innovation',
                        'image' => 'https://picsum.photos/seed/innovation1/800/550',
                    ],
                ];
            @endphp

            {{-- Filter Buttons --}}
            <div class="text-center mb-4">

                <button type="button"
                        class="btn btn-primary btn-sm gallery-filter active"
                        data-filter="all">
                    All
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Learning">
                    Learning
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Sports">
                    Sports
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Activities">
                    Activities
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Technology">
                    Technology
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Events">
                    Events
                </button>

                <button type="button"
                        class="btn btn-outline-primary btn-sm gallery-filter"
                        data-filter="Innovation">
                    Innovation
                </button>

            </div>

            <div class="row g-4" id="galleryGrid">

                @foreach($galleryItems as $item)

                    <div class="col-md-6 col-lg-4 gallery-item"
                         data-category="{{ $item['category'] }}">

                        <div class="gallery-card"
                             style="background:#fff;
                                    border:1px solid #e2e8f0;
                                    border-radius:16px;
                                    overflow:hidden;
                                    transition:all 0.3s;
                                    cursor:pointer"
                             onclick="openGallery(
                                '{{ $item['image'] }}',
                                '{{ addslashes($item['title']) }}'
                             )">

                            <div style="height:230px;
                                        overflow:hidden;
                                        position:relative">

                                <img src="{{ $item['image'] }}"
                                     alt="{{ $item['title'] }}"
                                     style="width:100%;
                                            height:230px;
                                            object-fit:cover;
                                            transition:transform 0.3s"
                                     loading="lazy">

                                <div class="gallery-overlay"
                                     style="position:absolute;
                                            inset:0;
                                            background:rgba(30,41,59,0.65);
                                            display:flex;
                                            align-items:center;
                                            justify-content:center;
                                            opacity:0;
                                            transition:opacity 0.3s">

                                    <div class="text-center text-white">

                                        <i class="fas fa-search-plus fa-2x mb-2"></i>

                                        <div style="font-size:0.9rem;
                                                    font-weight:600">
                                            View Image
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="p-3">

                                <span class="badge mb-2"
                                      style="background:#dbeafe;color:#1d4ed8">
                                    {{ $item['category'] }}
                                </span>

                                <h6 class="fw-bold mb-0"
                                    style="color:#1e293b">

                                    {{ $item['title'] }}

                                </h6>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    {{-- Image Modal --}}
    <div class="modal fade"
         id="galleryModal"
         tabindex="-1"
         aria-hidden="true">

        <div class="modal-dialog modal-xl modal-dialog-centered">

            <div class="modal-content"
                 style="background:#0f172a;border:none">

                <div class="modal-header border-0">

                    <h5 class="modal-title text-white"
                        id="galleryModalTitle">
                    </h5>

                    <button type="button"
                            class="btn-close btn-close-white"
                            data-bs-dismiss="modal">
                    </button>

                </div>

                <div class="modal-body text-center p-2">

                    <img id="galleryModalImage"
                         src=""
                         alt=""
                         style="max-width:100%;
                                max-height:75vh;
                                object-fit:contain;
                                border-radius:10px;">

                </div>

            </div>

        </div>

    </div>

    {{-- Footer --}}
    @include('public.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const buttons =
                document.querySelectorAll('.gallery-filter');

            const items =
                document.querySelectorAll('.gallery-item');

            buttons.forEach(button => {

                button.addEventListener('click', function () {

                    const filter =
                        this.getAttribute('data-filter');

                    buttons.forEach(btn => {

                        btn.classList.remove('active');
                        btn.classList.remove('btn-primary');
                        btn.classList.add('btn-outline-primary');

                    });

                    this.classList.add('active');
                    this.classList.remove('btn-outline-primary');
                    this.classList.add('btn-primary');

                    items.forEach(item => {

                        const category =
                            item.getAttribute('data-category');

                        if (filter === 'all' || category === filter) {

                            item.style.display = '';

                        } else {

                            item.style.display = 'none';

                        }

                    });

                });

            });

            document.querySelectorAll('.gallery-card')
                .forEach(card => {

                    card.addEventListener('mouseenter', function () {

                        this.style.transform = 'translateY(-5px)';
                        this.style.boxShadow =
                            '0 15px 35px rgba(0,0,0,0.10)';

                        const overlay =
                            this.querySelector('.gallery-overlay');

                        if (overlay) {
                            overlay.style.opacity = '1';
                        }

                        const image =
                            this.querySelector('img');

                        if (image) {
                            image.style.transform = 'scale(1.05)';
                        }

                    });

                    card.addEventListener('mouseleave', function () {

                        this.style.transform = 'translateY(0)';
                        this.style.boxShadow = 'none';

                        const overlay =
                            this.querySelector('.gallery-overlay');

                        if (overlay) {
                            overlay.style.opacity = '0';
                        }

                        const image =
                            this.querySelector('img');

                        if (image) {
                            image.style.transform = 'scale(1)';
                        }

                    });

                });

        });

        function openGallery(image, title) {

            document.getElementById('galleryModalImage').src = image;
            document.getElementById('galleryModalImage').alt = title;
            document.getElementById('galleryModalTitle').textContent = title;

            const modal =
                new bootstrap.Modal(
                    document.getElementById('galleryModal')
                );

            modal.show();
        }
    </script>

</body>
</html>
