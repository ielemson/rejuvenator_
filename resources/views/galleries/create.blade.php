@extends('layouts.admin')
@section('pageName')
Edit Slider
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route('gallery.index') }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Gallery</a>
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
                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="1" selected>Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        
        </div>
</div>
</div>

@endsection
