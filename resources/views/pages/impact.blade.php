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