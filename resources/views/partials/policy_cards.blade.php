<div class="flex h-[80vh] w-full">
    @foreach($policies as $i => $policy)
        <div 
            x-data="{ hover: false }"
            x-on:mouseenter="hover = true"
            x-on:mouseleave="setTimeout(() => hover = false, 300)" {{-- delay hover-out by 300ms --}}
            class="group relative flex flex-col text-white overflow-hidden transition-[flex-grow] duration-1000 ease-in-out"
            :class="hover ? 'flex-[5] justify-start' : 'flex-[1] justify-end'"
            style="min-width:150px;"
        >
            {{-- Background --}}
            <div 
                class="absolute inset-0 transition-all duration-1000 ease-in-out"
                :style="`background-image:url('{{ asset($policy->img_path ?? 'images/dummy-policy.jpg') }}'); 
                         background-size:${hover ? '115%' : 'cover'}; 
                         background-position:center; background-repeat:no-repeat; z-index:0;`"
            ></div>

            {{-- Content --}}
            <div class="relative z-10 p-6">
                <h3 class="text-2xl font-bold">{{ $policy->name }}</h3>
                <div class="mt-3 text-sm">{!! $policy->content !!}</div>
            </div>
        </div>
    @endforeach
</div>