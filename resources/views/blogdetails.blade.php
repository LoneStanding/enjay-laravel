@extends('layout.app')

@section('content')
<div class="mt-20 max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-2xl">
    <img 
        src="{{ $blog->image_path ? asset($blog->image_path) : asset('storage/images/news_placeholder.jpg') }}" 
        alt="{{ $blog->news_title }}" 
        class="w-full h-[400px] object-cover rounded-xl mb-6"
    >

    <h1 class="text-3xl font-bold mb-4">{{ $blog->news_title }}</h1>
    <p class="text-sm text-gray-500 mb-6">Published: {{ $blog->created_at->format('M d, Y') }}</p>

    <div class="prose max-w-none">
        {!! $blog->content !!}
    </div>

    <div class="mt-10">
        <a href="{{ route('media.index') }}" class="text-blue-600 hover:underline">← Back to Media</a>
    </div>
</div>
@endsection
