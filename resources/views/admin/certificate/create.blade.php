@extends('admin.layout.admin')

@section('title', 'Add Certificate')

@section('content')
    <h1>Add Certificate</h1>

    <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>PDF</label>
            <input type="file" name="pdf_path" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="img_path" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
