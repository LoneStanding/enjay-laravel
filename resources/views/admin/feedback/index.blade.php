@extends('admin.layout.admin')

@section('title', 'Feedback')

@section('content')
    <h1>Feedback</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
                <th>Feedback</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($feedbacks as $feedback)
            <tr>
                <td>{{ $feedback->id }}</td>
                <td>{{ $feedback->name }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->phone }}</td>
                <td>{{ $feedback->company }}</td>
                <td>{{ $feedback->feedback }}</td>
                <td>
                    <a href="{{ route('feedback_list.destroy', $feedback->id) }}"
                       onclick="return confirm('Delete this feedback?')"
                       class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">No feedback found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
