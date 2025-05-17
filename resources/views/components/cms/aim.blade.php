<!-- Include Tailwind CSS -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

@php
    $image_url = asset('images/aboutus.png'); // Background image
@endphp

<!-- Hero Section -->
<section 
    class="relative w-full h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat" 
    style="background-image: url('{{ $image_url }}');">
    
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- Content -->
    <div class="relative z-10 text-center px-4 ">
        <h1 class="text-white text-xl md:text-6xl font-bold drop-shadow-lg mb-4 top-[20%]">
            Driving Global Change Through <br>Focused Action
        </h1>
        <br></br>
        <p class="text-white text-xl md:text-2xl drop-shadow-lg mb-6">
            Explore the Key areas where we are making a tangible differences in <br> Communities world wide
        </p>
       
    </div>
</section>
