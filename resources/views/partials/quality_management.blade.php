<section id="quality-management-system" class="flex flex-col gap-5 rounded-3xl mt-20 bg-gradient-to-tr from-[#f6a75a] via-white to-[#f6a75a] pb-8">
    <!-- Header -->
    <div class="mx-10 mt-10 rounded-2xl flex justify-between bg-background px-5 py-2.5 items-center">
        <h1 class="text-3xl pl-5 py-5 text-enjay-primary">
            <span class="text-enjay-head text-lexend">Quality</span><br>Management System
        </h1>
        <p class="text-end">
            GulfTek QMS is based on API Q1 certified ISO 9001:2015.<br>
            In Addition, GulfTek has following API manufacturing licenses<br>
            GulfTek Products fully comply with latest API edition<br>
            and Aramco Well control Manual 7th Edition.
        </p>
    </div>

    <!-- Licenses & Approvals -->
    <div class="flex gap-2.5 mx-10">
        <!-- API Licenses -->
        <div class="w-1/2 bg-background rounded-2xl pl-8 py-2.5 text-lg">
            <h1 class="text-enjay-primary font-bold">
                <span class="text-lexend text-enjay-head">API</span> Manufacturing Licenses
            </h1>
            <ul class="flex flex-col gap-2 mt-3 text-md">
                @foreach(['API 16A','API 7-1','API 5CT','API 16C','API 6A','API 4F','API 12J','ASME U&R'] as $item)
                    <li>
                        <img src="{{ asset('storage/images/pointer.svg') }}" alt="." class="size-5 inline">
                        {{ $item }}
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- 9COM Approvals -->
        <div class="w-1/2 bg-background rounded-2xl pl-8 py-2.5 text-lg">
            <h1 class="text-enjay-primary font-bold">
                <span class="text-lexend text-enjay-head">9COM</span> Approvals
            </h1>
            <div class="flex gap-20">
                <ul class="flex flex-col gap-2 mt-3">
                    <li class="mb-1 font-bold">9 COM</li>
                    @foreach(['6000007215','6000002865','6000002742','6000002792','6000002845','6000003823','6000003899','6000003815'] as $code)
                        <li>{{ $code }}</li>
                    @endforeach
                </ul>
                <ul class="flex flex-col gap-2 mt-3 text-lg">
                    <li class="mb-1 font-bold">Description</li>
                    @foreach([
                        'Flow Meter : Venturi Tube',
                        'Manifold; Valve Inst; Flow Meter',
                        'Flowmeter: For Reduce Piping.',
                        'Orifice: Assembly: Plate; Flange.',
                        'Thermowell: DWG AB-036019',
                        'Crossover: API-5CT',
                        'Pup Joint: CSG;API GR',
                        'Coupling: API Grade'
                    ] as $desc)
                        <li>{{ $desc }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Certificates -->
<div class="mx-10 bg-background rounded-2xl py-2.5 px-5">
    <h1 class="text-3xl pl-5 py-5">Certificates of Authorization</h1>
    <div class="py-5 flex gap-5 justify-between">
        <!-- Active certificate preview (default first) -->
        @if($certificates->isNotEmpty())
            @php $activeCert = $certificates->first(); @endphp
            <div id="active-cert" class="mb-6">
                <a href="{{ $activeCert->pdf_path ?? '#' }}" target="_blank" rel="noopener noreferrer">
                    <img 
                        src="{{ asset($activeCert->image_path ?? 'images/cert_placeholder.png') }}"
                        alt="Certificate {{ $activeCert->id }}"
                        class="rounded-xl shadow-md w-96 max-w-xl"
                    >
                </a>
            </div>
        @else
            <div id="active-cert" class="mb-6">
                <a href="#">
                    <img 
                        src="{{ asset('images/cert_placeholder.png') }}"
                        alt="Placeholder Certificate"
                        class="rounded-xl shadow-md w-96 max-w-xl"
                    >
                </a>
            </div>
        @endif

       <!-- Thumbnails -->
        <div class="grid grid-cols-4 gap-4 w-1/2">
            @foreach($certificates as $cert)
                <img 
                    src="{{ asset($cert->image_path ?? 'images/cert_placeholder.png') }}"
                    alt="Certificate {{ $cert->id }}"
                    class="cert-thumb cursor-pointer rounded-md transition-transform duration-300 hover:scale-105 border-2 {{ $loop->first ? 'border-orange-500' : 'border-transparent' }}"
                    onclick="
                        const activeCert = document.querySelector('#active-cert img');
                        const activeLink = document.querySelector('#active-cert a');
                        activeCert.src = this.src;
                        activeLink.href = `{{ $cert->pdf_path ?? '#' }}`;

                        // reset borders
                        document.querySelectorAll('.cert-thumb').forEach(el => {
                            el.classList.remove('border-orange-500');
                            el.classList.add('border-transparent');
                        });
                        this.classList.remove('border-transparent');
                        this.classList.add('border-orange-500');
                    "
                >
            @endforeach
        </div>

    </div>
</div>
</section>
