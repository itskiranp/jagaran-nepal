@extends('layouts.app')

@section('content')
    <div class="blog-show-page">
        <!-- Hero Header -->
        <section class="blog-hero bg-dark text-white py-5">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="mb-3 mt-5">
                            <a href="{{ route('blog.list') }}" class="btn btn-outline-warning btn-sm px-3 rounded-pill text-decoration-none">
                                ← Back to Blog
                            </a>
                        </div>
                        <h1 class="display-5 fw-bold mb-3">{{ $post->title }}</h1>
                        <p class="text-light opacity-75 mb-0">
                            Published on {{ \Carbon\Carbon::parse($post->published_at)->format('F d, Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Article Content -->
        <div class="container my-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if($post->image_path)
                        <div class="mb-5 shadow-sm rounded overflow-hidden">
                            <img src="{{ asset('storage/' . $post->image_path) }}" 
                                 alt="{{ $post->title }}" 
                                 class="img-fluid w-100" 
                                 style="max-height: 480px; object-fit: cover;">
                        </div>
                    @endif

                    <!-- Article Body -->
                    <article class="blog-content bg-white p-4 p-md-5 shadow-sm rounded fs-5" style="line-height: 1.8; color: #333;">
                        {!! $post->content !!}
                    </article>

                    <!-- Bottom Nav -->
                    <div class="text-center mt-5">
                        <a href="{{ route('blog.list') }}" class="btn btn-danger px-4 py-2 rounded-pill">
                            Explore More Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
