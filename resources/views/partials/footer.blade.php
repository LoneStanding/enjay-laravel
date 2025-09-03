<!-- Footer -->

<section class="w-full bg-background">
    <footer class="flex flex-col relative mt-10">
        <div class="w-full h-42"></div>

        <div class="bg-enjay-dark w-full min-h-20 flex flex-col lg:flex-row justify-around px-5 lg:px-0 pt-32 pb-20">
            <div class=" text-white font-extralight text-lg leading-6">
                <h3 class="font-light mb-2.5">Our Address</h3>
                <p>
                    Gulftek: Head Office- Dammam,<br>
                    Second Industrial City,<br>
                    P.O.Box: 7286, Street 85, Cross 134,<br>
                    Zip Code: 34332-3122<br>
                    Tel: +966 13 8376541/2
                </p>
                <p>
                    Email: info@gulftekarabia.com<br><br>
                    Dubai Office- P.O.Box 691369, Dubai, UAE.
                </p>
            </div>

            <div class="text-white font-extralight text-lg leading-6">
                <h3 class="font-light mb-2.5">Contact</h3>
                <p>
                    Sales & Service Enquiries Email:<br>
                    customerservice@gulftekarabia.com<br>
                    Tel: +966 13 8376541/2 Vendors<br>
                    supplychain@gulftekarabia.com
                </p>
            </div>

            <div class="mt-10 lg:mt-0 flex justify-center lg:justify-start">
                <img src="/logos/logob.svg" alt="logo" class="size-40">
            </div>
        </div>

        @if (Request::path() !== 'contact-us')
        <div class="absolute inset-x-0 top-[14%] md:top-[13%] lg:top-[20%] flex justify-center">
            <a href="{{ url('/contact-us') }}" class="group bg-white py-2.5 md:py-5 rounded-2xl shadow-lg flex items-center w-[90%] lg:w-1/2 justify-between px-5 md:px-10">
                <span class="text-enjay-primary text-lg lg:text-3xl font-light">Get In Touch With Us</span>
                <img src="/logos//arrow1.svg" alt="r_arrow" class="w-10">
            </a>
        </div>
        @endif
    </footer>
</section>

