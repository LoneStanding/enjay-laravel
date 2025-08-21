@extends('admin.layout.admin')

@section('title', 'Add Banner')

@section('content')
    <h1>Add Banner</h1>

    <form action="{{ route('home_banners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Media</label>
            <input type="file" name="media" class="form-control" accept="image/*" required>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection

