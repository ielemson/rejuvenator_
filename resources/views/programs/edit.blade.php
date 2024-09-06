@extends('layouts.admin')
@section('pageName')
Create Events
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route("programs.index") }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all programs</a>
        </div>
    </div>
    <div class="card-body">
        <div class="">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <form action="{{ route('programs.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $program->title  }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                                <option value="publish" {{ old('status', $program->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="unpublish" {{ old('status', $program->status) == 'unpublish' ? 'selected' : '' }}>Unpublish</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   </div>
                   
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" required>{{ old('description', $program->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" onchange="previewImage()">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($program->image)
                        <div class="mt-2">
                            <img id="image-preview" src="{{ asset('storage/'.$program->image) }}" alt="{{ $program->title }}" class="img-thumbnail" width="150">
                        </div>
                    @else
                        <div id="image-preview" class="mt-2"></div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Programs</button>
            </form>
        </div>
    
        @push('custom_js')
        <script>
            function previewImage() {
                const fileInput = document.getElementById('image');
                const preview = document.getElementById('image-preview');
                const file = fileInput.files[0];
    
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                    }
                    reader.readAsDataURL(file);
                } else {
                    // Clear preview if no file is selected
                    preview.src = '';
                }
            }
        </script>
        @endpush
        </div>
</div>
</div>

@endsection
