@extends('admin.layout.admin')

@section('title', 'Edit Policy')

@section('content')
    <h1>Edit Policy</h1>

    <form action="{{ route('policies.update', $policy->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Policy Name</label>
            <input type="text" name="name" id="name" class="form-control"
                   value="{{ old('name', $policy->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="6" required>{{ old('content', $policy->content) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="img_path" class="form-label">Image (optional)</label>
            <input type="file" name="img_path" id="img_path" class="form-control">

            @if($policy->img_path)
                <p class="mt-2">Current Image:</p>
                <img src="{{ asset('storage/' . $policy->img_path) }}" alt="Policy Image" width="120">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Policy</button>
        <a href="{{ route('policies.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
</script>
@endpush
