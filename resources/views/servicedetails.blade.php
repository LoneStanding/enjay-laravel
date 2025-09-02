@extends('layout.app')

@section('title', $service->service_name)

@section('content')
<div class="mt-28 px-6 lg:px-20">
    <section class="max-w-5xl mx-auto bg-white rounded-3xl shadow-md p-10 relative">

        {{-- Header --}}
        <div class="flex items-center gap-6 mb-8">
            {{-- Icon --}}
            <img 
                src="{{ $service->icon_path ? asset('storage/'.$service->icon_path) : asset('images/service-icons/default.svg') }}"
                alt="{{ $service->service_name }} icon"
                class="w-16 h-16 object-contain"
                onerror="this.src='{{ asset("images/service-icons/default.svg") }}'"
            />

            {{-- Title --}}
            <h1 class="text-3xl font-bold text-gray-800">
                {{ $service->service_name }}
            </h1>
        </div>

        {{-- Description --}}
        <div class="prose max-w-none text-gray-700 text-lg leading-relaxed">
            {!! nl2br(e($service->description)) !!}
        </div>

        {{-- Back button --}}
        <div class="mt-10">
            <a href="/services"
               class="inline-flex items-center px-8 py-3 rounded-full text-white font-semibold
                      bg-[linear-gradient(180deg,#86e27a,#1aa64f)] hover:opacity-95 transition">
                ← Back to Services
            </a>
        </div>
    </section>
</div>
@endsection
