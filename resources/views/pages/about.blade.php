@extends('layouts.app')

@section('content')
    @include('components.cms.aboutus')
    {{-- Hero Section --}}
   

    {{-- Our Journey Timeline Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Our Journey: A Story of Hope</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="max-w-4xl mx-auto space-y-6 sm:space-y-8 md:space-y-10">
                <!-- 2015 -->
                <div class="flex flex-col md:flex-row gap-4 sm:gap-5 md:gap-6">
                    <div class="md:w-1/4">
                        <h3 class="text-lg sm:text-xl font-bold text-primary">2015: The Seed of Hope</h3>
                    </div>
                    <div class="md:w-3/4">
                        <p class="text-sm sm:text-base text-gray-600">Founded by a small group of passionate individuals, driven by the vision of creating self-sufficient communities and providing aid where it's needed most. Our first project focused on providing clean water access in rural areas.</p>
                    </div>
                </div>
                
                <!-- 2018 -->
                <div class="flex flex-col md:flex-row gap-4 sm:gap-5 md:gap-6">
                    <div class="md:w-1/4">
                        <h3 class="text-lg sm:text-xl font-bold text-primary">2018: Expanding Our Reach</h3>
                    </div>
                    <div class="md:w-3/4">
                        <p class="text-sm sm:text-base text-gray-600">Launched our education program, building schools and providing resources for children who lacked access to basic schooling. Started our first environmental conservation project, planting trees and organizing clean-up drives.</p>
                    </div>
                </div>
                
                <!-- 2021 -->
                <div class="flex flex-col md:flex-row gap-4 sm:gap-5 md:gap-6">
                    <div class="md:w-1/4">
                        <h3 class="text-lg sm:text-xl font-bold text-primary">2021: Fostering Empowerment</h3>
                    </div>
                    <div class="md:w-3/4">
                        <p class="text-sm sm:text-base text-gray-600">Introduced vocational training programs to equip adults with skills for economic independence. Partnered with local businesses and international organizations to broaden our impact and resources.</p>
                    </div>
                </div>
                
                <!-- Today -->
                <div class="flex flex-col md:flex-row gap-4 sm:gap-5 md:gap-6">
                    <div class="md:w-1/4">
                        <h3 class="text-lg sm:text-xl font-bold text-primary">Today: Growing Stronger</h3>
                    </div>
                    <div class="md:w-3/4">
                        <p class="text-sm sm:text-base text-gray-600">We continue to expand our initiatives, empowered by thousands of dedicated volunteers and generous donors, reaching more communities and making a tangible difference in the lives of many. Our focus remains on sustainable development and community leadership.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Our Pillars Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Our Pillars</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 max-w-5xl mx-auto">
                <!-- Mission -->
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-3 sm:p-4 rounded-full inline-flex mb-3 sm:mb-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Our Mission</h4>
                    <p class="text-sm sm:text-base text-gray-600">To empower communities through sustainable initiatives, fostering resilience and self-reliance in underprivileged regions.</p>
                </div>
                
                <!-- Goals -->
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-3 sm:p-4 rounded-full inline-flex mb-3 sm:mb-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM14 11a1 1 0 011 1v1h1a1 1 0 110 2h-1v1a1 1 0 11-2 0v-1h-1a1 1 0 110-2h1v-1a1 1 0 011-1z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Our Goals</h4>
                    <p class="text-sm sm:text-base text-gray-600">Achieve measurable impact in education, environmental conservation, and economic empowerment for 10,000 individuals by 2030.</p>
                </div>
                
                <!-- Values -->
                <div class="bg-white p-4 sm:p-5 md:p-6 rounded-lg shadow-md text-center">
                    <div class="bg-primary/10 p-3 sm:p-4 rounded-full inline-flex mb-3 sm:mb-4">
                        <svg class="w-6 h-6 sm:w-8 sm:h-8 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Our Values</h4>
                    <p class="text-sm sm:text-base text-gray-600">Integrity, Compassion, Collaboration, Sustainability, and Accountability guide every action we take.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Team Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-xs sm:text-sm font-bold text-primary uppercase tracking-wider mb-2">The People Behind Our Work</h2>
                <h3 class="text-2xl sm:text-2xl md:text-3xl font-bold">Our Team</h3>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 md:gap-8">
                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-1.jpg') }}" alt="Team Member" class="w-full h-48 sm:h-56 md:h-64 object-cover">
                    <div class="p-3 sm:p-4">
                        <h4 class="font-bold text-base sm:text-lg">Jane Doe</h4>
                        <p class="text-primary text-sm sm:text-base">Executive Director</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-2.jpg') }}" alt="Team Member" class="w-full h-48 sm:h-56 md:h-64 object-cover">
                    <div class="p-3 sm:p-4">
                        <h4 class="font-bold text-base sm:text-lg">John Smith</h4>
                        <p class="text-primary text-sm sm:text-base">Programs Manager</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-3.jpg') }}" alt="Team Member" class="w-full h-48 sm:h-56 md:h-64 object-cover">
                    <div class="p-3 sm:p-4">
                        <h4 class="font-bold text-base sm:text-lg">Emily Johnson</h4>
                        <p class="text-primary text-sm sm:text-base">Volunteer Coordinator</p>
                    </div>
                </div>

                <div class="bg-gray-50 rounded-lg overflow-hidden">
                    <img src="{{ asset('images/team-4.jpg') }}" alt="Team Member" class="w-full h-48 sm:h-56 md:h-64 object-cover">
                    <div class="p-3 sm:p-4">
                        <h4 class="font-bold text-base sm:text-lg">Michael Brown</h4>
                        <p class="text-primary text-sm sm:text-base">Community Liaison</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    {{-- Moments of Impact Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Moments of Impact</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5 md:gap-6">
                <!-- Impact Item 1 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-1.png') }}" alt="Community Gardens" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Building community gardens together
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 2 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-2.jpg') }}" alt="Education" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Educating the next generation
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 3 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-3.jpg') }}" alt="Environmental Cleanup" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Keeping our environment clean
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 4 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-4.jpg') }}" alt="Health Services" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Providing essential health services
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 5 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-5.jpg') }}" alt="Food Distribution" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Distributing aid to families
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 6 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-6.jpeg') }}" alt="Tree Planting" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Planting trees for a greener future
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 7 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-7.jpeg') }}" alt="Skill Building" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Skill-building workshops
                        </div>
                    </div>
                </div>
                
                <!-- Impact Item 8 -->
                <div class="overflow-hidden rounded-lg shadow-md">
                    <div class="relative">
                        <img src="{{ asset('images/impact-8.jpg') }}" alt="Community Support" class="w-full h-40 sm:h-44 md:h-48 object-cover">
                        <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-50 text-white p-2 text-center text-xs sm:text-sm">
                            Adding color to the community
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Supported By Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">Supported By</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="flex flex-wrap justify-center items-center gap-4 sm:gap-6 md:gap-8 max-w-5xl mx-auto">
                <!-- Partner logos -->
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-1.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-2.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-3.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-4.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-5.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-6.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-7.png') }}" alt="Partner" class="max-h-full">
                </div>
                <div class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 flex items-center justify-center grayscale hover:grayscale-0 transition duration-300">
                    <img src="{{ asset('images/partners/partner-8.png') }}" alt="Partner" class="max-h-full">
                </div>
            </div>
        </div>
    </section>
    
    {{-- Ready to Make a Difference CTA --}}
@if ($join_form === 'true')
    <section class="py-12 sm:py-14 md:py-16 bg-primary text-white text-center">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Ready to Make a Difference?</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-white rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            <p class="text-base sm:text-lg md:text-xl max-w-2xl mx-auto mb-6 sm:mb-7 md:mb-8">Join the Hopegivers family today and contribute to a brighter future for communities in need. Every action counts.</p>
            <a href="{{ route('volunteers.volunteer') }}" 
               class="inline-flex items-center px-4 sm:px-5 md:px-6 py-2 sm:py-2.5 md:py-3 bg-white text-primary hover:bg-gray-100 font-medium rounded-lg transition duration-300 text-sm sm:text-base">
                Join Us Today
                <svg class="ml-2 -mr-1 w-4 h-4 sm:w-5 sm:h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </section>
@endif
@endsection
