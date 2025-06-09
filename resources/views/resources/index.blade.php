@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Resources</h1>
    
    <div class="row">
        @foreach($resources as $resource)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $resource->title }}</h5>
                        <p class="card-text">{{ $resource->description }}</p>
                        @if($resource->file_path)
                            <a href="{{ asset('storage/' . $resource->file_path) }}" class="btn btn-primary" download>Download</a>
                        @elseif($resource->external_link)
                            <a href="{{ $resource->external_link }}" class="btn btn-primary" target="_blank">View Resource</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center mt-4">
        {{ $resources->links() }}
    </div>
</div>
@endsection