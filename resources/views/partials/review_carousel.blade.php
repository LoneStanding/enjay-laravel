<section class="py-16 bg-white text-center">
    <h2 class="text-3xl font-semibold mb-4">
        Our Trusted <span class="bg-btn-primary text-white px-3 py-1 rounded-md">Clients</span>
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">
        Our mission is to drive progress & enhance the lives of our customers by delivering superior products & services that exceed expectations.
    </p>

    <div 
        id="clientsScroll" 
        class="flex gap-6 overflow-x-auto px-4 cursor-grab active:cursor-grabbing scrollbar-hide" 
        style="-webkit-overflow-scrolling: touch; scroll-behavior: smooth;"
    >

        <?php foreach ($reviews as $client): ?>
        <div class="min-w-[180px] md:w-[300px] h-[300px] bg-gradient-to-b from-[#fcd0a8] to-white shadow-lg rounded-xl p-4 text-sm flex-shrink-0">
            <div class="w-10 h-10 mx-auto rounded-full bg-white border-4 border-rose-200 mb-2"></div>
            <h3 class="font-semibold"><?= htmlspecialchars($client->name) ?></h3>
            <p class="text-xs text-gray-500 mb-2"><?= htmlspecialchars($client->position) ?></p>
            <p class="text-[11px] text-gray-600"><?= htmlspecialchars($client->review) ?></p>
        </div>
        <?php endforeach; ?>

    </div>
</section>

<script>
    const scrollRef = document.getElementById("clientsScroll");
    let isDown = false;
    let startX;
    let scrollLeft;

    scrollRef.addEventListener("mousedown", (e) => {
        isDown = true;
        startX = e.pageX - scrollRef.offsetLeft;
        scrollLeft = scrollRef.scrollLeft;
    });

    scrollRef.addEventListener("mouseleave", () => isDown = false);
    scrollRef.addEventListener("mouseup", () => isDown = false);

    scrollRef.addEventListener("mousemove", (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - scrollRef.offsetLeft;
        const walk = (x - startX) * 2; 
        scrollRef.scrollLeft = scrollLeft - walk;
    });
</script>
