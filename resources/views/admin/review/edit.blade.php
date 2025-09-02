@extends('admin.layout.admin')

@section('title', 'Edit Review')

@section('content')
    <h1>Edit Review</h1>

    <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="profile_path" class="form-control">
            @if($review->profile_path)
                <img src="{{ asset('storage/'.$review->profile_path) }}" alt="Profile" width="60" class="mt-2">
            @endif
        </div>
        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" value="{{ $review->name }}" required>
        </div>
        <div class="mb-3">
            <label>Position *</label>
            <input type="text" name="position" class="form-control" value="{{ $review->position }}" required>
        </div>
        <div class="mb-3">
            <label>Review *</label>
            <textarea name="review" class="form-control" rows="4" required>{{ $review->review }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
