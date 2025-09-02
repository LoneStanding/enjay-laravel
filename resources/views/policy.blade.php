@extends('layout.app')

@section('title', 'Our Policies')

@section('content')
<div>
    {{-- ======================= HERO MEDIA SECTION ======================= --}}
    <section class="w-full flex justify-center bg-[linear-gradient(to_top_right,#fef7e4,#ffffff,#f6a75a)] mt-20">
        <div class="w-[75%] h-96 bg-black/50 flex items-center justify-center rounded-2xl py-60 my-10 text-white text-4xl">
            Media here
        </div>
    </section>

    {{-- ======================= POLICIES CONTENT ======================= --}}
    <section id="policies" class="flex flex-col gap-40 mt-20 mb-10">
        @foreach($policies as $index => $policy)
            <article class="flex justify-around {{ $index % 2 == 0 ? '' : 'flex-row-reverse' }}">
                <div class="flex flex-col justify-center {{ $index % 2 == 0 ? 'pl-20' : 'pr-20 text-end' }}">
                    <h1 class="text-enjay-head text-3xl font-regular mb-5">{{ $policy->name }}</h1>
                    <div class="text-md font-light">
                        {!! nl2br(e($policy->content)) !!}
                    </div>
                </div>
                @if($policy->img_path)
                    <img src="{{asset('storage/' . $policy->img_path) }}" class="w-1/3 rounded-2xl" alt="{{ $policy->name }} image">
                @endif
            </article>
        @endforeach
    </section>
</div>
@endsection
