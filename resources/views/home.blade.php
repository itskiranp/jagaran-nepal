@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="hero mb-5">
        <div class="hero-carousel">
            @if(isset($carouselItems) && $carouselItems->count() > 0)
                <!-- Slides -->
                @foreach ($carouselItems as $item)
                    <div class="carousel-slide {{ $loop->first ? 'active' : '' }}"
                        style="background-image: url('{{ $item['image'] }}')">
                        <!-- Individual Overlay inside each slide so it transitions and fades with the background image -->
                        <div class="overlay"></div>

                        <!-- Individual Content inside each slide to be fully dynamic and clickable -->
                        <div class="hero-content">
                            <h1>{{ $item['title'] }}</h1>
                            <p>{{ $item['caption'] }}</p>
                            @if(!empty($item['description']))
                                <p class="description d-none d-md-block" style="font-size: 1.1rem; max-width: 600px; margin-top: 10px; opacity: 0.9;">
                                    {{ $item['description'] }}
                                </p>
                            @endif
                            @if(!empty($item['link_url']))
                                <a href="{{ $item['link_url'] }}" class="btn btn-primary px-4 py-2 mt-3" style="text-shadow: none;">
                                    {{ $item['link_text'] ?: 'Learn More' }}
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Navigation Controls (only render if there's more than 1 item) -->
                @if($carouselItems->count() > 1)
                    <div class="carousel-nav">
                        <button class="carousel-btn prev-btn">‹</button>
                        <button class="carousel-btn next-btn">›</button>
                    </div>

                    <!-- Indicators -->
                    <div class="hero-indicators">
                        @foreach ($carouselItems as $index => $item)
                            <div class="hero-indicator {{ $loop->first ? 'active' : '' }}"></div>
                        @endforeach
                    </div>
                @endif
            @else
                <!-- Fallback Slides when database contains no items -->
                <div class="carousel-slide active"
                    style="background-image: url('https://images.unsplash.com/photo-1697229299093-c920ab53bfb1?crop=entropy&cs=srgb&fm=jpg&ixid=M3wzMjM4NDZ8MHwxfHJhbmRvbXx8fHx8fHx8fDE3MTU2OTIzNzZ8&ixlib=rb-4.0.3&q=85')">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Empowered Youth, Transformed World</h1>
                        <p>Empowering youth with skills, confidence, and opportunities to lead change.</p>
                    </div>
                </div>
                <div class="carousel-slide"
                    style="background-image: url('https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb‑1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Empowered Youth, Transformed World</h1>
                        <p>Empowering youth with skills, confidence, and opportunities to lead change.</p>
                    </div>
                </div>
                <div class="carousel-slide"
                    style="background-image: url('https://images.unsplash.com/photo-1519337265831-281ec6cc8514?ixlib=rb‑1.2.1&auto=format&fit=crop&w=1350&q=80')">
                    <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Empowered Youth, Transformed World</h1>
                        <p>Empowering youth with skills, confidence, and opportunities to lead change.</p>
                    </div>
                </div>

                <!-- Fallback Controls -->
                <div class="carousel-nav">
                    <button class="carousel-btn prev-btn">‹</button>
                    <button class="carousel-btn next-btn">›</button>
                </div>

                <div class="hero-indicators">
                    <div class="hero-indicator active"></div>
                    <div class="hero-indicator"></div>
                    <div class="hero-indicator"></div>
                </div>
            @endif
        </div>
    </div>

    <!-- About Section -->
    <div class="container">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row position-relative">
                    {{-- <div class="col-lg-7 about-img" style="background-image: url({{ asset('images/pic1.jpg') }});"></div> --}}
                    <div class="col-lg-7">
                        <h2>Learn about us</h2>
                        <div class="our-story">
                            <h4>Est 2003</h4>
                            <h3>Know Our Story</h3>
                            <p>{{ Str::limit($aboutContent, 500) }}</p>
                            <div class="watch-video d-flex align-items-center position-relative">

                                <i class="fas fa-info-circle me-1"></i>
                                <a href="{{ route('about') }}" class="stretched-link">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex align-items-center justify-content-center">
                        <div class="program-card card h-100 border-0 shadow-sm overflow-hidden">
                            <div class="card-body">
                                <img src="images/pic5.png" alt="">

                            </div>

                        </div>
                    </div>
                </div>
        </section>
    </div>

    <!-- Projects Section -->
    <div class="container py-5">
        <section id="projects" class="projects section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Projects</h2>
                </div>

                <ul class="nav nav-tabs row g-2 d-flex">
                    @foreach ($projects as $key => $project)
                        <li class="nav-item col">
                            <a class="nav-link {{ $loop->first ? 'active show' : '' }}" data-bs-toggle="tab"
                                data-bs-target="#tab-{{ $key }}">
                                <h4>{{ $project['title'] }}</h4>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content">
                    @foreach ($projects as $key => $project)
                        <div class="tab-pane {{ $loop->first ? 'active show' : '' }}" id="tab-{{ $key }}">
                            <div class="row">
                                <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                                    data-aos="fade-up" data-aos-delay="100">
                                    <h3>{{ $project['title'] }}</h3>
                                    <p class="fst-italic text-justify">{{ $project['description'] }}</p>
                                    <a href="{{ $project['link'] }}" target="_blank">
                                        <div class="readmore">Visit {{ $project['title'] }}<i
                                                class="fas fa-arrow-right"></i>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- Publications Section -->
    <div class="container py-5">
        <section id="publications" class="publications section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Our Publications</h2>
                </div>

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-magic"></i>
                            </div>
                            <h3>Resources</h3>
                            <a href="{{ route('resources') }}" class="readmore stretched-link">View All Resources<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-pen-fancy"></i>
                            </div>
                            <h3>Blog</h3>
                            <a href="{{ route('blog.list') }}" class="readmore stretched-link">View All Blogs<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <h3>Reports</h3>
                            <a href="{{ route('reports') }}" class="readmore stretched-link">View All Reports<i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Blog Posts Section -->
    <div class="container py-5">
        <section id="recent-blog-posts" class="recent-blog-posts">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Recent Blog Posts</h2>
                    <a href="{{ route('blog.list') }}" class="readmore">
                        Read All Blogs <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="row g-4">
                    @foreach ($recentBlogs as $blog)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="post-item position-relative">
                                <div class="post-img overflow-hidden">
                                    <img src="{{ $blog['image'] }}" class="img-fluid w-100 h-100" style="object-fit: cover;"
                                        alt="{{ $blog['title'] }}">
                                    <span class="post-date">{{ $blog['date'] }}</span>
                                </div>
                                <div class="post-content">
                                    <h3 class="post-title">{{ $blog['title'] }}</h3>
                                    <p class="post-excerpt">{{ $blog['excerpt'] }}</p>
                                    <hr>
                                    <a href="{{ route('blog.show', $blog['slug']) }}" class="readmore stretched-link">
                                        <span>Read Full Article</span> <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>

    <!-- Newsletter Section -->
    <div class="container py-5 mb-3">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="section-header">
                    <h2>Subscribe to Our Newsletter</h2>
                </div>

                <div class="row gy-4 mt-1">
                    <div class="col-lg-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('newsletter.subscribe') }}" method="post" role="form"
                            class="php-email-form">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-lg-6 form-group mb-4">
                                    <input type="text" name="full_name" class="form-control" id="name"
                                        placeholder="Your Name" required value="{{ old('full_name') }}">
                                </div>
                                <div class="col-lg-6 form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="text-center "><button type="submit"
                                    class="btn btn-outline-info">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
