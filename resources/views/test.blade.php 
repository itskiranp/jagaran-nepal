@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7 text-center">
                        <h2 data-aos="fade-down">Empowering Youth Strengthening Involvement</h2>
                        <p data-aos="fade-up">Welcome to the official Jagaran-Nepal website!</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            @foreach ($carouselItems as $item)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}"
                    style="background-image: url({{ asset($item['image']) }})"></div>
            @endforeach

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </section>

    <!-- About Section -->
    <div class="container">
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">
                <div class="row position-relative">
                    <div class="col-lg-7 about-img" style="background-image: url({{ asset('images/pic1.jpg') }});"></div>
                    <div class="col-lg-7">
                        <h2>Learn about us</h2>
                        <div class="our-story">
                            <h4>Est 2009</h4>
                            <h3>Know Our Story</h3>
                            <p>{{ Str::limit($aboutContent, 500) }}</p>
                            <div class="watch-video d-flex align-items-center position-relative">
                                <i class="fas fa-play-circle"></i>
                                <a href="#" class="glightbox stretched-link">Watch Our Video</a>
                                <span></span>
                                <i class="fas fa-info-circle"></i>
                                <a href="{{ route('about') }}" class="stretched-link">Learn More</a>
                            </div>
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
                    <a href="{{ route('blog.list') }}" class="readmore">Read All Blogs<i
                            class="fas fa-arrow-right"></i></a>
                </div>

                <div class="row gy-5">
                    @foreach ($recentBlogs as $blog)
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="post-item position-relative h-100">
                                <div class="post-img position-relative overflow-hidden yuwa-post-img">
                                    <img src="{{ asset($blog['image']) }}" class="img-fluid"
                                        alt="{{ $blog['title'] }}">
                                    <span class="post-date">{{ $blog['date'] }}</span>
                                </div>
                                <div class="post-content d-flex flex-column">
                                    <h3 class="post-title">{{ $blog['title'] }}</h3>
                                    <hr>
                                    <a href="{{ route('blog.show', $blog['slug']) }}" class="readmore stretched-link">
                                        <span>Read {{ $blog['title'] }}</span><i class="fas fa-arrow-right"></i>
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

                            <div class="text-center "><button type="submit" class="btn btn-outline-info">Subscribe</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
