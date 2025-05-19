@extends('layouts.app')

@section('title', 'Volunteer Portal - Sirakukal')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.volunteer')

    {{-- Benefits of Volunteering Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Benefits of Volunteering</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 mt-8 sm:mt-9 md:mt-10">
                <!-- Skill Development -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L4.5 20.29l.71.71L12 18l6.79 3 .71-.71z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Skill Development</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Gain practical experience and learn valuable skills applicable to various careers.</p>
                </div>
                
                <!-- Community Impact -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 17v2H2v-2s0-4 7-4 7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.39 3.39 0 0 0-1.93.59 5 5 0 0 1 0 5.82A3.39 3.39 0 0 0 15 11a3.5 3.5 0 0 0 0-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Community Impact</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Make a tangible difference in the lives of others and contribute to local initiatives.</p>
                </div>
                
                <!-- Networking Opportunities -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9 3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3 3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3 3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13v-1.75M0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9-.59.68-.95 1.62-.95 2.65V20H0m24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65 2.56.34 4.45 1.51 4.45 2.9V20Z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Networking Opportunities</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Connect with like-minded individuals, community leaders, and potential employers.</p>
                </div>
                
                <!-- Personal Growth -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3m6.82 6L12 12.72 5.18 9 12 5.28 18.82 9M17 16l-5 2.72L7 16v-3.73L12 15l5-2.73V16Z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Personal Growth</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Boost your confidence, empathy, and leadership abilities through meaningful experiences.</p>
                </div>
                
                <!-- Sense of Purpose -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 20a8 8 0 0 1-8-8 8 8 0 0 1 8-8 8 8 0 0 1 8 8 8 8 0 0 1-8 8m0-18A10 10 0 0 0 2 12a10 10 0 0 0 10 10 10 10 0 0 0 10-10A10 10 0 0 0 12 2m0 5a1 1 0 0 0-1 1v5a1 1 0 0 0 .5.86l3.14 1.86a1 1 0 0 0 1.36-.36 1 1 0 0 0-.36-1.36L13 13V8a1 1 0 0 0-1-1Z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Sense of Purpose</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Find fulfillment and meaning by contributing to causes you care about.</p>
                </div>
                
                <!-- Cultural Immersion -->
                <div class="text-center p-4 sm:p-5 md:p-6 bg-white rounded-lg shadow-sm border border-gray-100">
                    <div class="text-flame-red mb-3 sm:mb-4 flex justify-center">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2m0 2c1.4 0 2.8.5 4 1.2-2 1.8-4.3 3-6.9 3.2-.3-1.3-.7-2.5-1.5-3.7 1.3-.5 2.8-.7 4.4-.7M5 5.5C5.9 7 6.4 8.5 6.7 10.2c-1.7.1-3.3 0-5-.6.5-1.6 1.7-3 3.3-4.1m10 4.6c2.2-.3 4.1-1.3 5.7-2.7 1.2 1.5 1.9 3.3 2.1 5.3-2.3.9-4.8 1-7.3.3-.1-1-.2-2-.5-2.9M6.9 12c0 .1-.1.3-.1.4l-.1 1.3c-1.4-.2-2.8-.6-4.1-1.5.1-2.1.8-4 2-5.5 1.2.7 2.6 1.2 4 1.4-.4 1.4-.5 2.7-.6 3.9m8.1-1.6c2.4.6 4.8.3 7-1 .3 3.7-1.6 7.2-5 8.8-.9-1.6-1.5-3.4-1.9-5.2-.2-.7-.3-1.3-.3-2 .1-.3.1-.4.2-.6m-7.3 2.3c.7 2.8 1.9 5.3 3.5 7.5C9.9 20 8.7 19.6 7.7 19c-1.5-1.4-2.4-3.5-2.4-5.5 0-.2.1-.2.1-.4.6.3 1.4.5 2.3.6Z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg sm:text-xl font-bold mb-2 sm:mb-3">Cultural Immersion</h3>
                    <p class="text-gray-600 text-xs sm:text-sm">Experience diverse cultures and gain a broader perspective on global issues.</p>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Volunteer Registration Form --}}
    <section id="volunteer-form" class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Become a Volunteer</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
                <p class="text-gray-600 text-sm sm:text-base mt-4 max-w-xs sm:max-w-sm md:max-w-xl lg:max-w-2xl mx-auto">Fill out the form below to become a volunteer.</p>
            </div>
            
            <div class="mt-8 sm:mt-9 md:mt-10">
                @include('components.forms.volunteer-register')
            </div>
        </div>
    </section>

    {{-- Supported By Section --}}
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Supported By</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 sm:gap-6 md:gap-8 max-w-5xl mx-auto">
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

@endsection
