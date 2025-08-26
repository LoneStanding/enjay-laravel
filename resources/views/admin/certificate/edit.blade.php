@extends('admin.layout.admin')

@section('title', 'Edit Certificate')

@section('content')
    <h1>Edit Certificate</h1>

    <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>PDF</label>
            <input type="file" name="pdf_path" class="form-control">
            <a href="{{ asset('storage/' . $certificate->pdf_path) }}" target="_blank">Current PDF</a>
        </div>
        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="img_path" class="form-control">
            <img src="{{ asset('storage/' . $certificate->img_path) }}" width="100">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
