<div class="relative overflow-hidden bg-gradient-to-b from-[#ffd5dc] via-[#ffe4e9] to-white">
    {{-- Wave Background --}}
    <svg
        class="absolute top-0 left-0 w-full h-[150px] z-10"
        viewBox="0 0 1440 150"
        fill="none"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none"
    >
        <path
            d="M0 0C402.47 0 1045.2 0.378 1440 0.378V76C1070.05 76 348.5 150 -11.62 150L0 0Z"
            fill="white"
        />
    </svg>

    {{-- Content --}}
    <div class="relative z-20 px-8 pt-[100px] pb-16">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-4xl font-regular ml-12 -translate-y-2.5 text-black">Media</h2>
            <a href="{{ route('products.index') }}" 
               class="bg-orange-300 text-black py-2 px-5 rounded-full">
                View All Media
            </a>
        </div>

        {{-- Carousel --}}
        <div id="news-carousel" 
             class="flex gap-6 overflow-x-auto scrollbar-hide cursor-grab active:cursor-grabbing">
            @foreach($newsBlogs as $blog)
                <div class="min-w-[250px] max-w-[250px] bg-white rounded-xl shadow-md p-4">
                    <img src="{{ asset($blog->image_path ?? 'storage/images/news_placeholder.jpg') }}" 
                         alt="media" 
                         class="w-full h-[200px] rounded-lg object-cover">

                    <h3 class="mt-2 text-lg font-semibold">{{ $blog->news_title }}</h3>
                    <p class="text-sm">
                        {{ Str::words(strip_tags($blog->content), 20, '...') }}
                    </p>
                    <a href="{{ route('products.index', $blog->news_title) }}" 
                       class="mt-2 block text-purple-700 text-sm font-medium">
                        Read Article
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Drag to scroll --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carousel = document.getElementById("news-carousel");
        let isDown = false;
        let startX;
        let scrollLeft;

        carousel.addEventListener("mousedown", (e) => {
            isDown = true;
            startX = e.pageX - carousel.offsetLeft;
            scrollLeft = carousel.scrollLeft;
        });

        carousel.addEventListener("mouseleave", () => {
            isDown = false;
        });

        carousel.addEventListener("mouseup", () => {
            isDown = false;
        });

        carousel.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - carousel.offsetLeft;
            const walk = (x - startX) * 2; // scroll speed
            carousel.scrollLeft = scrollLeft - walk;
        });
    });
</script>