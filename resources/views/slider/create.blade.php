@extends('layouts.admin')
@section('pageName')
Create Slider
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route("sliders.index") }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all Sliders</a>
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
    
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                
                <div class="form-group">
                    <label for="title">Title 1</label>
                    <input type="text" class="form-control" id="title_1" name="title_1" value="{{ old("title_1") }}" >
                </div>
                <div class="form-group">
                    <label for="title">Title 2</label>
                    <input type="text" class="form-control" id="title_2" name="title_2"  value="{{ old("title_2") }}" >
                </div>
               
                <div class="form-group">
                    <label for="image">Select Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
</div>
</div>
@endsection
