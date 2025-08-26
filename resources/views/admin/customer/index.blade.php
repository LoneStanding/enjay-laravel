@extends('admin.layout.admin')

@section('title', 'Customers')

@section('content')
    <h1>Customers</h1>

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
                <th>Location</th>
                <th>Requirements</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @forelse($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->company }}</td>
                <td>{{ $customer->location }}</td>
                <td>{{ $customer->requirements }}</td>
                <td>
                    <a href="{{ route('customer.destroy', $customer->id) }}"
                       onclick="return confirm('Delete this customer?')"
                       class="btn btn-sm btn-danger">
                        Delete
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">No customers found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
