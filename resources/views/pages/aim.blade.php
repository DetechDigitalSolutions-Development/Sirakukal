@extends('layouts.app')

@section('title', 'Our Mission - Sirakukal')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.aim')

    {{-- Our Mission Section --}}
    <section class="py-12 sm:py-14 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Our Mission</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="max-w-3xl mx-auto text-center">
                <p class="text-gray-700 text-sm sm:text-base md:text-lg">
                    Our mission is to empower communities and drive sustainable development by focusing 
                    on critical global challenges through targeted, effective, and collaborative initiatives.
                </p>
            </div>
        </div>
    </section>

    {{-- Key Initiative Areas Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Our Key Initiative Areas</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 mt-8 sm:mt-10 md:mt-12">
                <!-- Quality Education -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/education.jpg') }}" alt="Quality Education" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3L1 9l11 6 9-4.91V17h2V9M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Quality Education</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Ensuring inclusive and equitable quality education and promote lifelong learning opportunities for all.</p>
                    </div>
                </div>
                
                <!-- Good Health & Well-being -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/health.jpg') }}" alt="Good Health & Well-being" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 13H8v-3h2.5V7.5h3V10H16v3h-2.5v2.5h-3V13M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12 6.48 2 12 2m0 18c4.42 0 8-3.58 8-8s-3.58-8-8-8-8 3.58-8 8 3.58 8 8 8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Good Health & Well-being</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Promoting healthy lives and well-being for all at all ages, improving access to healthcare.</p>
                    </div>
                </div>
                
                <!-- Climate Action -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/climate.jpg') }}" alt="Climate Action" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 7c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3zm1-13h-2V1h2zm0 19h-2v-3h2zm9-10h-3v-2h3zM5 12H2v-2h3zm15.7 5.35-2.1-2.1 1.4-1.4 2.1 2.1-1.4 1.4zM6.9 5.75 4.8 3.65l1.4-1.4 2.1 2.1-1.4 1.4zM17.65 7.05l-1.4-1.4 2.1-2.1 1.4 1.4-2.1 2.1zM6.3 17.95l-2.1 2.1-1.4-1.4 2.1-2.1 1.4 1.4z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Climate Action</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Taking urgent action to combat climate change and its impacts, supporting renewable energy.</p>
                    </div>
                </div>
                
                <!-- Gender Equality -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/gender.jpg') }}" alt="Gender Equality" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4m-1-6h2v4h-2zm-1 6H8c-2.21 0-4 1.79-4 4v2h15v-2c0-2.21-1.79-4-4-4h-4Z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Gender Equality</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Achieving gender equality and empower all women and girls through access to opportunities.</p>
                    </div>
                </div>
                
                <!-- Poverty Reduction -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/poverty.jpg') }}" alt="Poverty Reduction" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 22v-2h18v2H3m15-8.81v-5.38L12 3 6 7.81v5.38l6 4.82 6-4.82z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Poverty Reduction</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Ending poverty in all its forms everywhere through sustainable economic growth.</p>
                    </div>
                </div>
                
                <!-- Clean Water & Sanitation -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <div class="h-40 sm:h-44 md:h-48 overflow-hidden">
                        <img src="{{ asset('images/initiatives/water.jpg') }}" alt="Clean Water & Sanitation" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 sm:p-5 md:p-6">
                        <div class="w-10 h-10 sm:w-12 sm:h-12 bg-flame-red rounded-full flex items-center justify-center text-white mb-3 sm:mb-4">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 20c-3.31 0-6-2.69-6-6 0-4 6-10.75 6-10.75S18 10 18 14c0 3.31-2.69 6-6 6zm.23-15.17c-2.83 4.67-6.23 9.59-6.23 13.17 0 3.03 1.3 5.48 3 6.95-1.5-1.39-2-2.92-2-4.95 0-3.58 3.4-8.5 6.23-13.17C16.06 11.17 19 16.09 19 19.67c0 2.03-.5 3.56-2 4.95 1.7-1.47 3-3.92 3-6.95 0-3.58-3.94-8.5-7.77-13.17z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg sm:text-xl font-bold mb-2">Clean Water & Sanitation</h3>
                        <p class="text-gray-600 text-xs sm:text-sm">Ensuring availability and sustainable management of water and sanitation for all.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Hear from Our Volunteers Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Hear from Our Volunteers</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8 mt-8 sm:mt-10 md:mt-12">
                @foreach ($testimonials as $testimonial)
                    <div class="bg-white p-4 sm:p-5 md:p-6 rounded-lg shadow-sm">
                        <div class="italic text-gray-600 text-sm sm:text-base mb-3 sm:mb-4">
                            "{{ $testimonial->description }}"
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-full overflow-hidden mr-3 sm:mr-4">
                                <img src="{{ asset('storage/' . $testimonial->image_url) }}" alt="{{ $testimonial->author }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <p class="font-bold text-sm sm:text-base">{{ $testimonial->author }}</p>
                                <p class="text-xs sm:text-sm text-gray-500">{{ $testimonial->title ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    {{-- Featured Initiative Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Featured Initiative: Education</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="flex flex-col md:flex-row gap-4 sm:gap-6 md:gap-8 mt-8 sm:mt-10 md:mt-12">
                <div class="md:w-1/3">
                    <img src="{{ asset('images/initiatives/featured-education.jpg') }}" alt="Education Initiative" class="w-full h-auto rounded-lg shadow-md">
                </div>
                <div class="md:w-2/3">
                    <h3 class="text-xl sm:text-2xl font-bold mb-3 sm:mb-4">Transforming Education Systems</h3>
                    <p class="text-gray-700 text-sm sm:text-base mb-4 sm:mb-6">
                        Our flagship education program focuses on bringing modern learning environments to underserved communities. By partnering with local schools, training teachers, and providing access to modern learning tools and resources, we are building a foundation for brighter futures. We focus on developing critical thinking skills, digital literacy, and fostering a love for lifelong learning. Join us in creating equitable opportunities for every child.
                    </p>
                    <a href="#" class="inline-block px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 bg-flame-red text-white hover:bg-red-700 font-medium rounded-lg transition duration-300 text-sm sm:text-base">
                        Learn More About This Initiative
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection