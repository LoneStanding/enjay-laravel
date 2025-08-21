@extends('admin.layout.admin')

@section('title', 'Add Career')

@section('content')
    <h1>Add Career</h1>

    <form action="{{ route('career.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Job Title</label>
            <input type="text" name="job_title" class="form-control" value="{{ old('job_title') }}" required>
        </div>

        <div class="mb-3">
            <label>Qualification</label>
            <input type="text" name="qualification" class="form-control" value="{{ old('qualification') }}">
        </div>

        <div class="mb-3">
            <label>Experience</label>
            <input type="text" name="experience" class="form-control" value="{{ old('experience') }}">
        </div>

        <div class="mb-3">
            <label>Nationality</label>
            <input type="text" name="nationality" class="form-control" value="{{ old('nationality') }}">
        </div>

        <div class="mb-3">
            <label>Job Status</label>
            <select name="job_status" class="form-control" required>
                <option value="active" {{ old('job_status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ old('job_status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Job Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location') }}">
        </div>

        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
        </div>

        <div class="mb-3">
            <label>Job Description</label>
            <textarea name="job_description" class="form-control" rows="5">{{ old('job_description') }}</textarea>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
@endsection
