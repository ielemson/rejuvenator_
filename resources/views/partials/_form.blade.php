<!-- resources/views/events/_form.blade.php -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($method))
        @method($method)
    @endif

   <div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" placeholder="Title" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $event->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="title">Location</label>
            <input type="text" placeholder="Location" name="location" class="form-control @error('location') is-invalid @enderror" id="location" value="{{ old('location', $event->location ?? '') }}" required>
            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
   </div>

    <div class="form-group mb-3">
        <label for="description">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description">{{ old('description', $event->description ?? '') }}</textarea>
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

    <div class="form-group mb-3">
        <label for="time">Time</label>
        <input type="datetime-local" name="time" class="form-control @error('time') is-invalid @enderror" id="time" value="{{ old('time', isset($event) ? \Carbon\Carbon::parse($event->time)->format('F j, Y') : '') }}" required>
        @error('time')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
</form>
