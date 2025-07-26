@extends('layouts.app')

@section('content')
    <div class="resource-page">

        <!-- Hero Section -->
        <section class="resource-hero text-white d-flex align-items-center justify-content-center">
            <div class="container text-center">
                <h1 class="display-4 fw-bold">Resource List</h1>
                <p class="lead text-warning">Click on title to download</p>
            </div>
        </section>

        <!-- Resource List -->
        <div class="container my-5">
            <div class="row g-4">
                @foreach ($resources as $index => $resource)
                    <div class="col-md-6">
                        <div class="d-flex align-items-start gap-3 p-3 shadow-sm bg-white rounded">
                            <div class="number-box text-danger fw-bold fs-4">{{ $index + 1 }}</div>
                            <div>
                                <h5 class="mb-1 fw-semibold">
                                    <a href="{{ $resource->download_link }}" class="text-dark text-decoration-none">
                                        {{ $resource->title }}
                                    </a>
                                </h5>
                                <p class="text-muted mb-0">Date: {{ \Carbon\Carbon::parse($resource->date)->format('d M, Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
