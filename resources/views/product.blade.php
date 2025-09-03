@extends('layout.app')

@section('content')
<div>
    <!-- Media section -->
    <section class="w-full mt-20 flex justify-center bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)]">
    <div class="w-[85%] md:w-[75%] h-96 bg-black/50 flex items-center justify-center rounded-2xl py-60 my-10 text-white text-4xl">
            Media here
        </div>
    </section>

    <!-- Products section -->
    <section id="products" class="flex justify-center items-center flex-col">
        <h2 class="text-2xl my-10">
            <a href="{{ url('/') }}">HOME</a> > 
            <a href="{{ route('products.index') }}">PRODUCTS</a>
        </h2>

        <div class="flex flex-wrap gap-6 p-4 md:px-20 cursor-pointer justify-start w-full">
            @if($categories->count() > 0)
                @foreach($categories as $cat)
                    @php
                        // Fetch first product of this category
                        $firstProduct = \App\Models\Product::where('category', $cat->category)->first();
                    @endphp
                    <a href="{{ url('/products/'.$cat->category) }}" class="w-full md:w-[16rem] flex-shrink-0 group">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img 
                                src="{{ $firstProduct && $firstProduct->image_path 
                                        ? asset('storage/'.$firstProduct->image_path) 
                                        : asset('storage/images/product_placeholder.png') }}" 
                                alt="{{ $cat->category }}" 
                                class="w-full h-[20rem] object-cover" 
                                draggable="false"
                            >
                            <div class="absolute inset-0 bg-gradient-to-tr from-black via-transparent to-white opacity-50 pointer-events-none"></div>
                        </div>
                        <p class="text-enjay-primary px-2 py-1 text-center md:text-left">
                            {{ ucfirst($cat->category) }}
                        </p>
                    </a>
                @endforeach
            @else
                {{-- Dummy products --}}
                @foreach(range(1,3) as $i)
                    <div class="w-52 flex-shrink-0 group">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img 
                                src="{{ asset('storage/images/product_placeholder.png') }}" 
                                alt="Dummy Product {{ $i }}" 
                                class="w-full h-52 object-cover" 
                                draggable="false"
                            >
                            <div class="absolute inset-0 bg-gradient-to-tr from-black via-transparent to-white opacity-50 pointer-events-none"></div>
                        </div>
                        <p class="text-enjay-primary px-2 py-1">
                            Dummy Product {{ $i }}
                        </p>
                    </div>
                @endforeach
            @endif
        </div>
    </section>
</div>
@endsection
