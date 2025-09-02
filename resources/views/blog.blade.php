@extends('layout.app')

@section('content')
<div>
    <!-- Banner -->
    <section class="w-full mt-20 flex justify-center bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)]">
        <div class="w-[75%] h-96 bg-black/50 flex items-center justify-center rounded-2xl py-60 my-10 text-white text-5xl font-extralight">
            Media
        </div>
    </section>

    <!-- Media list -->
    <section class="flex justify-center items-center flex-col">
        <h2 class="text-2xl my-10">
            <a href="{{ url('/') }}">HOME</a> > 
            <span>MEDIA</span>
        </h2>

        <div class="mx-20 grid gap-6 p-4 grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
            @forelse($newsBlogs as $blog)
                <a href="{{ route('media.show', $blog->id) }}" class="w-full bg-white rounded-xl shadow-md overflow-hidden group">
                    <div class="relative">
                        <img 
                            src="{{ $blog->image_path ? asset($blog->image_path) : asset('storage/images/news_placeholder.jpg') }}" 
                            alt="{{ $blog->news_title }}" 
                            class="w-full h-52 object-cover group-hover:scale-105 transition duration-300"
                        >
                        <div class="absolute inset-0 bg-gradient-to-tr from-black via-transparent to-white opacity-40"></div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold mb-2">{{ $blog->news_title }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::words(strip_tags($blog->content), 10, '...') }}</p>
                    </div>
                </a>
            @empty
                <p>No media articles available.</p>
            @endforelse
        </div>
    </section>
</div>
@endsection
