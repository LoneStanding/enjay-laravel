<section class="mt-20">
  <h1 class="text-enjay-primary text-3xl lg:pl-20 mb-5 lg:mb-10 inline-block pl-5">
    Our Policies
    <span class="block lg:w-80 border-b-2 border-orange-300 mt-2.5"></span>
  </h1>

  <div class="w-full justify-center flex">
    <div class="h-auto lg:h-[500px] w-full lg:w-[80%] rounded-2xl flex flex-col lg:flex-row overflow-hidden justify-center px-4 gap-4">
      @foreach($policies as $i => $policy)
        <div 
          class="group relative flex flex-col text-white transition-all duration-500 overflow-hidden justify-end policy-card bg-cover bg-center rounded-xl cursor-pointer"
          style="background-image: url('{{ asset(($policy->img_path ? 'storage/'.$policy->img_path : 'storage/images/policy_placeholder.png')) }}')"
          data-index="{{ $i }}"
        >
          <!-- Dark overlay -->
          <div class="absolute inset-0 bg-black/50 z-10"></div>

          <!-- Inner content -->
          <div class="relative z-20 p-6 w-full">
            <h3 
              class="text-lg lg:text-2xl font-semibold mb-3 flex justify-between items-center"
            >
              {{ $policy->name }}
              <span class="toggle-icon lg:hidden">+</span>
            </h3>

            <!-- Accordion content -->
            <div class="policy-content max-h-0 overflow-hidden transition-all duration-300 ease-in-out lg:max-h-full lg:block">
              <div class="text-base lg:text-lg leading-loose py-2">
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
    const isMobile = window.innerWidth < 1024;
    const isDesktop = window.innerWidth >= 1024;

    // 📱 Mobile/Tablet Accordion (only one open at a time)
    if (isMobile) {
      document.querySelectorAll(".policy-card").forEach((card) => {
        card.addEventListener("click", function () {
          const allContents = document.querySelectorAll(".policy-content");
          const allIcons = document.querySelectorAll(".toggle-icon");
          const content = this.querySelector(".policy-content");
          const icon = this.querySelector(".toggle-icon");

          // Close all others
          allContents.forEach((c) => {
            if (c !== content) c.style.maxHeight = "0px";
          });
          allIcons.forEach((i) => {
            if (i !== icon) i.textContent = "+";
          });

          // Toggle clicked
          if (content.style.maxHeight && content.style.maxHeight !== "0px") {
            content.style.maxHeight = "0px";
            icon.textContent = "+";
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.textContent = "−";
          }
        });
      });
    }

    // 💻 Desktop Hover Expansion
    if (isDesktop) {
      const cards = document.querySelectorAll(".policy-card");

      cards.forEach((card, i) => {
        card.addEventListener("mouseenter", () => {
          cards.forEach((c, j) => {
            const content = c.querySelector(".policy-content");
            if (i === j) {
              c.classList.add("flex-[5]", "justify-start");
              c.classList.remove("flex-[1]", "justify-end");
              content.style.maxHeight = content.scrollHeight + "px";
            } else {
              c.classList.add("flex-[1]", "justify-end");
              c.classList.remove("flex-[5]", "justify-start");
              content.style.maxHeight = "0px";
            }
          });
        });
      });

      // Default: focus on 3rd card if more than 2
      if (cards.length > 2) {
        cards[2].dispatchEvent(new Event("mouseenter"));
      }
    }
  });
</script>
