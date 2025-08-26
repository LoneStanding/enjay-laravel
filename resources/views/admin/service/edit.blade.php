@extends('admin.layout.admin')

@section('title', 'Edit Service')

@section('content')
    <h1>Edit Service</h1>

    <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Service Name</label>
            <input type="text" name="service_name" class="form-control" value="{{ $service->service_name }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required>{{ $service->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Icon (optional)</label>
            @if($service->icon_path)
                <p><img src="{{ asset('storage/' . $service->icon_path) }}" width="50"></p>
            @endif
            <input type="file" name="icon_path" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
@endsection
