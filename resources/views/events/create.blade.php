@extends('layouts.admin')
@section('pageName')
Create Events
@endsection

@section('content')
<div class="card card-primary">
    <div class="card-header">
        <div class="card-tools">
            <a href="{{ route("events.index") }}" class="btn btn-danger"><i class="fas fa-shield-alt"></i> See all events</a>
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

                <form action="{{ route("events.store") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="title">Location</label>
                            <input type="text" placeholder="Location" name="location" class="form-control @error('location') is-invalid @enderror" id="location" value="{{ old("location")}}" required>
                            @error('location')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                   </div>
                
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea name="description" class="form-control description @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" {{ isset($event) ? '' : 'required' }}>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                
                   <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                                <option value="publish" {{ (old('status', $event->status ?? '') == 'publish') ? 'selected' : '' }}>Publish</option>
                                <option value="unpublish" {{ (old('status', $event->status ?? '') == 'unpublish') ? 'selected' : '' }}>Unpublish</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="time">Time</label>
                            <input type="datetime-local" name="time" class="form-control @error('time') is-invalid @enderror" id="time" value="{{ old('time', isset($event) ? \Carbon\Carbon::parse($event->time)->format('F j, Y') : '') }}" required>
                            @error('time')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                   </div>
                
                    <button type="submit" class="btn btn-primary">{{ __("Create Event") }}</button>
                </form>
        </div>
</div>
</div>
@endsection
{{-- @push('custom_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/ui/trumbowyg.min.css" integrity="sha512-Fm8kRNVGCBZn0sPmwJbVXlqfJmPC13zRsMElZenX6v721g/H7OukJd8XzDEBRQ2FSATK8xNF9UYvzsCtUpfeJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    $('#trumbowyg-demo').trumbowyg({
    btns: [['strong', 'em',], ['insertImage']],
    autogrow: true
});
</script>
@endpush --}}
