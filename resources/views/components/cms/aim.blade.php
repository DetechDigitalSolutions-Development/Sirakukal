<!-- Include Tailwind CSS -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

@php
    $image_url = asset('images/aboutus.png'); // Background image
@endphp

<!-- Hero Section -->
<section 
    class="relative w-full h-[300px] sm:h-[350px] md:h-[400px] lg:h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
    style="background-image: url('{{ $image_url }}');">
    
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-3 sm:px-4 md:px-6">
        <h1 class="text-white text-lg sm:text-2xl md:text-4xl lg:text-6xl font-bold drop-shadow-lg mb-2 sm:mb-3 md:mb-4">
            Driving Global Change Through <br class="hidden sm:inline">Focused Action
        </h1>
        <p class="text-white text-sm sm:text-base md:text-xl lg:text-2xl drop-shadow-lg mb-4 sm:mb-5 md:mb-6">
            Explore the Key areas where we are making a tangible differences in
            <br class="hidden sm:inline">
            Communities world wide
        </p>
    </div>
</section>
