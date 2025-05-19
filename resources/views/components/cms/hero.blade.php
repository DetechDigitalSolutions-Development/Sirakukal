<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Synchronized Auto Slider</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <style>
    .fade-enter-active, .fade-leave-active {
      transition: opacity 1s;
    }
    .fade-enter-from, .fade-leave-to {
      opacity: 0;
    }
  </style>
</head>
<body class="m-0 p-0 overflow-x-hidden">

<section 
    x-data="{
        slides: {{ Js::from($upcomingEvents->map(fn($event) => [
            'image' => 'storage/'.$event->image_url,
            'title' => $event->name,
            'description' => $event->description,
        ])) }},
        currentIndex: 0,
        next() {
            this.currentIndex = (this.currentIndex + 1) % this.slides.length;
        },
        startAutoSlide() {
            setInterval(() => this.next(), 6000);
        }
    }"
    x-init="startAutoSlide()" 
    class="relative h-[60vh] sm:h-[70vh] md:h-[80vh] lg:h-[90vh] w-full overflow-hidden">

  <!-- Slides container -->
  <div class="relative h-full w-full">
    <template x-for="(slide, index) in slides" :key="index">
      <div
        x-show="currentIndex === index"
        x-transition:enter="transition-opacity duration-1000"
        x-transition:leave="transition-opacity duration-1000"
        class="absolute inset-0 w-full h-full"
        style="z-index: 0;"
      >
        <!-- Background Image with overlay -->
        <div class="w-full h-full bg-cover bg-center relative" :style="`background-image: url(${slide.image})`">
          <div class="absolute inset-0 bg-black opacity-70"></div>

          <!-- Slide Content -->
          <div class="relative z-10 h-full flex flex-col justify-center items-center text-white text-center px-4 sm:px-6 md:px-8">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-6xl font-bold mb-2 sm:mb-3 md:mb-4" x-text="slide.title"></h1>
            <div class="text-sm sm:text-base md:text-lg lg:text-xl max-w-xs sm:max-w-sm md:max-w-xl lg:max-w-2xl mb-4 sm:mb-5 md:mb-6 prose text-white" x-html="slide.description"></div>
            @php
                $isJoinEnabled = $join_form === 'true';
            @endphp

            <a href="{{ $isJoinEnabled ? route('volunteers.volunteer') : route('about') }}"
              class="bg-yellow-600 hover:bg-red-700 text-white font-semibold py-2 sm:py-2.5 md:py-3 px-6 sm:px-8 md:px-10 rounded-3xl shadow text-sm sm:text-base">
                {{ $isJoinEnabled ? 'Join Us' : 'Learn More' }}
            </a>

          </div>
        </div>
      </div>
    </template>
  </div>

</section>

</body>
</html>

<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Swiper Initialization -->
<script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>