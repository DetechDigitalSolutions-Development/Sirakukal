@extends('layouts.app')

@section('title', isset($event->name) ? $event->name . ' - Sirakukal' : 'Event Details - Sirakukal')

@section('content')
    <!-- Hero Section -->
    <section class="py-8 sm:py-10 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-6xl">
            <div class="mb-6 sm:mb-8">
                <a href="{{ route('events.index') }}" class="inline-flex items-center text-sm sm:text-base text-gray-600 hover:text-primary transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Events
                </a>
            </div>
         
            <!-- Event Details Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="md:flex">
                    <!-- Event Image - Takes up 40% on large screens -->
                    <div class="md:w-2/5">
                        <img src="{{ $event->image_url ?? asset('images/events/default-event.jpg') }}" 
                             alt="{{ $event->title ?? 'Event' }}" 
                             class="w-full h-48 sm:h-64 md:h-full object-cover">
                    </div>
                    
                    <!-- Event Details - Takes up 60% on large screens -->
                    <div class="p-4 sm:p-6 md:p-8">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 sm:gap-4 mb-4">
                            <span class="bg-primary text-white text-xs font-bold px-3 py-1.5 rounded-full w-fit">
                                {{ $event->type ?? 'Event' }}
                            </span>
                            <span class="text-gray-500 text-sm">
                                {{ isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('F j, Y') : 'November 15, 2025' }}
                            </span>
                        </div>
                        
                        <h1 class="text-2xl sm:text-3xl font-bold mb-4">{{ $event->name ?? 'Event Title' }}</h1>
                        
                        <div class="space-y-4 sm:space-y-6">
                            <!-- Time & Location -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="flex items-start">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Time</p>
                                        <p class="text-sm sm:text-base font-medium">{{ $event->time ?? '10:00 AM - 3:00 PM' }}</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start">
                                    <div class="bg-gray-100 p-2 rounded-full mr-3">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs sm:text-sm text-gray-500 mb-1">Location</p>
                                        <p class="text-sm sm:text-base font-medium">{{ $event->venue ?? 'Event Location' }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Mode -->
                            <div class="flex items-center">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs sm:text-sm font-medium {{ $event->type === 'Physical' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                    <span class="mr-1.5 h-2 w-2 rounded-full {{ $event->type === 'Physical' ? 'bg-green-400' : 'bg-blue-400' }}"></span>
                                    {{ ucfirst($event->type ?? 'Physical') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Event Description Section -->
    <section class="py-8 sm:py-12">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                <!-- Left Column: Detailed Description -->
                <div class="md:col-span-2">
                    <div class="mb-8 sm:mb-10">
                        <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">About This Event</h2>
                        <div class="h-1 w-16 sm:w-20 bg-primary rounded mb-4 sm:mb-6"></div>
                        
                        <div class="prose max-w-none text-sm sm:text-base text-gray-700">
                            <p class="mb-4">{!! $event->description !!}</p>
                        </div>
                    </div>
                    
                    <!-- Downloadable Files Section -->
                    @if(isset($event->references) && !empty($event->references))
                    <div class="mt-6 sm:mt-8">
                        <h3 class="text-lg sm:text-xl font-bold mb-4">Event Resources</h3>
                        <div class="h-1 w-16 sm:w-20 bg-primary rounded mb-4 sm:mb-6"></div>
                        
                        <div class="space-y-3 sm:space-y-4">
                            @foreach($event->references as $reference)
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-3 sm:p-4 bg-gray-50 rounded-lg gap-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 sm:w-6 sm:h-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <span class="text-sm sm:text-base text-gray-700">{{ basename($reference) }}</span>
                                </div>
                                <a href="{{ $reference }}" download class="inline-flex items-center px-3 sm:px-4 py-1.5 sm:py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition-colors duration-200 text-sm sm:text-base">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                    Download
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <!-- Right Column: Registration Form -->
                <div class="md:col-span-1">
                    <div class="bg-white rounded-lg shadow-md p-4 sm:p-6">
                        <h3 class="text-lg sm:text-xl font-bold mb-3 sm:mb-4">Register for This Event</h3>
                        <p class="text-sm sm:text-base text-gray-600 mb-4 sm:mb-6">Please fill out the form below to secure your spot at this event.</p>
                        
                        @if(isset($event->link) && $event->link)
                        <div class="mb-4 sm:mb-6">
                            <p class="text-xs sm:text-sm text-gray-500 mb-2">Registration is handled through Google Forms</p>
                            <a href="{{ $event->link }}" target="_blank" class="bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded inline-flex items-center w-full justify-center transition-colors duration-200 text-sm sm:text-base">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Register via Google Form
                            </a>
                        </div>
                        @else
                        <!-- Built-in Registration Form -->
                        <form id="registrationForm" onsubmit="sendWhatsAppMessage(event)">
                            @csrf
                            <div class="mb-3 sm:mb-4">
                                <label for="name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Your Name</label>
                                <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            
                            <div class="mb-3 sm:mb-4">
                                <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            
                            <div class="mb-3 sm:mb-4">
                                <label for="phone" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-primary" required>
                            </div>
                            
                            <div class="mb-4 sm:mb-6">
                                <label for="message" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Additional Information</label>
                                <textarea id="message" name="message" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                                <p class="text-xs text-gray-500 mt-1">Any special requirements or questions you have.</p>
                            </div>
                            
                            <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-2 px-4 rounded transition-colors duration-200 text-sm sm:text-base">
                                Register via WhatsApp
                            </button>
                        </form>
                        @endif
                        
                        <!-- Contact Information -->
                        <div class="mt-6 sm:mt-8 pt-4 sm:pt-6 border-t border-gray-200">
                            <h4 class="text-sm sm:text-base font-medium mb-2 sm:mb-3">Questions about this event?</h4>
                            <p class="text-xs sm:text-sm text-gray-600 mb-2">Contact the organizer directly:</p>
                            <div class="text-xs sm:text-sm">
                                <p class="mb-1">
                                    <span class="font-medium">Email:</span> 
                                    <a href="mailto:events@sirakukal.org" class="text-primary hover:underline">
                                        events@sirakukal.org
                                    </a>
                                </p>
                                <p>
                                    <span class="font-medium">Phone:</span> +94 71 234 5678
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Events Section -->
    <section class="py-8 sm:py-12 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-6xl">
            <div class="text-center mb-8 sm:mb-10">
                <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-6">Other Events You Might Like</h2>
                <div class="h-1 w-16 sm:w-20 bg-primary rounded mx-auto"></div>
            </div>
            
            @if($relatedEvents->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6">
                    @foreach($relatedEvents as $relatedEvent)
                        <div class="relative">
                            @include('components.events.card', ['event' => $relatedEvent])
                            <div class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded">{{ $relatedEvent->type }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-sm sm:text-base text-gray-500">No related events found.</p>
            @endif
        </div>
    </section>
@endsection
