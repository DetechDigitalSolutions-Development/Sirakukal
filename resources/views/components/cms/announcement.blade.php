<section class="py-20 bg-gray-50" x-data="{
    activeSlide: 0, 
    totalSlides: {{ count($announcements) }},
    init() {
        // Auto-rotate every 5 seconds
        setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.totalSlides;
        }, 5000);
    }
}">
    <div class="container mx-auto px-4 sm:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Latest Announcements</h2>
            <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
        </div>
        
        <div class="relative w-full md:w-4/5 mx-auto">
            <!-- Carousel slides - Simple fade transition -->
            <div class="relative h-[400px] overflow-hidden">
                @foreach($announcements as $index => $announcement)
                <div x-show="activeSlide === {{ $index }}" 
                     x-transition.opacity.duration.300ms
                     class="absolute inset-0 bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    @if($announcement->image_url)
                        <div class="h-48 md:h-64 w-full overflow-hidden">
                            <img src="{{ asset('storage/' . $announcement->image_url) }}" alt="Announcement" class="w-full h-full object-cover">
                        </div>
                    @endif
                    <div class="p-6 flex-1 flex flex-col">
                        <div class="mt-2 flex-1">
                            <p class="text-gray-800 text-3xl">{{ $announcement->description }}</p>
                        </div>
                        <div class="mb-4">
                            <p class="font-bold text-gray-800">{{ $announcement->author }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Navigation arrows -->
            <button @click="activeSlide = (activeSlide - 1 + totalSlides) % totalSlides" 
                    class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-4 md:-translate-x-8 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <button @click="activeSlide = (activeSlide + 1) % totalSlides" 
                    class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-4 md:translate-x-8 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
            
            <!-- Indicators -->
            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                @foreach($announcements as $index => $announcement)
                <button @click="activeSlide = {{ $index }}" 
                        :class="{ 'bg-primary': activeSlide === {{ $index }}, 'bg-gray-300': activeSlide !== {{ $index }} }" 
                        class="w-3 h-3 rounded-full focus:outline-none transition-colors duration-200"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>