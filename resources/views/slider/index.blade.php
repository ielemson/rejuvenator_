@extends('layouts.admin')
@section('pageName')
Create Slider
@endsection

@section('content')
<div class="container">
    <h1 class="my-4">Sliders</h1>
    <a href="{{ route('slider.create') }}" class="btn btn-primary mb-4">Create New Slider</a>
    <div class="row">
        @foreach ($sliders as $slider)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $slider->image_path) }}" class="card-img-top" alt="{{ $slider->title_1 }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $slider->title_1 }}</h5>
                        <p class="card-text">{{ $slider->title_2 }}</p>
                        <a href="{{ route('sliders.show', $slider->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
