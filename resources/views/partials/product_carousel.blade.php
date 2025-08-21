<div>
    <div class="relative mt-20 bg-[linear-gradient(to_top_right,#f6a75a,#ffffff,#f6a75a)] pt-5 pb-40 rounded-3xl">
        <div class="flex justify-between items-center mb-2.5">
            <h1 class="text-4xl pl-20">
                Our Products
                <span class="block w-80 border-b-2 border-orange-300 mt-2.5"></span>
            </h1>
            <p class="font-light text-end pr-36 translate-y-1/6">
                We are proud of our customer centric<br />
                approach and the best in class services to<br />
                provide innovative solutions to our customers.
            </p>
        </div>

        <!-- Left/Right Buttons -->
        <div class="absolute left-2 top-1/2 -translate-y-1/5 z-10 flex flex-col gap-2 justify-center">
            <button onclick="scrollProducts('left')" class="text-white px-3 py-1 rounded">
                <img src="{{ asset('storage/images/l_arrow.svg') }}" class="size-12" alt="Left" />
            </button>
            <button onclick="scrollProducts('right')" class="text-white px-3 py-1 rounded">
                <img src="{{ asset('storage/images/r_arrow.svg') }}" class="size-12" alt="Right" />
            </button>
        </div>

        <!-- Scrollable Product Row -->
        <div
            id="productScroll"
            class="flex gap-4 overflow-x-auto pl-28 py-4 scrollbar-hide scroll-smooth cursor-pointer translate-y-1/5"
        >
            @foreach($carouselProducts as $product)
                <div class="w-80 flex-shrink-0 group">
                    <div class="relative overflow-hidden rounded-2xl">
                        <!-- Product Image -->
                        @if($product->image_path && $product->image_path !== 'images/product_placeholder.png')
                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                alt="{{ $product->product_name }}"
                                class="w-full h-[24rem] object-cover transition-transform duration-500 group-hover:scale-110"
                                draggable="false">
                        @else
                            <img src="{{ asset('storage/images/product_placeholder.png') }}"
                                alt="{{ $product->product_name }}"
                                class="w-full h-[24rem] object-cover"
                                draggable="false">
                        @endif

                        <!-- Diagonal gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-black via-transparent to-white opacity-50 pointer-events-none"></div>

                        <!-- Product name -->
                        <p class="absolute bottom-2 left-2 text-white px-2 py-1 text-sm">
                            {{ $product->product_name }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- See All Products Button -->
    <div class="flex justify-center">
        <a href="{{ route('products.index') }}"
           class="bg-btn-primary rounded-lg px-5 py-2.5 -translate-y-5 text-xl font-light">
            See All Products
        </a>
    </div>
</div>

<!-- Carousel Scroll Script -->
<script>
    function scrollProducts(dir) {
        const el = document.getElementById('productScroll');
        const amount = 300;
        el.scrollBy({
            left: dir === 'left' ? -amount : amount,
            behavior: 'smooth'
        });
    }
</script>
