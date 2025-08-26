@extends('admin.layout.admin')

@section('title', 'Career Submissions')

@section('content')
    <h1>Career Submissions</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($careerSubmissions as $submission)
            <tr>
                <td>{{ $submission->id }}</td>
                <td>{{ $submission->name }}</td>
                <td>{{ $submission->job_title }}</td>
                <td>{{ $submission->email }}</td>
                <td>{{ $submission->phone }}</td>
                <td>
                    <a href="{{ route('career_submissions.show', $submission->id) }}" class="btn btn-sm btn-primary">View</a>
                    <form action="{{ route('career_submissions.destroy', $submission->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this submission?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">No career submissions found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
