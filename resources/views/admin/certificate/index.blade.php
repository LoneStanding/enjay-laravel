@extends('admin.layout.admin')

@section('title', 'Certificates')

@section('content')
    <h1>Certificates</h1>

    <div class="mb-3">
        <a href="{{ route('certificates.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Certificate
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Preview</th>
                <th>PDF</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($certificates as $certificate)
            <tr>
                <td>{{ $certificate->id }}</td>
                <td><img src="{{ asset('storage/' . $certificate->img_path) }}" width="100"></td>
                <td><a href="{{ asset('storage/' . $certificate->pdf_path) }}" target="_blank">View PDF</a></td>
                <td>
                    <a href="{{ route('certificates.edit', $certificate->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('certificates.destroy', $certificate->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this certificate?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No certificate found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
