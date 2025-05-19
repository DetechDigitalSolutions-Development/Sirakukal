@extends('layouts.app')

@section('title', 'Our Impact - Sirakukal')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.impact')

    {{-- What We've Achieved Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-8">
            @include('components.cms.impact-stats', [
                'sectionTitle' => 'What We\'ve Achieved',
                'volunteers' => $impactStats['volunteers'] ?? '1,500+',
                'hours' => $impactStats['hours'] ?? '25,000+',
                'events' => $impactStats['events'] ?? '120',
                'volunteersLabel' => 'Dedicated Volunteers',
                'hoursLabel' => 'Hours Contributed',
                'eventsLabel' => 'Community Events Held'
            ])
        </div>
    </section>
    
    {{-- Highlight Stories --}}
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Highlight Stories</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mt-8 sm:mt-10 md:mt-12">
                @foreach ($stories as $story)
                    <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                        <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                            <img src="{{ $story->image_url ? asset('storage/' . $story->image_url) : asset('images/default.jpg') }}"
                                alt="{{ $story->author }}"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 sm:p-5 md:p-6">
                            <h3 class="text-lg sm:text-xl font-bold mb-2">{{ $story->author }}</h3>
                            <p class="text-gray-600 text-xs sm:text-sm">
                                {{ $story->description }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Moments of Impact Gallery --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Moments of Impact</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-5">
                <!-- Gallery images - Row 1 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-1.jpg') }}" alt="Impact moment - Workshop" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-auto md:row-span-2 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-2.jpg') }}" alt="Impact moment - Plant" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-3.jpg') }}" alt="Impact moment - Park" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-4.jpg') }}" alt="Impact moment - Education" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                
                <!-- Gallery images - Row 2 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-5.jpg') }}" alt="Impact moment - Community gathering" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-6.jpg') }}" alt="Impact moment - River" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-7.jpg') }}" alt="Impact moment - Medical aid" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                
                <!-- Gallery images - Row 3 -->
                <div class="aspect-square overflow-hidden rounded-lg md:row-span-2">
                    <img src="{{ asset('images/gallery/impact-8.jpg') }}" alt="Impact moment - Team celebration" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-9.jpg') }}" alt="Impact moment - Food aid" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-auto overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-10.jpg') }}" alt="Impact moment - Medical care" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-11.jpg') }}" alt="Impact moment - Art project" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                
                <!-- Gallery images - Row 4 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/gallery/impact-12.jpg') }}" alt="Impact moment - Volunteer presentation" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
            </div>
        </div>
    </section>
    
    {{-- Join Us CTA Section --}}
 @if ($join_form === 'true')   
    <section class="py-12 sm:py-14 md:py-16 bg-flame-red text-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-4xl">
            <div class="text-center py-6 sm:py-7 md:py-8">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Join Us in Making a Difference</h2>
                <p class="text-base sm:text-lg mb-6 sm:mb-7 md:mb-8">Every action counts. Learn how you can contribute to our mission.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4">
                    <a href="{{ route('volunteers.volunteer') }}" class="inline-block px-6 sm:px-7 md:px-8 py-2 sm:py-2.5 md:py-3 bg-white text-flame-red hover:bg-gray-100 font-medium rounded-md transition duration-300 text-center text-sm sm:text-base">
                        Get Involved
                    </a>
                    <a href="{{ route('aim') }}" class="inline-block px-6 sm:px-7 md:px-8 py-2 sm:py-2.5 md:py-3 border border-white text-white hover:bg-white hover:text-flame-red font-medium rounded-md transition duration-300 text-center text-sm sm:text-base">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif    
@endsection