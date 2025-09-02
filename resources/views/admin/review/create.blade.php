@extends('admin.layout.admin')

@section('title', 'Add Review')

@section('content')
    <h1>Add Review</h1>

    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Profile Image</label>
            <input type="file" name="profile_path" class="form-control">
        </div>
        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Position *</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Review *</label>
            <textarea name="review" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
