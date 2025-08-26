@extends('admin.layout.admin')

@section('title', 'Edit Product')

@section('content')
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Category</label>
            <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
        </div>
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
        </div>
        <div class="mb-3">
            <label>Product Category</label>
            <input type="text" name="product_category" class="form-control" value="{{ $product->product_category }}" required>
        </div>
        <div class="mb-3">
            <label>Content</label>
            <textarea name="content" class="form-control" rows="5" required>{{ $product->content }}</textarea>
        </div>
        <div class="mb-3">
            <label>Image</label><br>
            @if($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" width="100" alt="">
            @endif
            <input type="file" name="image_path" class="form-control mt-2">
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
@endsection
