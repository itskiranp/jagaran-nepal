@extends('layouts.app')
@section('content')
    <div class="team-page">
        <section class="about-hero text-white d-flex align-items-center justify-content-center">
            <div class="container text-center">
                <h1 class="display-4 fw-bold">Team</h1>
                <p class="lead text-warning">Detail of Working Committee</p>
            </div>
        </section>

        <div class="container py-5 mt-3">

            <h2 class="mb-4 text-primary fw-bold">Meet Our Team</h2>

            <div class="accordion" id="teamAccordion">

                <!-- Working Committee Section -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingCommittee">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseCommittee" aria-expanded="true">
                            Detail of Working Committee
                        </button>
                    </h2>
                    <div id="collapseCommittee" class="accordion-collapse collapse show" data-bs-parent="#teamAccordion">
                        <div class="accordion-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                <!-- Example Member -->
                                <div class="col">
                                    <div class="card team-card h-100">
                                        <img src="https://via.placeholder.com/400x250?text=Nabaraj+Khanal"
                                            class="card-img-top" alt="Nabaraj Khanal">
                                        <div class="card-body">
                                            <h5 class="card-title">Nabaraj Khanal</h5>
                                            <h6 class="text-muted">Chairperson</h6>
                                            <p><i class="bi bi-mortarboard-fill text-primary"></i> MBA</p>
                                            <p><i class="bi bi-clock-history text-primary"></i> 17 years</p>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Account &
                                                    Finance</li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Cooperative
                                                    Management/Trainer</li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Social Work &
                                                    Business</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more members here -->
                                <div class="col">
                                    <div class="card team-card h-100">
                                        <img src="https://via.placeholder.com/400x250?text=Kanchan+Ghimire"
                                            class="card-img-top" alt="Kanchan Ghimire">
                                        <div class="card-body">
                                            <h5 class="card-title">Kanchan Ghimire</h5>
                                            <h6 class="text-muted">Secretary</h6>
                                            <p><i class="bi bi-mortarboard-fill text-primary"></i> MA (Sociology)</p>
                                            <p><i class="bi bi-clock-history text-primary"></i> 5 years</p>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Enterprise
                                                    Development</li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Livelihood
                                                    Management</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- You can copy/paste more cards for other members -->

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Staff Section -->
                <div class="accordion-item mt-3">
                    <h2 class="accordion-header" id="headingStaff">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseStaff" aria-expanded="false">
                            Detail of Staff Associated
                        </button>
                    </h2>
                    <div id="collapseStaff" class="accordion-collapse collapse" data-bs-parent="#teamAccordion">
                        <div class="accordion-body">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">

                                <!-- Example Staff -->
                                <div class="col">
                                    <div class="card team-card h-100">
                                        <img src="https://via.placeholder.com/400x250?text=Sushil+Raj+Giri"
                                            class="card-img-top" alt="Sushil Raj Giri">
                                        <div class="card-body">
                                            <h5 class="card-title">Sushil Raj Giri</h5>
                                            <h6 class="text-muted">Executive Director</h6>
                                            <p><i class="bi bi-mortarboard-fill text-primary"></i> M.A. English (Ongoing),
                                                B.Ed. English, M.A. Sociology, LLB</p>
                                            <p><i class="bi bi-clock-history text-primary"></i> 18 years</p>
                                            <ul class="list-unstyled">
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Program
                                                    Developer</li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Research</li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Youth Rights
                                                </li>
                                                <li><i class="bi bi-check-circle-fill text-success me-1"></i> Humanitarian
                                                    Services</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more staff here -->

                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </div>
@endsection
