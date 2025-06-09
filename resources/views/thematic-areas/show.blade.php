@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                @if($thematicArea->image_path)
                <img src="{{ $imageUrl }}" class="card-img-top" alt="{{ $thematicArea->title }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title">{{ $thematicArea->title }}</h1>
                    <div class="card-text">
                        {!! $thematicArea->description !!}
                    </div>
                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <span class="badge bg-{{ $thematicArea->is_active ? 'success' : 'secondary' }}">
                            {{ $thematicArea->is_active ? 'Active' : 'Inactive' }}
                        </span>
                        <small class="text-muted">Order: {{ $thematicArea->order }}</small>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('thematic.areas') }}" class="btn btn-outline-primary">
                        &larr; Back to Thematic Areas
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection