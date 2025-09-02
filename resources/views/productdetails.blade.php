@extends('layout.app')

@section('content')
<div>

    <section class="text-white mt-20 bg-gray-600 h-64 w-full flex justify-center items-center text-4xl font-bold mb-5">
        {{ ucfirst($category) }}
    </section>


    <section class="flex flex-col gap-10 items-center">

        <div class="flex gap-5 justify-center">
            @foreach($products as $product)
                <button 
                    class="bg-btn-primary text-enjay-primary px-2.5 py-5 rounded-2xl"
                    onclick="showProduct('{{ $product->id }}')">
                    {{ $product->product_name }}
                </button>
            @endforeach
        </div>

        @foreach($products as $product)
    <div id="product-{{ $product->id }}" class="product-details hidden bg-white p-6 rounded-3xl shadow-md max-w-7xl">
        <h2 class="text-2xl font-semibold text-orange-600">{{ $product->product_name }}</h2>
        <div class="prose max-w-none relative">
            @if($product->image_path)
                <img 
                    src="{{ asset('storage/'.$product->image_path) }}" 
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
        // Hide all
        document.querySelectorAll('.product-details').forEach(el => el.classList.add('hidden'));
        // Show selected
        document.getElementById('product-' + id).classList.remove('hidden');
    }

    document.addEventListener("DOMContentLoaded", function() {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('product');

        if (productId && document.getElementById('product-' + productId)) {
            showProduct(productId);
        } else {
            // Show first product by default
            const first = document.querySelector('.product-details');
            if (first) first.classList.remove('hidden');
        }
    });
</script>
@endsection
