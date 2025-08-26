@extends('admin.layout.admin')

@section('title', 'Careers')

@section('content')
    <h1>Career</h1>

    <div class="mb-3">
        <a href="{{ route('career.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Career
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @forelse($careers as $career)
            <tr>
                <td>{{ $career->id }}</td>
                <td>
                    @if($career->title)
                        {{ $career->title }}
                    @endif
                </td>
                <td>
                    @if($career->location)
                        {{ $career->location }}
                    @endif
                </td>
                <td>
                    @if($career->status)
                        {{ $career->location }}
                    @endif
                </td>
                <td>
                    <a href="{{ route('career.edit', $career->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('career.destroy', $career->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this banner?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No career found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
