@extends('layouts.app')

@section('content')
    <div class="blog-page">
        <!-- Hero Section -->
        <section class="blog-hero bg-dark text-white py-5">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h1 class="display-4 fw-bold mb-2 mt-5">Blog & Articles</h1>
                        <p class="lead text-warning">Stay updated with our latest news and development stories.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles List -->
        <div class="container my-5">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    @forelse ($posts as $post)
                        <div class="blog-post bg-white shadow-sm rounded overflow-hidden mb-5">
                            @if ($post->image_path)
                                <div style="max-height: 350px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $post->image_path) }}" class="img-fluid w-100" style="object-fit: cover; max-height: 350px;" alt="{{ $post->title }}">
                                </div>
                            @endif
                            <div class="p-4 p-md-5">
                                <span class="text-danger fw-bold text-uppercase fs-6">Story</span>
                                <h2 class="h3 fw-bold mt-2 mb-3">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="text-dark text-decoration-none">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-muted mb-4">
                                    Published on {{ \Carbon\Carbon::parse($post->published_at)->format('d M, Y') }}
                                </p>
                                <p class="text-secondary fs-5" style="line-height: 1.6;">
                                    {{ $post->excerpt ?: Str::limit(strip_tags($post->content), 160) }}
                                </p>
                                <div class="mt-4">
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-danger rounded-pill px-4">
                                        Read Full Article
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <!-- Fallback static posts if database has no active blog posts -->
                        <div class="blog-post bg-white shadow-sm rounded overflow-hidden mb-5">
                            <div class="p-4 p-md-5">
                                <span class="text-danger fw-bold text-uppercase fs-6">Story</span>
                                <h2 class="h3 fw-bold mt-2 mb-3">
                                    <a href="#" class="text-dark text-decoration-none">
                                        Empowering Youth for Social Transformation
                                    </a>
                                </h2>
                                <p class="text-muted mb-4">Published on 12 Mar, 2024</p>
                                <p class="text-secondary fs-5" style="line-height: 1.6;">
                                    Established in 2003, Jagaran Nepal is a registered non-profit, youth-led organization. We empower youth to combat social injustice, promote peace, harmony, and humanitarian values...
                                </p>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-outline-danger rounded-pill px-4">Read Full Article</a>
                                </div>
                            </div>
                        </div>
                    @endforelse

                    <!-- Pagination -->
                    @if($posts instanceof \Illuminate\Contracts\Pagination\Paginator)
                        <div class="d-flex justify-content-center mt-5">
                            {!! $posts->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
