@extends('admin.layout.admin')

@section('title', 'Reviews')

@section('content')
    <h1>Reviews</h1>

    <div class="mb-3">
        <a href="{{ route('reviews.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Review
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Position</th>
                <th>Review</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>
                    @if($review->profile_path)
                        <img src="{{ asset('storage/'.$review->profile_path) }}" alt="Profile" width="50" height="50">
                    @else
                        <img src="{{ asset('images/default-profile.png') }}" alt="Default" width="50" height="50">
                    @endif
                </td>
                <td>{{ $review->name }}</td>
                <td>{{ $review->position }}</td>
                <td>{{ Str::limit($review->review, 50) }}</td>
                <td>
                    <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this review?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No reviews found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
