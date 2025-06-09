@extends('layouts.app')

@section('content')
<div class="container py-5">
    <article class="news-article">
        <h1>{{ $newsItem->title }}</h1>
        <div class="meta mb-4">
            <span class="date">Published on {{ $newsItem->published_at->format('F j, Y') }}</span>
        </div>
        
        @if($newsItem->image_path)
            <img src="{{ asset('storage/' . $newsItem->image_path) }}" alt="{{ $newsItem->title }}" class="img-fluid mb-4">
        @endif
        
        <div class="content">
            {!! $newsItem->content !!}
        </div>
    </article>
    
    <div class="mt-4">
        <a href="{{ route('news.list') }}" class="btn btn-outline-primary">Back to News</a>
    </div>
</div>
@endsection