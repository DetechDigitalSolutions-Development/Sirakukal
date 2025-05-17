<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

<!-- @php
    $slides = [
        ['image_url' => asset('images/image1.avif')],
        ['image_url' => asset('images/image2.jpg')],
        ['image_url' => asset('images/image3.webp')],
    ];
@endphp -->

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

<section x-data="{
    slides: [
        {
            image: '/images/image1.avif',
            title: 'Empower Change Through Volunteering',
            description: 'Join our community and make a real difference in the lives of others and the world around us.'
        },
        {
            image: '/images/image2.jpg',
            title: 'Be the Light in Someone\'s Life',
            description: 'Small acts of kindness can spark big changes. Join us and volunteer today.'
        },
        {
            image: '/images/image3.webp',
            title: 'Together We Can Make a Difference',
            description: 'Work hand-in-hand with others to build a better, brighter future for everyone.'
        }
    ],
    currentIndex: 0,
    next() {
        this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    },
    startAutoSlide() {
        setInterval(() => this.next(), 6000);
    }
}" x-init="startAutoSlide()" class="relative h-[90vh] w-full overflow-hidden">

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

</body>
</html>


<!-- Empowering Communities Section -->
<section class="relative bg-gradient-to-r from-charcoal-black to-charcoal-black/90 py-24 overflow-hidden">
    <!-- Background Effects -->
    <div class="absolute inset-0 z-0 opacity-50">
        <div class="absolute inset-0 bg-pattern bg-repeat opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-flame-red to-sunset-orange opacity-30"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center">
            <!-- Text Section -->
            <div class="lg:w-1/2 text-white mb-10 lg:mb-0">
                <div class="bg-charcoal-black/40 p-6 rounded-lg backdrop-blur-sm border border-golden-sunrise/50 shadow-lg">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 uppercase text-golden-sunrise">
                        {{ $title ?? 'Empowering Communities Through Volunteerism' }}
                    </h1>
                    <p class="text-xl mb-8 max-w-xl text-golden-sunrise font-medium">
                        {{ $description ?? 'Join us in our mission to create a sustainable impact in communities through organized volunteer initiatives.' }}
                    </p>
                    <div class="flex flex-wrap gap-4">
                        @include('components.ui.buttons.join', [
                            'text' => __('message.buttons.become_a_volunteer'),
                            // 'text' => 'Become a Volunteer',
                            'class' => 'btn-primary'
                        ])
                        <a href="#about" class="btn-secondary border-2 border-golden-sunrise text-golden-sunrise hover:bg-charcoal-black/80 transition duration-300">
                            {{ __('message.buttons.learn_more') }} 
                        </a>
                    </div>
                </div>
            </div>

            <!-- Media Section -->
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative rounded-lg overflow-hidden shadow-2xl bg-white p-2 w-full max-w-md">
                    @if(isset($video_url))
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe 
                                src="{{ $video_url }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen 
                                class="w-full h-full object-cover">
                            </iframe>
                        </div>
                    @else
                        <img 
                            src="{{ $image_url ?? asset('images/hero-image.jpg') }}" 
                            alt="Sirakukal Volunteers" 
                            class="w-full rounded object-cover aspect-video">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

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
