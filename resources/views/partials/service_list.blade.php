<div class="grid grid-cols-1 lg:grid-cols-2 font-light justify-items-center lg:justify-items-start">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @foreach($services as $service)
            <div class="flex items-start space-x-3 group">
                {{-- Uniform vertical bar --}}
                <div class="w-[4.5px] h-12 bg-gray-400 group-hover:bg-orange-600 transition-colors duration-500 shrink-0"></div>
                
                {{-- Icon and text --}}
                <div class="flex items-start space-x-3">
                    @if($service->icon_path)
                        <img src="{{ asset('storage/' . $service->icon_path) }}" alt="icon" class="w-12 h-12 object-contain shrink-0" />
                    @else
                        <img src="{{ asset('storage/images/default-icon.png') }}" alt="default icon" class="w-12 h-12 object-contain shrink-0" />
                    @endif
                    <div class="text-sm leading-snug w-full">{{ $service->service_name }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
