@extends('admin.layout.admin')

@section('title', 'Add Product')

@section('content')
    <h1>Add Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Product Category</label>
            <input type="text" name="product_category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image_path" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
@endsection
