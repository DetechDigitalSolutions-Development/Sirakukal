@extends('layouts.app')

@section('title', 'Events - Sirakukal')

@section('content')
    <!-- Hero Section with Upcoming Events title -->
    <section class="py-12 sm:py-14 md:py-16">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-6xl">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold mb-4 sm:mb-5 md:mb-6">Upcoming Events</h1>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <p class="text-gray-600 text-sm sm:text-base max-w-3xl mx-auto">
                    Our flagship education initiative aims to revolutionize learning environments in underserved communities. By partnering with local schools, 
                    training teachers, and providing access to modern learning tools and resources, we are building a foundation for brighter futures. We focus on 
                    developing critical thinking skills, digital literacy, and fostering a love for lifelong learning.
                </p>
            </div>

            <div class="flex flex-col md:flex-row gap-6 sm:gap-7 md:gap-8 mt-8 sm:mt-9 md:mt-10">
                <!-- Advanced Filters Sidebar -->
                <div class="w-full md:w-1/4">
                    <form action="{{ route('events.index') }}" method="GET" class="bg-white rounded-lg shadow-md p-4 sm:p-5">
                        <h3 class="text-base sm:text-lg font-bold mb-4 pb-2 border-b border-gray-200">Advanced Filters</h3>
                        
                        <!-- Event Type Filter (Hidden) -->
                        @if($activeCategory)
                            <input type="hidden" name="category" value="{{ $activeCategory }}">
                        @endif
                        
                        <!-- Location Filter - Searchable Dropdown -->
                        <div class="mb-4 sm:mb-5 md:mb-6" x-data="{ 
                            locationSearch: '{{ $location ? $location . ' (' . $eventLocations[$location] . ')' : '' }}',
                            showDropdown: false,
                            selectedLocation: '{{ $location }}',
                            locations: [
                                @foreach($eventLocations as $city => $province)
                                    {value: '{{ $city }}', label: '{{ $city }} ({{ $province }})'},
                                @endforeach
                            ],
                            filteredLocations() {
                                if (!this.locationSearch) {
                                    return this.locations;
                                }
                                return this.locations.filter(item => 
                                    item.label.toLowerCase().includes(this.locationSearch.toLowerCase())
                                );
                            },
                            selectLocation(value, label) {
                                this.selectedLocation = value;
                                this.locationSearch = value ? label : '';
                                this.showDropdown = false;
                            },
                            clearLocation() {
                                this.selectedLocation = '';
                                this.locationSearch = '';
                            }
                        }">
                            <h4 class="font-medium text-sm sm:text-base mb-2">Location</h4>
                            <div class="relative">
                                <input 
                                    type="hidden" 
                                    name="location" 
                                    :value="selectedLocation">
                                <div class="relative flex items-center">
                                    <input 
                                        type="text" 
                                        x-model="locationSearch"
                                        @focus="showDropdown = true" 
                                        @click.outside="showDropdown = false"
                                        @input="showDropdown = true"
                                        class="w-full px-3 sm:px-4 py-2 text-sm sm:text-base border border-gray-300 rounded-md focus:ring-primary focus:border-primary pr-8" 
                                        placeholder="Type to search locations"
                                        autocomplete="off"
                                    >
                                    <button 
                                        x-show="locationSearch && selectedLocation" 
                                        @click.prevent="clearLocation()" 
                                        type="button" 
                                        class="absolute right-2 text-gray-500 hover:text-gray-700"
                                    >
                                        <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div 
                                    x-show="showDropdown" 
                                    x-transition 
                                    class="absolute z-50 w-full mt-1 bg-white shadow-lg rounded-md border border-gray-300 max-h-60 overflow-y-auto"
                                >
                                    <div 
                                        @click="selectLocation('', 'Any Location')" 
                                        class="px-3 sm:px-4 py-2 text-sm sm:text-base hover:bg-gray-100 cursor-pointer font-semibold border-b border-gray-100" 
                                        :class="{'bg-gray-100': selectedLocation === ''}">
                                        Any Location
                                    </div>
                                    <template x-for="location in filteredLocations()" :key="location.value">
                                        <div 
                                            @click="selectLocation(location.value, location.label)" 
                                            class="px-3 sm:px-4 py-2 text-sm sm:text-base hover:bg-gray-100 cursor-pointer" 
                                            :class="{'bg-gray-100': selectedLocation === location.value}" 
                                            x-text="location.label">
                                        </div>
                                    </template>
                                    <div 
                                        x-show="filteredLocations().length === 0" 
                                        class="px-3 sm:px-4 py-2 text-sm sm:text-base text-gray-500 italic"
                                    >
                                        No matching locations
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Date Filter -->
                        <div class="mb-4 sm:mb-5 md:mb-6">
                            <h4 class="font-medium text-sm sm:text-base mb-2">Date</h4>
                            <select name="date_filter" class="w-full text-sm sm:text-base border border-gray-300 rounded px-3 sm:px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="" {{ $dateFilter === '' ? 'selected' : '' }}>Any Date</option>
                                <option value="today" {{ $dateFilter === 'today' ? 'selected' : '' }}>Today</option>
                                <option value="tomorrow" {{ $dateFilter === 'tomorrow' ? 'selected' : '' }}>Tomorrow</option>
                                <option value="this_week" {{ $dateFilter === 'this_week' ? 'selected' : '' }}>This Week</option>
                                <option value="next_week" {{ $dateFilter === 'next_week' ? 'selected' : '' }}>Next Week</option>
                                <option value="this_month" {{ $dateFilter === 'this_month' ? 'selected' : '' }}>This Month</option>
                            </select>
                        </div>
                        
                        <!-- Event Type Filter -->
                        <div class="mb-4 sm:mb-5 md:mb-6">
                            <h4 class="font-medium text-sm sm:text-base mb-2">Event Type</h4>
                            <select name="type" class="w-full text-sm sm:text-base border border-gray-300 rounded px-3 sm:px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                <option value="" {{ !isset($eventType) || $eventType === '' ? 'selected' : '' }}>Any Type</option>
                                <option value="Physical" {{ isset($eventType) && $eventType === 'Physical' ? 'selected' : '' }}>Physical</option>
                                <option value="Online" {{ isset($eventType) && $eventType === 'Online' ? 'selected' : '' }}>Online</option>
                            </select>
                        </div>
                        
                        <!-- Filter Actions -->
                        <div class="grid grid-cols-2 divide-x divide-gray-200 overflow-hidden rounded">
                            <button type="submit" class="py-2 sm:py-2.5 md:py-3 text-sm sm:text-base text-center font-medium bg-primary text-white hover:bg-primary-dark transition-colors duration-200">
                                Apply Filters
                            </button>
                            
                            <a href="{{ route('events.index') }}" class="py-2 sm:py-2.5 md:py-3 text-sm sm:text-base text-center font-medium text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                Clear Filters
                            </a>
                        </div>
                    </form>
                </div>

                <!-- Main Content Area -->
                <div class="w-full md:w-3/4">
                    <!-- Filter buttons -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6 sm:mb-7 md:mb-8">
                        <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-gray-200">
                            @foreach($eventTypes as $category)
                                <a href="{{ route('events.index', ['category' => $category]) }}" 
                                class="py-2 sm:py-2.5 md:py-3 text-sm sm:text-base text-center font-medium {{ $activeCategory === $category ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-50' }} transition-colors duration-200">
                                    {{ $category }}
                                </a>
                            @endforeach
                        </div>
                    </div>
            
                    <!-- Event Listings Organized by Date -->
                    <div class="mt-4 sm:mt-5 md:mt-6">
                @if(count($events) > 0)
                    {{-- Group events by date --}}
                    @php
                        $groupedEvents = collect($events)->groupBy(function ($event) {
                            $eventDate = is_string($event->date) ? \Carbon\Carbon::parse($event->date) : $event->date;
                            return $eventDate->format('F d');
                        })->sortBy(function ($events, $date) {
                            $firstEvent = $events->first();
                            $eventDate = is_string($firstEvent->date) ? \Carbon\Carbon::parse($firstEvent->date) : $firstEvent->date;
                            return $eventDate->timestamp;
                        });
                    @endphp
                    
                    @foreach($groupedEvents as $date => $dateEvents)
                        <div class="mb-8 sm:mb-10 md:mb-12">
                            <h2 class="text-xl sm:text-2xl font-bold mb-4 sm:mb-5 md:mb-6">{{ $date }}</h2>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6">
                                @foreach($dateEvents as $event)
                                    <div class="relative">
                                        @include('components.events.card', ['event' => $event])
                                        <div class="absolute top-3 sm:top-4 right-3 sm:right-4 bg-primary text-white text-xs font-bold px-2 py-1 rounded">{{ $event->category }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center py-8 sm:py-10 md:py-12 bg-gray-50 rounded-lg">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 mx-auto text-gray-400 mb-3 sm:mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h3 class="text-base sm:text-lg font-medium text-gray-700 mb-2">No events found</h3>
                        <p class="text-sm sm:text-base text-gray-500">There are no upcoming {{ $activeCategory ? strtolower($activeCategory) : 'events' }} at this time.</p>
                        @if($activeCategory)
                            <a href="{{ route('events.index') }}" class="mt-3 sm:mt-4 inline-block text-sm sm:text-base text-primary hover:underline">View all events</a>
                        @endif
                    </div>
                @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-12 sm:py-14 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-4xl">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Frequently Asked Questions</h2>
                <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
            </div>
            
            <div class="space-y-3 sm:space-y-4">
                <!-- FAQ Item 1 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 text-left focus:outline-none"
                    >
                        <span class="font-medium text-gray-800 text-sm sm:text-base">What is the time commitment required?</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 border-t border-gray-200">
                        <p class="text-gray-600 text-xs sm:text-sm">
                            The time commitment varies depending on the type of event. One-time events typically require 2-4 hours of your time, while ongoing projects may ask for a regular commitment of a few hours per week. We try to be flexible and work with your schedule where possible.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 text-left focus:outline-none"
                    >
                        <span class="font-medium text-gray-800 text-sm sm:text-base">Are there any age restrictions to volunteer?</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 border-t border-gray-200">
                        <p class="text-gray-600 text-xs sm:text-sm">
                            Most of our volunteer opportunities are open to individuals 16 years and older. For those under 16, we have family-friendly events where children can participate when accompanied by a parent or guardian. Some specialized roles may have different age requirements based on the nature of work involved.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 text-left focus:outline-none"
                    >
                        <span class="font-medium text-gray-800 text-sm sm:text-base">What kind of support will I receive?</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 border-t border-gray-200">
                        <p class="text-gray-600 text-xs sm:text-sm">
                            We provide comprehensive orientation and training for all volunteers. You'll be paired with experienced team members who can guide you through your tasks. We also offer regular check-ins, educational resources, and a supportive community network to ensure you have everything you need to succeed in your role.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 text-left focus:outline-none"
                    >
                        <span class="font-medium text-gray-800 text-sm sm:text-base">Can I volunteer remotely?</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 border-t border-gray-200">
                        <p class="text-gray-600 text-xs sm:text-sm">
                            Yes, we offer several remote volunteer opportunities! These include content creation, social media management, graphic design, translation services, and administrative support. Remote volunteers are an integral part of our team and receive the same level of support and recognition as in-person volunteers.
                        </p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div x-data="{ open: false }" class="border border-gray-200 rounded-lg overflow-hidden bg-white">
                    <button 
                        @click="open = !open" 
                        class="flex justify-between items-center w-full px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 text-left focus:outline-none"
                    >
                        <span class="font-medium text-gray-800 text-sm sm:text-base">Do I need specific skills or experience?</span>
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-500 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="open" x-collapse class="px-4 sm:px-5 md:px-6 py-3 sm:py-3.5 md:py-4 border-t border-gray-200">
                        <p class="text-gray-600 text-xs sm:text-sm">
                            Many of our volunteer positions require no specific skills or prior experience—just enthusiasm and willingness to learn! We believe everyone has something valuable to contribute. For specialized roles (like teaching, healthcare services, or technical support), relevant skills or experience may be necessary, but we also offer training programs to help develop these skills.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-12 sm:py-14 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 md:px-8 max-w-5xl">
            <div class="text-center mb-8 sm:mb-10 md:mb-12">
                <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold mb-3 sm:mb-4">Still Have Questions?</h2>
                <p class="text-gray-600 text-sm sm:text-base max-w-2xl mx-auto">We're here to help! Reach out to us directly or explore our detailed support resources.</p>
            </div>
            
            <div class="flex flex-col md:flex-row gap-6 sm:gap-8 md:gap-10">
                <!-- Contact Information -->
                <div class="md:w-1/3 bg-white rounded-lg shadow-sm p-4 sm:p-5 md:p-6 h-fit">
                    <h3 class="text-lg sm:text-xl font-bold mb-4 sm:mb-5 pb-2 border-b border-gray-100">Contact Information</h3>
                    
                    <div class="space-y-3 sm:space-y-4">
                        <div class="flex items-start">
                            <div class="text-primary mr-3 mt-1">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-xs sm:text-sm">123 Main Street, Colombo, Sri Lanka</p>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-primary mr-3 mt-1">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-xs sm:text-sm">info@sirakukal.org</p>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="text-primary mr-3 mt-1">
                                <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-600 text-xs sm:text-sm">(+94) 11-2345-6789</p>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="md:w-2/3">
                    @if(session('success'))
                        <div class="mb-4 p-3 sm:p-4 bg-green-100 text-green-800 rounded-md text-sm sm:text-base">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('contact.submit') }}" class="bg-white rounded-lg shadow-sm p-4 sm:p-5 md:p-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5 md:gap-6 mb-4 sm:mb-5 md:mb-6">
                            <div>
                                <label for="first_name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">First name</label>
                                <input type="text" name="first_name" id="first_name" class="w-full border border-gray-300 rounded-md shadow-sm px-3 sm:px-4 py-2 text-sm sm:text-base focus:ring-primary focus:border-primary" placeholder="Enter your first name">
                            </div>
                            
                            <div>
                                <label for="last_name" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Last name</label>
                                <input type="text" name="last_name" id="last_name" class="w-full border border-gray-300 rounded-md shadow-sm px-3 sm:px-4 py-2 text-sm sm:text-base focus:ring-primary focus:border-primary" placeholder="Enter your last name">
                            </div>
                        </div>
                        
                        <div class="mb-4 sm:mb-5 md:mb-6">
                            <label for="email" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded-md shadow-sm px-3 sm:px-4 py-2 text-sm sm:text-base focus:ring-primary focus:border-primary" placeholder="Enter your email address">
                        </div>
                        
                        <div class="mb-4 sm:mb-5 md:mb-6">
                            <label for="message" class="block text-xs sm:text-sm font-medium text-gray-700 mb-1">How can we help?</label>
                            <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded-md shadow-sm px-3 sm:px-4 py-2 text-sm sm:text-base focus:ring-primary focus:border-primary" placeholder="Please share what you want us to help with"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-white font-medium py-2 sm:py-2.5 md:py-3 px-4 sm:px-5 md:px-6 rounded-md transition-colors duration-300 text-sm sm:text-base">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection