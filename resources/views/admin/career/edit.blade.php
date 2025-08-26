@extends('admin.layout.admin')

@section('title', 'Edit Career')

@section('content')
    <h1>Edit Career</h1>

    <form action="{{ route('career.update', $career->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="job_title" class="form-label">Job Title</label>
            <input type="text" name="job_title" id="job_title" 
                   class="form-control" value="{{ old('job_title', $career->job_title) }}" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" name="category" id="category" 
                   class="form-control" value="{{ old('category', $career->category) }}">
        </div>

        <div class="mb-3">
            <label for="qualification" class="form-label">Qualification</label>
            <input type="text" name="qualification" id="qualification" 
                   class="form-control" value="{{ old('qualification', $career->qualification) }}">
        </div>

        <div class="mb-3">
            <label for="experience" class="form-label">Experience</label>
            <input type="text" name="experience" id="experience" 
                   class="form-control" value="{{ old('experience', $career->experience) }}">
        </div>

        <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <input type="text" name="nationality" id="nationality" 
                   class="form-control" value="{{ old('nationality', $career->nationality) }}">
        </div>

        <div class="mb-3">
            <label for="job_status" class="form-label">Job Status</label>
            <select name="job_status" id="job_status" class="form-control">
                <option value="open" {{ old('job_status', $career->job_status) == 'open' ? 'selected' : '' }}>Open</option>
                <option value="closed" {{ old('job_status', $career->job_status) == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" name="location" id="location" 
                   class="form-control" value="{{ old('location', $career->location) }}">
        </div>

        <div class="mb-3">
            <label for="job_description" class="form-label">Job Description</label>
            <textarea name="job_description" id="job_description" 
                      class="form-control" rows="6">{{ old('job_description', $career->job_description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Career</button>
        <a href="{{ route('career.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection
