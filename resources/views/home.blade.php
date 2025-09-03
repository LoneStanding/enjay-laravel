@extends('layout.app')

@section('content')
    <section class="hero mt-20">
       {{-- ======================= HERO SECTION (Carousel) ======================= --}}
        <section class="bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)] text-white py-8">
            <div class="container mx-auto px-4">

                {{-- Swiper Carousel --}}
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @forelse($banners as $banner)
                            <div class="swiper-slide flex justify-center items-center">
                                @php
                                    $ext = strtolower(pathinfo($banner->media_path, PATHINFO_EXTENSION));
                                @endphp

                                @if(in_array($ext, ['mp4', 'webm', 'ogg']))
                                    <video src="{{ asset('storage/' . $banner->media_path) }}" autoplay loop class="w-full h-96 object-cover rounded-lg"></video>
                                @else
                                    <img src="{{ asset('storage/' . $banner->media_path) }}" alt="Banner" class="w-full h-96 object-cover rounded-lg">
                                @endif
                            </div>
                        @empty
                            {{-- Fallback slides --}}
                            @for($i = 0; $i < 3; $i++)
                                <div class="swiper-slide flex justify-center items-center bg-gray-800 h-96 py-64 px-20 rounded-xl text-center">
                                    <span class="text-gray-300 text-2xl">Media Here</span>
                                </div>
                            @endfor
                        @endforelse

                    </div>

                    {{-- Swiper navigation --}}
                    <div class="swiper-button-next !text-black"></div>
                    <div class="swiper-button-prev !text-black"></div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section>
        {{-- ======================= END HERO SECTION ======================= --}}
        @push('styles')
            <style>
                /* Make pagination dots black */
                .swiper-pagination-bullet {
                    background: black !important;
                    opacity: 0.6;
                }

                /* Active dot */
                .swiper-pagination-bullet-active {
                    background: black !important;
                    opacity: 1;
                }
            </style>
        @endpush

    </section>
    {{-- ======================= INTRO SECTION ======================= --}}
    <section id="intro" class="w-full flex flex-col md:flex-row justify-center gap-5 lg:gap-80 mt-10 lg:mt-20 mb-5 lg:mb-64 px-5 lg:px-0">
        <div class="flex flex-col justify-items-start px-5 lg:px-0 lg:pl-40">
            <h1 class="text-enjay-head text-3xl font-light mb-5 lg:mt-20 font-lexend">Introducing</h1>

            <div class="text-enjay-primary text-xl lg:text-4xl mb-3">
                <h2>THE NEXT ERA OF <br> INNOVATION AND <br> EXCELLENCE</h2>
            </div>

            <div class="font-light text-enjay-primary">
                <p class="text-lg lg:leading-8">
                    We lead the way with our team and strategic <br>
                    alliances to achieve operational excellence, <br>
                    innovation, and positive economic impact.
                </p>
            </div>

            <div>
                <a href="{{ url('/about-us') }}" 
                class="bg-btn-primary rounded-lg px-5 py-2.5 mt-10 text-sm lg:text-xl font-light inline-block">
                    About Us
                </a>
            </div>
        </div>

        <div class="relative w-fit mr-20">
            <div class="w-80 lg:w-60 lg:h-96 py-50 lg:py-64 lg:px-52 bg-black lg:mr-20 rounded-2xl">
            </div>

            {{-- Overlapping Image Card --}}
            <div class="absolute -bottom-48 lg:-left-24 w-80 lg:w-60 h-80 rounded-lg overflow-hidden shadow-lg hidden lg:block">
                <img src="{{ asset('images/home2.png') }}" 
                    alt="Overlapping" 
                    class="w-full h-full object-cover">
            </div>
        </div>
    </section>


    @include('partials.product_carousel', ['carouselProducts' => $carouselProducts])

    <section id="service" class="mt-20 flex justify-between flex-col lg:flex-row">
        <!-- Left Intro -->
        <div class="flex flex-col justify-center gap-2.5 pl-5 lg:pl-20">
<h1 class="text-enjay-primary text-3xl mb-1 lg:mb-10 inline-bloc w-fit lg:w-auto">
  Our Services
  <span class="block lg:w-80 border-b-2 border-orange-300 mt-2.5"></span>
</h1>
            <p class="text-lg">
                We are proud of our customer<br>
                centric approach and the best<br>
                in class services to provide<br>
                innovative solutions to our<br>
                customers.
            </p>
            <a href="/services" 
            class="bg-btn-primary rounded-lg px-5 py-2.5 mt-2 lg:mt-10 w-fit text-sm md:text-xl font-light">
                See All Services
            </a>
        </div>

        <!-- Right: Service List -->
        <div class="w-full lg:w-1/2 mt-10 lg:mt-0">
            @include('partials.service_list', ['services' => $homeServices])
        </div>
    </section>

    @include('partials.policy_cards', ['policies' => $policies])

    @include('partials.quality_management', ['certificates' => $certificates])

    @include('partials.news_blog', ['newsBlogs' => $newsBlogs])

    @include('partials.review_carousel', ['reviews' => $reviews])

@endsection