@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Image Gallery</h1>
    <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add New Image</a>
    <div class="row mt-4">
        @foreach($galleries as $gallery)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $gallery->title }}</h5>
                        <p class="card-text">{{ $gallery->status ? 'Active' : 'Inactive' }}</p>
                        <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?');">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
