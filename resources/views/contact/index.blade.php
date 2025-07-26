@extends('layouts.app')

@section('content')
<div class="contact-page ">
    <section class="contact-hero bg-dark text-white py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h1 class="display-4 fw-bold mb-2 mt-5">Contact Us</h1>
                    <p class="lead">We'd love to hear from you. Reach out through any of these channels.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <div class="row g-5">
            <!-- Contact Info Column -->
            <div class="col-lg-5">
                <div class="contact-info-card shadow-sm p-4 h-100">
                    <div class="mb-5">
                        <h2 class="h4 fw-bold mb-4"><i class="bi bi-geo-alt-fill me-2 text-primary"></i> Our Address</h2>
                        <address class="mb-4">
                            <p class="mb-1">Hetauda-10, TCN Road</p>
                            <p class="mb-1">Makawanpur, Nepal</p>
                        </address>
                        <div class="map-container ratio ratio-16x9 mb-4">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.456418373653!2d85.31673931506205!3d27.70340438279396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a64b5f13e1%3A0x28b2d0eacda46b98!2sYuwa!5e0!3m2!1sen!2snp!4v1620000000000!5m2!1sen!2snp" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-warning me-2">★★★★★</span>
                            <span>4.2 (35 reviews)</span>
                        </div>
                    </div>

                    <div class="mb-5">
                        <h2 class="h4 fw-bold mb-4"><i class="bi bi-envelope-fill me-2 text-primary"></i> Email Us</h2>
                        <p class="mb-4">
                            <a href="mailto:jagarannepal2003@gmail.com" class="text-decoration-none">jagarannepal2003@gmail.com</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <h2 class="h4 fw-bold mb-4"><i class="bi bi-telephone-fill me-2 text-primary"></i> Call Us</h2>
                        <p class="mb-2">
                            <a href="tel:98550 68 460" class="text-decoration-none">9855068460</a>
                        </p>
                        <p>
                            <a href="tel:98550 67 509" class="text-decoration-none">98550 67 509</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Contact Form Column -->
            <div class="col-lg-7">
                <div class="contact-form-card shadow-sm p-4 h-100">
                    <h2 class="h4 fw-bold mb-4">Send Us a Message</h2>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Your Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-12">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary px-4 py-2">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Nearby Places Section -->
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h2 class="h4 fw-bold mb-4">Nearby Places</h2>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-3">
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="h6 card-title">Sunni Cinema</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="h6 card-title">Cafe Soma</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="h6 card-title">Shibungai Gaju</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body">
                                <h3 class="h6 card-title">Book Mandala</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection