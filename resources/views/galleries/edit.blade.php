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

            <div class="">
                <form action="{{ route('gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $gallery->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="previewImage(event)">
                        <small>Leave empty if you don't want to change the image.</small>
                    </div>
                    <div class="mb-3">
                        <label for="imagePreview" class="form-label">Current Image Preview</label><br>
                        <img id="imagePreview" src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" style="max-width: 300px; max-height: 300px;">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" {{ $gallery->status ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ !$gallery->status ? 'selected' : '' }}>Inactive</option>
                        </select>
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
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('imagePreview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>>
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
