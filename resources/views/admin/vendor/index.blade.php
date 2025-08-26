@extends('admin.layout.admin')

@section('title', 'Vendors')

@section('content')
    <h1>Vendors</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Company</th>
                <th>Contact Person</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($vendors as $vendor)
            <tr>
                <td>{{ $vendor->id }}</td>
                <td>{{ $vendor->company_name }}</td>
                <td>{{ $vendor->contact_person }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->phone }}</td>
                <td>{{ $vendor->address }}</td>
                <td>{{ $vendor->service_category }}</td>
                <td>
                    <a href="{{ route('vendor.destroy', $vendor->id) }}"
                       onclick="return confirm('Delete this vendor?')"
                       class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">No vendors found.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection
