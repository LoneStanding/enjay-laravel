@extends('admin.layout.admin')

@section('title', 'Add Policy')

@section('content')
    <h1>Add Policy</h1>

    <form action="{{ route('policies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Policy Name</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="img_path" class="form-label">Image (optional)</label>
            <input type="file" name="img_path" id="img_path" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save Policy</button>
        <a href="{{ route('policies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
@endpush
