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
        showDefaultSlide: {{ $join_form === 'true' ? 'true' : 'false'  }},
        defaultSlide: {
            image: '{{ asset('/images/volunteer2.avif') }}',
            title: 'Join Our Volunteer Team',
            description: 'Become part of our community and make a difference today!'
        },
        eventSlides: {{ Js::from($upcomingEvents->map(fn($event) => [
            'image' => asset('storage/'.$event->image_url),
            'title' => $event->name,
            'description' => $event->description,
            'id' => $event->id
        ])) }},
        currentIndex: 0,
        get slides() {
            return this.showDefaultSlide ? [this.defaultSlide] : this.eventSlides;
        },
        next() {
            if (!this.showDefaultSlide) {
                this.currentIndex = (this.currentIndex + 1) % this.slides.length;
            }
        },
        startAutoSlide() {
            if (!this.showDefaultSlide) {
                setInterval(() => this.next(), 6000);
            }
        }
    }"
    x-init="startAutoSlide()" 
    class="relative h-[90vh] w-full overflow-hidden">

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
          <div class="relative z-10 h-full flex flex-col justify-center items-center text-white text-center px-4">
            <h1 class="text-4xl md:text-6xl font-bold mb-4" x-text="slide.title"></h1>
            <div class="text-lg md:text-xl max-w-2xl mb-6 prose text-white" x-html="slide.description"></div>
            
            <a 
              :href="showDefaultSlide ? '{{ route('volunteers.volunteer') }}' : '{{ route('events.index') }}/' + slide.id"
              class="bg-yellow-600 hover:bg-red-700 text-white font-semibold py-3 px-10 rounded-3xl shadow">
                <span x-text="showDefaultSlide ? 'Join Us Now' : 'Learn More'"></span>
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