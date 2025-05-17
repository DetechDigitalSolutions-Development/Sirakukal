@extends('layouts.app')

@section('title', 'Our Impact - Sirakukal')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.impact')

    {{-- What We've Achieved Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">What We've Achieved</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-8 bg-white rounded-lg shadow-sm">
                    <div class="text-flame-red flex justify-center mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9 3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3 3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3 3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13v-1.75M0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9-.59.68-.95 1.62-.95 2.65V20H0m24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65 2.56.34 4.45 1.51 4.45 2.9V20Z"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-4xl mb-1 text-flame-red">{{ $impactStats['volunteers'] ?? '1,500+' }}</div>
                    <p class="text-gray-600">Dedicated Volunteers</p>
                </div>
                
                <div class="p-8 bg-white rounded-lg shadow-sm">
                    <div class="text-flame-red flex justify-center mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8m0-18c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2m5 11h-4.5V5H11v9h6v-1Z"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-4xl mb-1 text-flame-red">{{ $impactStats['hours'] ?? '25,000+' }}</div>
                    <p class="text-gray-600">Hours Contributed</p>
                </div>
                
                <div class="p-8 bg-white rounded-lg shadow-sm">
                    <div class="text-flame-red flex justify-center mb-4">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5v-5Z"></path>
                        </svg>
                    </div>
                    <div class="font-bold text-4xl mb-1 text-flame-red">{{ $impactStats['events'] ?? '120' }}</div>
                    <p class="text-gray-600">Community Events Held</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Highlight Stories --}}
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Highlight Stories</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
                <!-- Empowering Local Communities -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/communities.jpg') }}" alt="Empowering Local Communities" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Empowering Local Communities</h3>
                        <p class="text-gray-600 text-sm">
                            Our volunteers have been working tirelessly to provide support and resources to underserved communities, leading to improved quality of life and self-sufficiency.
                        </p>
                    </div>
                </div>
                
                <!-- Restoring Green Spaces -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/green-spaces.jpg') }}" alt="Restoring Green Spaces" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Restoring Green Spaces</h3>
                        <p class="text-gray-600 text-sm">
                            Through our reforestation initiatives, we have planted thousands of trees in urban parks and natural reserves. This effort helps combat climate change and creates beautiful spaces for communities.
                        </p>
                    </div>
                </div>
                
                <!-- Building Brighter Futures -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/housing.jpg') }}" alt="Building Brighter Futures" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Building Brighter Futures</h3>
                        <p class="text-gray-600 text-sm">
                            We partnered with local residents to build affordable housing, providing safe and stable homes for families in need. This project not only addresses housing insecurity but builds stronger communities.
                        </p>
                    </div>
                </div>
                
                <!-- Investing in Youth Education -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/education.jpg') }}" alt="Investing in Youth Education" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Investing in Youth Education</h3>
                        <p class="text-gray-600 text-sm">
                            Our after-school programs and tutoring services are helping students achieve academic success and build confidence. We believe education is the foundation for creating lasting change.
                        </p>
                    </div>
                </div>
                
                <!-- Protecting Our Environment -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/beach-cleanup.jpg') }}" alt="Protecting Our Environment" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Protecting Our Environment</h3>
                        <p class="text-gray-600 text-sm">
                            Regular clean-up drives and conservation projects are vital to preserving our natural landscapes and wildlife. We mobilize volunteers to make a tangible difference in environmental protection.
                        </p>
                    </div>
                </div>
                
                <!-- Providing Healthcare Access -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img src="{{ asset('images/impact/healthcare.jpg') }}" alt="Providing Healthcare Access" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">Providing Healthcare Access</h3>
                        <p class="text-gray-600 text-sm">
                            Our mobile clinics and health awareness campaigns bring essential medical services to remote areas and underserved populations, improving health outcomes and quality of life.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Moments of Impact Gallery --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Moments of Impact</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
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
    <section class="py-16 bg-flame-red text-white">
        <div class="container mx-auto px-8 max-w-4xl">
            <div class="text-center py-8">
                <h2 class="text-3xl font-bold mb-4">Join Us in Making a Difference</h2>
                <p class="text-lg mb-8">Every action counts. Learn how you can contribute to our mission.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="{{ route('volunteers.volunteer') }}" class="inline-block px-8 py-3 bg-white text-flame-red hover:bg-gray-100 font-medium rounded-md transition duration-300 text-center">
                        Get Involved
                    </a>
                    <a href="{{ route('aim') }}" class="inline-block px-8 py-3 border border-white text-white hover:bg-white hover:text-flame-red font-medium rounded-md transition duration-300 text-center">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection