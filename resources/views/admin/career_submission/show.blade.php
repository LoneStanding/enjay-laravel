@extends('admin.layout.admin')

@section('title', 'Career Submission Details')

@section('content')
    <h1>Career Submission Details</h1>

    <table class="table table-bordered">
        <tr><th>ID</th><td>{{ $submission->id }}</td></tr>
        <tr><th>Referral Name</th><td>{{ $submission->referal_name ?? '-' }}</td></tr>
        <tr><th>Gender</th><td>{{ $submission->gender }}</td></tr>
        <tr><th>Name</th><td>{{ $submission->name }}</td></tr>
        <tr><th>Nationality</th><td>{{ $submission->nationality }}</td></tr>
        <tr><th>Job Title</th><td>{{ $submission->job_title }}</td></tr>
        <tr><th>Email</th><td>{{ $submission->email }}</td></tr>
        <tr><th>Phone</th><td>{{ $submission->phone }}</td></tr>
        <tr><th>Experience</th><td>{{ $submission->experience }}</td></tr>
        <tr><th>Current Salary</th><td>{{ $submission->current_salary }}</td></tr>
        <tr><th>Expected Salary</th><td>{{ $submission->expected_salary }}</td></tr>
        <tr>
            <th>CV</th>
            <td>
                @if($submission->path_to_cv)
                    <a href="{{ asset('storage/'.$submission->path_to_cv) }}" target="_blank">View CV</a>
                @else
                    No CV
                @endif
            </td>
        </tr>
    </table>

    <a href="{{ route('career_submissions.index') }}" class="btn btn-secondary">Back</a>
@endsection
