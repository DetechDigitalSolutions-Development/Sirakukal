<!-- Include Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

@php
    $slides = [
        ['image_url' => asset('images/image1.avif')],
        ['image_url' => asset('images/image2.jpg')],
        ['image_url' => asset('images/image3.webp')],
    ];
@endphp

<!-- Hero Slider Section -->
<div class="relative z-10 w-full max-w-full">
    <div class="relative overflow-hidden shadow-2xl bg-white p-2 w-full max-h-[550px]">
        <!-- Swiper Container -->
        <div class="swiper mySwiper w-full h-full">
            <div class="swiper-wrapper">
                @foreach ($slides as $slide)
                    <div class="swiper-slide relative w-full h-[550px]">
                        @if (isset($slide['video_url']))
                            <iframe 
                                src="{{ $slide['video_url'] }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen 
                                class="w-full h-full object-cover rounded-lg"
                            ></iframe>
                        @elseif (isset($slide['image_url']))
                            <img 
                                src="{{ $slide['image_url'] }}" 
                                alt="Slide Image" 
                                class="w-full h-full object-cover rounded-lg"
                            />
                        @endif

                        <!-- Dark Overlay -->
                        <div class="absolute inset-0 bg-black/60 rounded-lg z-10"></div>
                    </div>
                @endforeach
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination z-20 relative"></div>

            <!-- Headings and CTA -->
            <div class="absolute top-[15%] left-1/2 transform -translate-x-1/2 z-20">
                <h1 class="text-white text-3xl md:text-5xl font-bold text-center px-4 drop-shadow-lg">
                    Empowering Through Action
                </h1>
            </div>

            <div class="absolute top-[30%] left-1/2 transform -translate-x-1/2 z-20">
                <h2 class="text-white text-3xl md:text-4xl text-center px-4 drop-shadow-lg">
                    Upcoming Events.....
                </h2>
            </div>

            <div class="absolute top-[45%] left-1/2 transform -translate-x-1/2 z-20">
                <a href="#volunteers/volunteer" 
                   class="inline-block bg-golden-sunrise hover:bg-red-600 text-black font-semibold py-3 px-8 rounded-2xl shadow-lg transition duration-300">
                   Join Us
                </a>
            </div>
        </div>
    </div>
</div>

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
