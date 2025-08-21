@extends('layout.app')

@section('content')
<div>
    <!-- Media section -->
    <section class="w-full mt-20 flex justify-center bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)]">
        <div class="w-[75%] h-96 bg-black/50 flex items-center justify-center rounded-2xl py-60 my-10 text-white text-5xl font-extralight">
            Media here
        </div>
    </section>

    <!-- Products section -->
    <section id="products" class="flex justify-center items-center flex-col">
        <h2 class="text-2xl my-10">
            <a href="{{ url('/') }}">HOME</a> > 
            <a href="{{ route('products.index') }}">PRODUCTS</a>
        </h2>

        <div class="grid gap-6 p-4 cursor-pointer grid-cols-5">
            @if($categories->count() > 0)
                @foreach($categories as $cat)
                    <a href="{{ url('/products/'.$cat->category) }}" class="w-52 flex-shrink-0 group">
                        <div class="relative overflow-hidden rounded-2xl">
                            <img 
                                src="{{ $cat->image_path ?? asset('placeholder/product.png') }}" 
                                alt="{{ $cat->category }}" 
                                class="w-full h-52 object-cover" 
                                draggable="false"
                            >
                            <div class="absolute inset-0 bg-gradient-to-tr from-black via-transparent to-white opacity-50 pointer-events-none"></div>
                        </div>
                        <p class="text-enjay-primary px-2 py-1">
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
                                src="{{ asset('placeholder/product.png') }}" 
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
