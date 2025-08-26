@extends('admin.layout.admin')

@section('title', 'Products')

@section('content')
    <h1>Products</h1>

    <div class="mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Product Name</th>
                <th>Product Category</th>
                <th>Image</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_category }}</td>
                <td>
                    @if($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="" width="60">
                    @else
                        No image
                    @endif
                </td>
                <td>{{ Str::limit($product->content, 50) }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No products found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection
