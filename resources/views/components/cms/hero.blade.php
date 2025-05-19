@php
$heroSlides = count($upcomingEvents ?? []) > 0 ? 
    $upcomingEvents->map(fn($event) => [
        'image' => 'storage/'.$event->image_url,
        'title' => $event->name,
        'description' => $event->description,
    ]) : 
    [
        [
            'image' => asset('images/image1.avif'),
            'title' => 'Welcome to Sirakukal',
            'description' => 'Join us in making a difference in our community through volunteering and support.',
        ],
        [
            'image' => asset('images/image2.jpg'),
            'title' => 'Empowering Communities',
            'description' => 'Together we can create positive change and build stronger communities.',
        ],
    ];
@endphp

<section 
    x-data="{
        slides: {{ Js::from($heroSlides) }},
        currentIndex: 0,
        next() {
            if (this.slides.length > 0) {
                this.currentIndex = (this.currentIndex + 1) % this.slides.length;
            }
        },
        startAutoSlide() {
            if (this.slides.length > 0) {
                console.log('Hero slider initialized with ' + this.slides.length + ' slides');
                setInterval(() => this.next(), 6000);
            } else {
                console.error('No slides available for hero');
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
            <p class="text-lg md:text-xl max-w-2xl mb-6" x-text="slide.description"></p>
            <a href="{{ route('volunteers.register') }}" class="bg-yellow-600 hover:bg-red-700 text-white font-semibold py-3 px-10 rounded-3xl shadow">
                 Join Us
            </a>

          </div>
        </div>
      </div>
    </template>
  </div>

</section>

@push('scripts')
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
@endpush
