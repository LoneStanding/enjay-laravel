@extends('admin.layout.admin')

@section('title', 'Services')

@section('content')
    <h1>Services</h1>

    <div class="mb-3">
        <a href="{{ route('services.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Service
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Name</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->service_name }}</td>
                <td>{{ $service->description }}</td>
                <td>
                    @if($service->icon_path)
                        <img src="{{ asset('storage/' . $service->icon_path) }}" alt="icon" width="50">
                    @else
                        <span>No Icon</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('services.edit', $service->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No services found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
