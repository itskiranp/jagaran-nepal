@extends('layouts.app')

@section('content')
<div class="thematic-area-page">
    <!-- Hero Section -->
    <section class="thematic-hero bg-primary text-white py-5">
        <div class="container py-2">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/" class="text-white-50" style="text-decoration: none;">Home</a></li>
                            <li class="breadcrumb-item active text-white" aria-current="page">Thematic Area Details</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold ">Youth Empowerment</h1>
                    <p class="lead mb-4">Empowering youth to become agents of change in their communities</p>
                </div>
                <div class="col-lg-6 mb-3 mt-3">
                    <img src="{{ asset('images/pic4.png') }}" alt="Youth empowerment" class="img-fluid rounded shadow mt-4 ">
                </div>
            </div>
        </div>
    </section>

    <!-- Introduction Section -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <p class="lead mb-4">
                        JagaranNepal believes youths are active partners in the development process and transforming them into active citizens enabling them in translating their ideas into action.
                    </p>
                    <p>
                        Youth Empowerment is one of the three thematic areas of JagaranNepal. It works to empower the youth to become more aware of the issues in the country also aims to make them into active citizens that work to improve their communities and the society as a whole. It focuses on building youth leadership and participation.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Our Initiatives</h2>
                <p class="text-muted">Within Active Citizenship, we have various initiatives</p>
            </div>

            <!-- Program Cards -->
            <div class="row g-4">
                <!-- Paramhba Card -->
                <div class="col-md-6">
                    <div class="program-card card h-100 border-0 shadow-sm overflow-hidden">
                        <div class="row g-0 h-100">
                            <div class="col-md-5">
                                <img src="{{ asset('images/pic1.jpg') }}" class="img-fluid h-100 object-fit-cover" alt="Paramhba workshop">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-4">
                                    <h3 class="h4 card-title fw-bold">Paramhba</h3>
                                    <div class="program-meta mb-3">
                                        <span class="badge bg-primary-light text-primary me-2">Urban Youth</span>
                                        <span class="badge bg-secondary-light text-secondary">18-25 years</span>
                                    </div>
                                    <p class="card-text">
                                        A three-day non-residential workshop targeted toward urban youths to build a common platform for youth innovation and engagement.
                                    </p>
                                    <ul class="program-features list-unstyled">
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Activities, discussions, and games</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Local level interventions in Kathmandu</li>
                                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Practical implementation of ideas</li>
                                    </ul>
                                    <a href="#" class="btn btn-outline-primary mt-3">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pahichan Card -->
                <div class="col-md-6">
                    <div class="program-card card h-100 border-0 shadow-sm overflow-hidden">
                        <div class="row g-0 h-100">
                            <div class="col-md-5">
                                <img src="{{ asset('images/pic3.jpg') }}" class="img-fluid h-100 object-fit-cover" alt="Pahichan workshop">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body p-4">
                                    <h3 class="h4 card-title fw-bold">Pahichan</h3>
                                    <div class="program-meta mb-3">
                                        <span class="badge bg-primary-light text-primary me-2">Semi-rural Youth</span>
                                        <span class="badge bg-secondary-light text-secondary">18-25 years</span>
                                    </div>
                                    <p class="card-text">
                                        Meaning "identification", this three-day non-residential workshop empowers semi-rural youths to foster innovative ideas to address social issues.
                                    </p>
                                    <ul class="program-features list-unstyled">
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Soft skills development</li>
                                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Design thinking approach</li>
                                        <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Local resource-based interventions</li>
                                    </ul>
                                    <a href="#" class="btn btn-outline-primary mt-3">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Programs ( Awashar and  Mambian) -->
                <div class="col-md-6">
                    <div class="program-card card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="icon-lg bg-primary-light text-primary rounded-circle mb-3 mx-auto">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h3 class="h4 card-title fw-bold">JagaranNepal Awashar</h3>
                            <p class="card-text text-muted">
                                Leadership development program for emerging youth leaders.
                            </p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Coming Soon</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="program-card card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                            <div class="icon-lg bg-primary-light text-primary rounded-circle mb-3 mx-auto">
                                <i class="bi bi-lightbulb-fill"></i>
                            </div>
                            <h3 class="h4 card-title fw-bold">JagaranNepal Mambian</h3>
                            <p class="card-text text-muted">
                                Innovation incubator for youth-led community solutions.
                            </p>
                            <a href="#" class="btn btn-link text-primary text-decoration-none">Coming Soon</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Impact Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Our Impact in Numbers</h2>
                    <p class="lead">Transforming youth into Youth Empowerment across Nepal</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="counter-box">
                        <div class="display-4 fw-bold mb-2">500+</div>
                        <p class="mb-0">Youths Empowered</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="counter-box">
                        <div class="display-4 fw-bold mb-2">50+</div>
                        <p class="mb-0">Community Projects</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="counter-box">
                        <div class="display-4 fw-bold mb-2">10+</div>
                        <p class="mb-0">Districts Reached</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="counter-box">
                        <div class="display-4 fw-bold mb-2">5+</div>
                        <p class="mb-0">Years of Experience</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-light">
        <div class="container py-4">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h3 class="h2 fw-bold mb-3">Ready to make a difference?</h3>
                    <p class="lead mb-0">Join our programs and become an active citizen in your community.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('contact') }}" class="btn btn-primary btn-lg px-4 py-2">Get Involved</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection