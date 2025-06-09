@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">News and Updates</h1>
    
    <div class="row">
        @foreach($news as $item)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="card-img-top" alt="{{ $item->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ $item->excerpt }}</p>
                        <a href="{{ route('news.show', $item->slug) }}" class="btn btn-primary">Read More</a>
                    </div>
                    <div class="card-footer text-muted">
                        Published on {{ $item->published_at->format('F j, Y') }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $news->links() }}
    </div>
</div>
@endsection