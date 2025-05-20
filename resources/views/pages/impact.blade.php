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
                    <img src="{{ asset('images/impact/1.jpg') }}" alt="Impact moment 1" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-auto md:row-span-2 overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/2.jpg') }}" alt="Impact moment 2" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/3.jpg') }}" alt="Impact moment 3" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/4.jpg') }}" alt="Impact moment 4" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                
                <!-- Gallery images - Row 2 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/5.jpg') }}" alt="Impact moment 5" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/6.jpg') }}" alt="Impact moment 6" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/7.jpg') }}" alt="Impact moment 7" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/8.jpg') }}" alt="Impact moment 8" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>

                <!-- Gallery images - Row 3 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/9.jpg') }}" alt="Impact moment 9" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/10.jpg') }}" alt="Impact moment 10" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/11.jpg') }}" alt="Impact moment 11" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/12.jpg') }}" alt="Impact moment 12" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>

                <!-- Gallery images - Row 4 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/13.jpg') }}" alt="Impact moment 13" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/14.jpg') }}" alt="Impact moment 14" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/15.jpg') }}" alt="Impact moment 15" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/16.jpg') }}" alt="Impact moment 16" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>

                <!-- Gallery images - Row 5 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/17.jpg') }}" alt="Impact moment 17" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/18.jpg') }}" alt="Impact moment 18" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/19.jpg') }}" alt="Impact moment 19" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/20.jpg') }}" alt="Impact moment 20" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>

                <!-- Gallery images - Row 6 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/21.jpg') }}" alt="Impact moment 21" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/22.jpg') }}" alt="Impact moment 22" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/23.jpg') }}" alt="Impact moment 23" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/24.jpg') }}" alt="Impact moment 24" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>

                <!-- Gallery images - Row 7 -->
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/25.jpg') }}" alt="Impact moment 25" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/26.jpg') }}" alt="Impact moment 26" class="w-full h-full object-cover hover:scale-105 transition duration-300">
                </div>
                <div class="aspect-square overflow-hidden rounded-lg">
                    <img src="{{ asset('images/impact/27.jpg') }}" alt="Impact moment 27" class="w-full h-full object-cover hover:scale-105 transition duration-300">
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