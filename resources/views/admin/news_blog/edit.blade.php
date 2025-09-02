@extends('admin.layout.admin')

@section('title', 'Edit News Blog')

@section('content')
    <div class="container">
        <h1 class="mb-4">Edit News Blog</h1>

        <form action="{{ route('news_blog.update', $news_blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Title -->
            <div class="mb-3">
                <label for="news_title" class="form-label">Title</label>
                <input type="text" name="news_title" id="news_title" 
                       class="form-control @error('news_title') is-invalid @enderror" 
                       value="{{ old('news_title', $newsblog->news_title) }}" required>
                @error('news_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tag -->
            <div class="mb-3">
                <label for="tag" class="form-label">Tag</label>
                <input type="text" name="tag" id="tag" 
                       class="form-control @error('tag') is-invalid @enderror" 
                       value="{{ old('tag', $newsblog->tag) }}" required>
                @error('tag')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Replace Image (optional)</label>
                <input type="file" name="image" id="image" 
                       class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                @if($newsblog->image_path)
                    <div class="mt-2">
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/'.$newsblog->image_path) }}" 
                             alt="Blog Image" width="150" class="img-thumbnail">
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="6" 
                          class="form-control @error('content') is-invalid @enderror" required>{{ old('content', $newsblog->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="btn btn-primary">Update Blog</button>
        </form>
    </div>
@endsection
