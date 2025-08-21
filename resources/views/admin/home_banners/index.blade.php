@extends('admin.layout.admin')

@section('title', 'Home Banners')

@section('content')
    <h1>Home Banners</h1>

    <div class="mb-3">
        <a href="{{ route('home_banners.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Banner
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Media Path</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($banners as $banner)
            <tr>
                <td>{{ $banner->id }}</td>
                <td>
                    @if($banner->media_path)
                        <img src="{{ asset('storage/' . $banner->media_path) }}" alt="{{ $banner->title }}" width="100">
                    @endif
                </td>
                <td>
                    <a href="{{ route('home_banners.edit', $banner->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('home_banners.destroy', $banner->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No banners found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
