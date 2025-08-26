@extends('layout.app')

@section('content')
<div>
    <!-- Banner -->
    <section class="text-white bg-gray-600 h-64 w-full flex justify-center items-center text-4xl font-bold mb-5">
        {{ ucfirst($category) }}
    </section>

    <section class="flex flex-col gap-10 items-center">
        <!-- Tabs for products -->
        <div class="flex gap-5 justify-center flex-wrap">
            @foreach($products as $product)
                <button 
                    class="bg-orange-200 text-orange-700 px-4 py-2 rounded-2xl font-semibold hover:bg-orange-300 transition"
                    onclick="showProduct({{ $product->id }})"
                >
                    {{ $product->product_name }}
                </button>
            @endforeach
        </div>

        <!-- Product Details -->
        @foreach($products as $product)
            <div id="product-{{ $product->id }}" class="hidden bg-white p-6 rounded-3xl shadow-md max-w-7xl">
                <h2 class="text-2xl font-semibold text-orange-600">{{ $product->product_name }}</h2>
                
                <div class="prose max-w-none relative">
                    @if($product->image_path)
                        <img 
                            src="{{ asset($product->image_path) }}" 
                            alt="{{ $product->product_name }}" 
                            class="size-80 float-right h-auto rounded-md"
                        />
                    @endif

                    <div>
                        {!! $product->content !!}
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</div>

<script>
    function showProduct(id) {
        // Hide all product divs
        document.querySelectorAll('[id^="product-"]').forEach(el => el.classList.add('hidden'));
        // Show selected one
        document.getElementById('product-' + id).classList.remove('hidden');
    }

    // Show first product by default
    document.addEventListener("DOMContentLoaded", () => {
        let first = document.querySelector('[id^="product-"]');
        if (first) first.classList.remove('hidden');
    });
</script>
@endsection
