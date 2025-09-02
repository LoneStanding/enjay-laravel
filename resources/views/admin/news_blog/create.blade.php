@extends('admin.layout.admin')

@section('title', 'Add News Blog')

@section('content')
    <h1>Add News Blog</h1>

    <form action="{{ route('news_blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="news_title" class="form-label">Title</label>
            <input type="text" name="news_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="tag" class="form-label">Tag</label>
            <input type="text" name="tag" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (optional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
