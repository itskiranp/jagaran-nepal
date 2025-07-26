@extends('layouts.app')

@section('content')
    <div class="payment-page">
        <section class="about-hero text-white d-flex align-items-center justify-content-center">
            <div class="container text-center">
                <h1 class="display-4 fw-bold">Payment methods</h1>
                <p class="lead text-warning">We should supports different payment methods for National and International
                    donors.</p>
            </div>
        </section>
        <div class="container text-center mt-5">
            <h2>Make a Donation</h2>
            <p>Choose a payment method to support our cause.</p>

            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5 class="mb-3">Scan with eSewa</h5>
                        <img src="{{ asset('../../../images/esewa_qr.jpg') }}" alt="eSewa QR Code" class="img-fluid ">
                        <p class="mt-2 text-muted">Use your eSewa app to scan and donate</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
