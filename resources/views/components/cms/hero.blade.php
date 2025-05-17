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
