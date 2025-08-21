@extends('admin.layout.admin')

@section('title', 'Edit Banner')

@section('content')
    <h1>Edit Banner</h1>

    <form action="{{ route('home_banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Current Media</label><br>
            @if($banner->media_path)
                <img src="{{ asset('storage/' . $banner->media_path) }}" alt="{{ $banner->title }}" width="150">
            @else
                <p>No media uploaded.</p>
            @endif
        </div>

        <div class="mb-3">
            <label>Upload New Media (optional)</label>
            <input type="file" name="media" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
