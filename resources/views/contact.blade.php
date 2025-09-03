{{-- resources/views/contact.blade.php --}}
@extends('layout.app')

@section('content')
<div class="mt-32">
    <div class="flex flex-col md:flex-row justify-start gap-10 pt-0 md:pt-20 bg-center pb-10 md:px-5 lg:px-0"
         style="background-image: url('{{ asset('storage/contact-us/factory.png') }}')">
         
        {{-- Map Section --}}
        <section class="rounded-r-3xl w-full md:w-1/2 h-96 bg-top bg-cover relative cursor-pointer"
                 onclick="window.open('https://maps.app.goo.gl/We5bDx2zBZVZpbgR6', '_blank')"
                 style="background-image: url('{{ asset('storage/contact-us/map.png') }}')">
            <div class="absolute bottom-0 left-0 w-full bg-black/60 text-white p-4">
                <h2 class="mb-2">Our Address</h2>
                <p class="font-light">
                    Gulftek: Head Office - Dammam,<br> Second Industrial City,<br>
                    P.O.Box: 7286, Street 85, Cross 134,<br>Zip Code: 34332-3122<br>
                    Tel: +966 13 8376541/2
                </p>
                <p class="font-light">
                    Email: info@gulftekarabia.com<br><br>
                    Dubai Office - P.O.Box 691369, Dubai, UAE.
                </p>
            </div>
        </section>

        {{-- Buttons Section --}}
        <section class="flex flex-col rounded-3xl w-full items-center">
            <h1 class="text-3xl md:text-5xl font-medium">CONTACT FORMS</h1>
            <div class="grid grid-cols-2 gap-5 w-full py-10 px-5 md:px-0">
                <button onclick="setActiveForm('form1')" id="btn-form1" class="px-4 py-5 rounded-2xl w-full bg-btn-primary text-white">
                    <span class="block text-lg md:text-2xl">CUSTOMER</span>
                    <span class="block text-lg md:text-2xl">REGISTRATION</span>
                </button>
                <button onclick="setActiveForm('form2')" id="btn-form2" class="px-4 py-5 rounded-2xl w-full bg-btn-primary text-white">
                    <span class="block text-lg md:text-2xl">SUPPLIER</span>
                    <span class="block text-lg md:text-2xl">REGISTRATION</span>
                </button>
                <button onclick="setActiveForm('form3')" id="btn-form3" class="px-4 py-5 rounded-2xl w-full bg-btn-primary text-white">
                    <span class="text-lg md:text-2xl">SUBMIT A TICKET</span>
                </button>
                <button onclick="setActiveForm('form4')" id="btn-form4" class="px-4 py-5 rounded-2xl w-full bg-btn-primary text-white">
                    <span class="block text-lg md:text-2xl">FEEDBACK</span>
                    <span class="block text-lg md:text-2xl">FORM</span>
                </button>
            </div>
        </section>
    </div>

    <section class="pt-5 md:pt-10">
        {{-- Customer Registration --}}
        <form id="form1" action="{{ route('customer_list.public_store') }}" onsubmit="submitForm(event)" class="hidden max-w-3xl mx-auto p-6 bg-white rounded-lg space-y-6">
            <h2 class="text-xl md:text-2xl font-semibold">
                Customer <span class="block">Registration</span>
                <span class="block w-16 border-b-2 border-orange-300 mt-1"></span>
            </h2>

            <div class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label class="block mb-2 font-medium">First Name</label>
                    <input name="firstName" type="text" placeholder="First Name" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block mb-2 font-medium">Last Name</label>
                    <input name="lastName" type="text" placeholder="Last Name" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
                </div>
            </div>

            <div>
                <label class="block mb-2 font-medium">Email Address</label>
                <input name="email" type="email" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
            </div>

            <div class="flex flex-wrap gap-4">
                <div class="w-[180px]">
                    <label class="block mb-2 font-medium">Country Code</label>
                    <input name="countryCode" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" placeholder="+91" />
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block mb-2 font-medium">Contact Phone</label>
                    <input name="phone" type="text" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
                </div>
            </div>

            <div>
                <label class="block mb-2 font-medium">Country</label>
                <input name="country" type="text" placeholder="Country Name" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
            </div>

            <div>
                <label class="block mb-2 font-medium">Company Name</label>
                <input name="company" type="text" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />
            </div>

            <div>
                <label class="block mb-2 font-medium">Enquiry</label>
                <textarea name="enquiry" rows="4" class="w-full h-24 rounded-2xl bg-gray-200 p-4 placeholder-gray-700 resize-y focus:outline-none"></textarea>
            </div>

            <div>
                <label class="block mb-2 font-medium">Address</label>
                <input name="addr1" type="text" placeholder="Street Address line 1" class="w-full rounded-full bg-gray-200 px-5 py-3 mb-2" />
                <input name="addr2" type="text" placeholder="Apartment, suite, etc." class="w-full rounded-full bg-gray-200 px-5 py-3" />
            </div>

            <div class="flex flex-wrap gap-4">
                <div class="flex-1 min-w-[200px]">
                    <label class="block mb-2 font-medium">City / Town</label>
                    <input name="city" type="text" placeholder="City" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                </div>
                <div class="flex-1 min-w-[200px]">
                    <label class="block mb-2 font-medium">State / Province / Region</label>
                    <input name="state" type="text" placeholder="State / Province / Region" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                </div>
            </div>

            <div>
                <label class="block mb-2 font-medium">ZIP / Postal Code</label>
                <input name="zipcode" type="text" class="w-full rounded-full bg-gray-200 px-5 py-3" />
            </div>

            <button type="submit" class="bg-btn-primary hover:bg-btn-secondary text-white font-semibold py-3 px-6 rounded-full w-full">
                SUBMIT FORM
            </button>
        </form>

        {{-- Supplier Registration --}}
        <form id="form2" action="{{ route('vendor_list.public_store') }}" onsubmit="submitForm(event)" class="hidden max-w-3xl mx-auto p-6 bg-white rounded-lg space-y-6">
            <h2 class="text-xl md:text-2xl font-semibold">
                Supplier <span class="block">Registration</span>
                <span class="block w-16 border-b-2 border-orange-300 mt-1"></span>
            </h2>

            <input name="name" type="text" placeholder="Your Company’s Legal Name" class="w-full rounded-full bg-gray-200 px-5 py-3 placeholder-gray-700 focus:outline-none" />

            <div>
                <p class="mb-2 font-medium">Business Type</p>
                <div class="space-y-3">
                    @foreach(["Manufacturing", "Distributor", "Service Provider"] as $type)
                        <label class="flex items-center space-x-3">
                            <input type="radio" value="{{ $type }}" name="business_type" class="accent-black" />
                            <span class="bg-gray-200 px-4 py-2 rounded-full">{{ $type }}</span>
                        </label>
                    @endforeach
                </div>
            </div>

            <div>
                <p class="mb-2 font-medium">What kind of products / services does your company offer?</p>
                <textarea name="company_services" class="w-full h-24 rounded-2xl bg-gray-200 p-4 placeholder-gray-700 resize-y focus:outline-none"></textarea>
            </div>

            <div class="space-y-3">
                <p class="font-medium">Company Address</p>
                <input name="addr1" type="text" placeholder="Street Address Lane 1" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                <input name="addr2" type="text" placeholder="Street Address Lane 2" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                <div class="flex flex-col md:flex-row gap-3">
                    <input name="city" type="text" placeholder="City" class="flex-1 rounded-full bg-gray-200 px-5 py-3" />
                    <input name="email" type="email" placeholder="Email" class="flex-1 rounded-full bg-gray-200 px-5 py-3" />
                </div>
                <div class="flex flex-col md:flex-row gap-3">
                    <input name="phone" type="tel" placeholder="Tel" class="flex-1 rounded-full bg-gray-200 px-5 py-3" />
                    <input name="country" type="text" placeholder="Country" class="flex-1 rounded-full bg-gray-200 px-5 py-3" />
                </div>
            </div>

            <div class="space-y-3">
                <p class="font-medium">Company Contact</p>
                <input name="website" type="url" placeholder="Company Website" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                <input name="contact_email" type="email" placeholder="Contact Email" class="w-full rounded-full bg-gray-200 px-5 py-3" />
                <input name="contact_phone" type="tel" placeholder="Contact Phone" class="w-full rounded-full bg-gray-200 px-5 py-3" />
            </div>

            <div>
                <p class="mb-2 font-medium">Please provide information on the following:</p>
                <textarea name="company_info" placeholder="Company founding year, company size, company audience, geographical target..." class="w-full h-24 rounded-2xl bg-gray-200 p-4 placeholder-gray-700 resize-y focus:outline-none"></textarea>
            </div>

            <button type="submit" class="bg-btn-primary hover:bg-btn-secondary text-white font-semibold py-3 px-6 rounded-full w-full">
                SUBMIT FORM
            </button>
        </form>

        {{-- Feedback Form --}}
        <form id="form4" action="{{ route('feedback_list.public_store') }}" onsubmit="submitForm(event)" class="hidden max-w-3xl mx-auto p-6 bg-white rounded-lg space-y-6">
            <h2 class="text-xl md:text-2xl font-semibold">
                Feedback <span class="block">Form</span>
                <span class="block w-16 border-b-2 border-orange-300 mt-1"></span>
            </h2>
            <div>
                <label class="font-medium">Name</label>
                <input type="text" name="name" class="mt-1 w-full rounded-full bg-gray-200 px-5 py-3 mb-2" />
            </div>

            <div>
                <label class="font-medium">Email</label>
                <input type="email" name="email" class="mt-1 w-full rounded-full bg-gray-200 px-5 py-3 mb-2" />
            </div>

            <div>
                <label class="font-medium">Mobile</label>
                <input type="tel" name="mobile" class="mt-1 w-full rounded-full bg-gray-200 px-5 py-3 mb-2" />
            </div>

            <div>
                <label class="font-medium">Company</label>
                <input type="text" name="company" class="mt-1 w-full rounded-full bg-gray-200 px-5 py-3 mb-2" />
            </div>

            <div>
                <label class="font-medium">Feedback</label>
                <textarea name="feedback" rows="4" class="mt-1 w-full h-24 rounded-2xl bg-gray-200 p-4 placeholder-gray-700 resize-y focus:outline-none"></textarea>
            </div>

            <button type="submit" class="bg-btn-primary hover:bg-btn-secondary text-white font-semibold py-3 px-6 rounded-full w-full">
                SUBMIT FORM
            </button>
        </form>
    </section>
</div>

<script>
    function setActiveForm(formId) {
        document.querySelectorAll('form').forEach(form => form.classList.add('hidden'));
        document.querySelectorAll('button[id^="btn-"]').forEach(btn => btn.classList.remove('bg-btn-secondary'));
        document.getElementById(formId).classList.remove('hidden');
        document.getElementById(`btn-${formId}`).classList.add('bg-btn-secondary');
    }

    function submitForm(e) {
        e.preventDefault();
        let form = e.target;
        let actionUrl = form.getAttribute("action"); // ✅ get route from form
        let formData = new FormData(form);

        fetch(actionUrl, {
            method: 'POST',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            console.log('Server response:', data);
            alert('Form submitted successfully!');
            form.reset();
        })
        .catch(err => console.error('Error submitting form:', err));
    }
</script>

@endsection
