@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.hero')

    {{-- About Section --}}
    <section class="py-16 bg-ivory-white">
        @include('components.cms.about')
    </section>

    {{-- Focus Areas Section --}}
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 heading-dynamic">{{ __('message.headings.our_focus_areas') }}</h2>
            @include('components.cms.focus-area')
        </div>
    </section>

    {{-- Impact Statistics Section --}}
    <section class="py-16 bg-flame-red text-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 text-ivory-white uppercase">Our Impact</h2>
            @include('components.cms.impact-stats')
        </div>
    </section>
    

    @include('components.cms.about')
    {{-- Events Section --}}
    <section class="py-16 bg-ivory-white">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-3xl font-bold heading-dynamic">Latest Events</h2>
                <a href="{{ route('events.index') }}" class="text-sunset-orange hover:text-flame-red font-semibold">View All</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($events ?? [] as $event)
                    @include('components.events.card', ['event' => $event])
                @endforeach
            </div>
        </div>
    </section>



    {{-- Volunteer Registration CTA --}}
    <section class="py-16 bg-sunset-orange text-ivory-white text-center">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-4 uppercase">Join Our Mission</h2>
            <p class="text-xl max-w-2xl mx-auto mb-8">Become a volunteer today and help us make a difference in the community.</p>
            @include('partials.conditional.registration-enabled')
        </div>
    </section>

    {{-- Contact Form Section --}}
    <section class="py-16 bg-ivory-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12 heading-dynamic">Connect With Us</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="">
                    <h2 class="text-3xl font-bold mb-4 text-flame-red">Get In Touch</h2>
                    <p class="mb-6">Have questions or want to learn more about our initiatives? Reach out to us.</p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="rounded-full bg-sunset-orange p-2 text-ivory-white mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Phone</h3>
                                <p>+1 (123) 456-7890</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="rounded-full bg-sunset-orange p-2 text-ivory-white mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Email</h3>
                                <p>info@sirakukal.org</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="rounded-full bg-sunset-orange p-2 text-ivory-white mr-4">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold">Address</h3>
                                <p>123 Main Street, City, Country</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-ivory-white p-6 rounded-lg shadow-md border-t-4 border-golden-sunrise">
                    <form>
                        <div class="mb-4">
                            <label for="name" class="block text-charcoal-black font-medium mb-2">Your Name</label>
                            <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-flame-red focus:border-flame-red">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-charcoal-black font-medium mb-2">Email Address</label>
                            <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-flame-red focus:border-flame-red">
                        </div>
                        <div class="mb-4">
                            <label for="message" class="block text-charcoal-black font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-flame-red focus:border-flame-red"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
