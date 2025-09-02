<section class="mt-20">
    <h1 class="text-enjay-primary text-3xl pl-20 mb-10">
        Our Policies
        <span class="block w-80 border-b-2 border-orange-300 mt-2.5"></span>
    </h1>

    <div class="w-full justify-center flex">
        <div class="h-[500px] w-[80%] rounded-2xl flex overflow-hidden justify-center px-4">
            @foreach($policies as $i => $policy)
                <div 
    class="group relative flex flex-col text-white transition-all duration-500 overflow-hidden justify-end policy-card bg-cover bg-center"
    style="background-image: url('{{ asset(($policy->img_path ? 'storage/'.$policy->img_path : 'storage/images/policy_placeholder.png')) }}')"
    data-index="{{ $i }}"
>

                    <!-- Dark overlay for readability -->
                    <div class="absolute inset-0 bg-black/50 z-10"></div>

                    <!-- Inner content -->
                    <div class="relative z-20 p-6 w-full">
                        <h3 class="text-2xl font-semibold mb-3">{{ $policy->name }}</h3>
                        <div class="policy-content hidden">
                            <div class="text-lg leading-loose">
                                {!! $policy->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const cards = document.querySelectorAll(".policy-card");

        cards.forEach((card, i) => {
            card.addEventListener("mouseenter", () => {
                cards.forEach((c, j) => {
                    if (i === j) {
                        c.classList.add("flex-[5]", "justify-start");
                        c.classList.remove("flex-[1]", "justify-end");
                        c.querySelector(".policy-content").classList.remove("hidden");
                    } else {
                        c.classList.add("flex-[1]", "justify-end");
                        c.classList.remove("flex-[5]", "justify-start");
                        c.querySelector(".policy-content").classList.add("hidden");
                    }
                });
            });
        });

        if(cards.length > 2){
            cards[2].dispatchEvent(new Event("mouseenter"));
        }
    });
</script>
