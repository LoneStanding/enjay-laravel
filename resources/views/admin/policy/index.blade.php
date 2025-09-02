@extends('admin.layout.admin')

@section('title', 'Policies')

@section('content')
    <h1>Policies</h1>

    <div class="mb-3">
        <a href="{{ route('policies.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Policy
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($policies as $policy)
            <tr>
                <td>{{ $policy->id }}</td>
                <td>{{ $policy->name }}</td>
                <td>
                    @if($policy->img_path)
                        <img src="{{ asset('storage/' . $policy->img_path) }}" alt="Policy Image" width="80">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('policies.edit', $policy->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('policies.destroy', $policy->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this policy?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No policies found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
