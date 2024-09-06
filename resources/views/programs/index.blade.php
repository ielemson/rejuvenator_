@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">All Programs</h1>
    <a href="{{ route("programs.create") }}" class="btn btn-primary mb-4">Create New Program</a>
    
<div class="row">
    @forelse($programs as $event)
    <div class="col-md-4 mb-4">
        <div class="card h-100">
            @if($event->image)
                <img src="{{ asset('storage/'.$event->image) }}" class="card-img-top" alt="{{ $event->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ Str::limit($event->description, 100) }}</p>
                <p class="card-text"><strong>Status:</strong> {{ ucfirst($event->status) }}</p>
                <p class="card-text"><strong>Time:</strong> {{ \Carbon\Carbon::parse($event->time)->format('F j, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
                <a href="{{ route('programs.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('programs.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@empty
    <div class="col-12">
        <div class="alert alert-info" role="alert">
            No events found. <a href="{{ route('programs.create') }}" class="alert-link">Create a new programs.</a>
        </div>
    </div>
@endforelse
</div>
</div>
</div>
@endsection
