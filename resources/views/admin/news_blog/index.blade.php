@extends('admin.layout.admin')

@section('title', 'News Blogs')

@section('content')
    <h1>News Blogs</h1>

    <div class="mb-3">
        <a href="{{ route('news_blog.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add News Blog
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Tag</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($newsBlogs as $blog)
            <tr>
                <td>{{ $blog->id }}</td>
                <td>{{ $blog->news_title }}</td>
                <td>{{ $blog->tag }}</td>
                <td>
                    @if($blog->image_path)
                        <img src="{{ asset('storage/'.$blog->image_path) }}" alt="Blog Image" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('news_blog.edit',$blog) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('news_blog.destroy', $blog) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this news blog?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">No news blogs found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
