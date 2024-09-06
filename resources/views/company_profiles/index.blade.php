@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Profile</h1>
    <a href="{{ route("company_profiles.create") }}" class="btn btn-primary mb-4">Create New Profile</a>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @foreach ($profiles as $profile)
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                @if($profile->image)
                    <img src="{{ Storage::url($profile->image) }}" class="card-img" alt="{{ $profile->name }}">
                @else
                    <img src="default-image.jpg" class="card-img" alt="{{ $profile->name }}">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $profile->name }}</h5>
                    <p class="card-text">{{ $profile->position }}</p>
                    <p class="card-text">{{ $profile->description }}</p>

                    <a href="{{ route('company_profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('company_profiles.destroy', $profile->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this profile?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
