@extends('layout.app')

@section('title', 'Services')

@section('content')
<div class=" mt-28">
  {{-- Outer grid: Left static panel + Right services grid --}}
  <section class="w-full grid gap-8 px-6 lg:px-12 grid-cols-1 lg:grid-cols-3">

    {{-- ================= LEFT STATIC PANEL ================= --}}
    <aside class="rounded-3xl p-8 lg:p-10 bg-[linear-gradient(180deg,#4c236a,#2e1b56)] text-white relative overflow-hidden hidden">
      <h2 class="text-4xl font-semibold mb-8">Services</h2>

      <div class="rounded-2xl overflow-hidden border border-white/30 w-full max-w-md">
        <img
          src="{{ asset('storage/services/cover.jpg') }}"
          onerror="this.src='{{ asset(`images/placeholder/cover.jpg`) }}'"
          alt="Services cover"
          class="w-full h-[360px] object-cover"
        />
      </div>

      <a href="{{ url('/brochures') }}"
         class="mt-10 inline-flex items-center justify-center px-8 py-4 rounded-full text-lg md:text-xl font-semibold
                text-white shadow-lg
                bg-[linear-gradient(180deg,#86e27a,#1aa64f)] hover:opacity-95 transition">
        Download Brochures
      </a>
    </aside>

    {{-- ================= RIGHT SERVICES GRID ================= --}}
    <div class="lg:col-span-2">
      @php
        // soft pastel backgrounds to alternate between cards (like the screenshot)
        $cardBgs = [
          'bg-[#e7f0f7]', // light blue
          'bg-[#f3efe6]', // light sand
          'bg-[#ecf7f1]', // light mint
          'bg-[#f4eef6]', // light lavender
          'bg-[#f7f4ec]', // light cream
          'bg-[#eaf6fb]', // very light cyan
        ];
      @endphp

      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        @forelse($services as $service)
          @php $bg = $cardBgs[$loop->index % count($cardBgs)]; @endphp

          <article class="rounded-3xl p-8 {{ $bg }} border border-black/5 shadow-sm">
            {{-- Icon --}}
            <div class="mb-5">
              <img
                src="{{$service->icon_path ? asset('storage/' . $service->icon_path) : asset('images/service-icons/default.svg') }}"
                alt="{{ $service->service_name }} icon"
                class="w-10 h-10 object-contain"
                onerror="this.src='{{ asset(`images/service-icons/default.svg`) }}'"
              />
            </div>

            {{-- Title --}}
            <h3 class="text-xl font-semibold text-[#2b2b2b] mb-2">
              {{ $service->service_name }}
            </h3>

            {{-- Description (short) --}}
            <p class="text-[#505050] text-sm leading-6 mb-6">
              {{ Str::limit($service->description, 150) }}
            </p>

            {{-- CTA --}}
            <a href="{{ url('/services/'.$service->id) }}"
               class="inline-flex items-center px-6 py-2 rounded-full text-white font-semibold
                      bg-[linear-gradient(180deg,#86e27a,#1aa64f)] hover:opacity-95 transition">
              View
            </a>
          </article>
        @empty
          {{-- Dummy cards if no services exist --}}
          @for ($i = 0; $i < 6; $i++)
            @php $bg = $cardBgs[$i % count($cardBgs)]; @endphp
            <article class="rounded-3xl p-8 {{ $bg }} border border-black/5 shadow-sm">
              <div class="mb-5">
                <img src="{{ asset('images/service-icons/default.svg') }}" class="w-10 h-10" alt="Service icon" />
              </div>
              <h3 class="text-xl font-semibold text-[#2b2b2b] mb-2">Sample Service {{ $i+1 }}</h3>
              <p class="text-[#505050] text-sm leading-6 mb-6">
                This is a placeholder description. Add services in the admin to replace these.
              </p>
              <a href="#"
                 class="inline-flex items-center px-6 py-2 rounded-full text-white font-semibold
                        bg-[linear-gradient(180deg,#86e27a,#1aa64f)]">
                View
              </a>
            </article>
          @endfor
        @endforelse
      </div>
    </div>
  </section>
</div>
@endsection
