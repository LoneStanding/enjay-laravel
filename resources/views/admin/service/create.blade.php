@extends('admin.layout.admin')

@section('title', 'Add Service')

@section('content')
    <h1>Add Service</h1>

    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Icon (optional)</label>
            <input type="file" name="icon_path" class="form-control">
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
