@extends('layout.app')

@section('title', 'About Us')

@section('content')
<div>
    {{-- ======================= HERO MEDIA SECTION ======================= --}}
    <section id="yt-vid-embed" class="w-full flex justify-center bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)] mt-20">
        <div class="w-[85%] md:w-[75%] h-96 bg-black/50 flex items-center justify-center rounded-2xl py-60 my-10 text-white text-4xl">
            Media here
        </div>
    </section>

    {{-- ======================= ABOUT CONTENT ======================= --}}
    <section id="about" class="flex flex-col gap-20 md:gap-40 mt-10 md:mt-20 mb-10 px-5 md:px-0">
        {{-- Vision --}}
        <article class="flex flex-col md:flex-row justify-between gap-10 md:gap-0">
            <div class="flex flex-col justify-items-start justify-center md:pl-20">
                <h1 class="text-enjay-head text-3xl md:text-5xl font-lexend font-light mb-5">Our Vision</h1>
                <h2 class="text-enjay-primary font-normal text-3xl m,md:text-5xl mb-3">
                    THE NEXT ERA OF<br> INNOVATION AND<br> EXCELLENCE
                </h2>
                <p class="text-md font-light">
                    To Be the Leading Engineering Equipment<br>
                    Manufacturer & Service Provider Of Choice.
                </p>
            </div>
            <img src="{{asset('storage/about-us/compass.png')}}" class="w-full md:w-1/3 rounded-l-2xl" alt="Compass Image">
        </article>

        {{-- Mission --}}
        <article class="flex flex-col-reverse md:flex-row justify-between gap-10 md:gap-0">  
            <img src="{{ asset('storage/about-us/skyscraper.png') }}" class="w-1/3 rounded-r-2xl" alt="Skyscraper Image">
            <div class="flex flex-col md:justify-items-end justify-center md:text-end md:pr-20">
                <h1 class="text-enjay-head font-lexend font-light text-3xl md:text-5xl mb-5">Our Mission</h1>
                <h2 class="text-enjay-primary text-3xl md:text-5xl mb-3">
                    THE NEXT ERA OF<br> INNOVATION AND<br> EXCELLENCE
                </h2>
                <p class="text-md font-light">
                    To Provide Our Customers “Best Quality Products &<br>
                    Services” On Time and to Provide Our Employees<br>
                    “Job Satisfaction” Which Meets and Surpasses Their Expectations.
                </p>
            </div>
        </article>
    </section>
</div>
@endsection
