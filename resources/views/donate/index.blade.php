@extends('layouts.app')
@section('content')
    <div class="donate-page">
        <section class="about-hero text-white d-flex align-items-center justify-content-center">
            <div class="container text-center">
                <h1 class="display-4 fw-bold">Donate</h1>
                <p class="lead text-warning">Donate for a Cause</p>
            </div>
        </section>
        <div class="container py-5 mt-3">
            <p class="text-center">Your contributions help us to continue our work and make a difference in the community. Thank you for your support!</p>
            <div class="text-center">
                <a href="{{ route('donate.payment') }}" class="btn btn-primary">Donate Now</a>
            </div>

        </div>
        
    </div>
@endsection
