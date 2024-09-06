@extends('layouts.admin')
@section('pageName')
Edit Slider
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route('role.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Roles</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container mt-5">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            {{-- <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="form-group">
                    <label for="title">Title 1</label>
                    <input type="text" class="form-control" id="title_1" name="title_1" value="{{ old("title_1") }}" required>
                </div>
                <div class="form-group">
                    <label for="title">Title 2</label>
                    <input type="text" class="form-control" id="title_2" name="title_2"  value="{{ old("title_2") }}" required>
                </div>
               
                <div class="form-group">
                    <label for="image">Select Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form> --}}

            <div class="">
                <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   
        
                    <div class="form-group">
                        <label for="title_1">Title 1:</label>
                        <input type="text" name="title_1" id="title_1" class="form-control" value="{{ $slider->title_1 }}" >
                    </div>
        
                    <div class="form-group">
                        <label for="title_2">Title 2:</label>
                        <input type="text" name="title_2" id="title_2" class="form-control" value="{{ $slider->title_2 }}" >
                    </div>
        
                    <div class="form-group">
                        <label for="image_path">Current Image:</label>
                        <div>
                            <img src="{{ asset('storage/images/' . $slider->image_path) }}" alt="Current Image" class="image-preview mb-2">
                        </div>
                        <label for="image_path">Change Image:</label>
                        <input type="file" name="image_path" id="image_path" class="form-control" onchange="previewImage(event)">
                    </div>
        
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        
        </div>
</div>
</div>

@push("custom_js")
<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'image-preview';
            const previewDiv = input.previousElementSibling;
            previewDiv.innerHTML = ''; // Clear previous preview
            previewDiv.appendChild(img);
        }

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush

@push("custom_css")
<style>
    .image-preview {
        max-width: 100%;
        height: auto;
    }
</style>
@endpush
@endsection
