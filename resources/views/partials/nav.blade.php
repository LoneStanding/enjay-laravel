<!-- Responsive Header -->
<header>
  <section class="w-full fixed bg-background py-5 top-0 left-0 z-[99] shadow-md">
    <nav class="flex flex-row items-center justify-between px-4 lg:px-8">
      <!-- Logo -->
      <img src="/logos/logo.svg" class="w-32 lg:w-40" alt="Logo" />

      <!-- Desktop Menu -->
      <ul class="hidden lg:flex flex-1 justify-center flex-row gap-8 text-md font-regular ml-10">
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/">Home</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/about-us">About Us</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/products">Products</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/services">Services</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/contact-us">Contact Us</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/policies">Our Policies</a></li>
        <li class="transition-all duration-300 hover:text-enjay-head hover:text-lg"><a href="/careers">Career</a></li>
      </ul>

      <!-- Mobile Hamburger -->
      <button id="menu-btn" class="lg:hidden flex flex-col space-y-1.5 focus:outline-none">
        <span class="block w-6 h-0.5 bg-black"></span>
        <span class="block w-6 h-0.5 bg-black"></span>
        <span class="block w-6 h-0.5 bg-black"></span>
      </button>
    </nav>
  </section>

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 bg-black/50 hidden z-[98] lg:hidden"></div>

  <!-- Mobile Sidebar -->
  <div id="mobile-menu" class="fixed top-0 left-[-100%] h-full w-64 bg-background z-[100] transition-all duration-300 lg:hidden shadow-black shadow-lg">
    <div class="flex justify-between items-center p-5 border-b">
      <img src="/logos/logo.svg" class="w-28" alt="Logo" />
      <button id="close-btn" class="text-4xl">&times;</button>
    </div>
    <ul class="flex flex-col gap-6 p-6 text-lg">
      <li><a href="/" class="hover:text-enjay-head">Home</a></li>
      <li><a href="/about-us" class="hover:text-enjay-head">About Us</a></li>
      <li><a href="/products" class="hover:text-enjay-head">Products</a></li>
      <li><a href="/services" class="hover:text-enjay-head">Services</a></li>
      <li><a href="/contact-us" class="hover:text-enjay-head">Contact Us</a></li>
      <li><a href="/policies" class="hover:text-enjay-head">Our Policies</a></li>
      <li><a href="/careers" class="hover:text-enjay-head">Career</a></li>
    </ul>
  </div>
</header>

<script>
  const menuBtn = document.getElementById("menu-btn");
  const mobileMenu = document.getElementById("mobile-menu");
  const closeBtn = document.getElementById("close-btn");
  const overlay = document.getElementById("overlay");

  function openMenu() {
    mobileMenu.style.left = "0";
    overlay.classList.remove("hidden");
  }

  function closeMenu() {
    mobileMenu.style.left = "-100%";
    overlay.classList.add("hidden");
  }

  menuBtn.addEventListener("click", openMenu);
  closeBtn.addEventListener("click", closeMenu);
  overlay.addEventListener("click", closeMenu);
</script>
