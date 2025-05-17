
@extends('layouts.app')

@section('title', 'Events - Sirakukal')


@section('content')
    <!-- Page Header -->
     @include('components.cms.aim')
    <!-- <div class="bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <h1 class="text-3xl font-bold text-gray-800">Events</h1>
            <div class="flex items-center text-sm text-gray-500 mt-2">
                <a href="/" class="hover:text-blue-600">Home</a>
                <span class="mx-2">/</span>
                <span>Events</span>
            </div>
        </div>
    </div> -->
    
    <!-- Events Section -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row">
                <!-- Sidebar with Filters -->
                <div class="lg:w-1/4 mb-8 lg:mb-0 lg:pr-8">
                    @include('components.events.filters', ['categories' => $categories ?? []])
                </div>
                
                <!-- Events Grid -->
                <div class="lg:w-3/4">
                    @if(count($events ?? []) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach($events as $event)
                                @include('components.events.card', ['event' => $event])
                            @endforeach
                        </div>

                    @else
                        <div class="text-center py-16 bg-gray-50 rounded-lg">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mt-2 text-xl font-medium text-gray-900">No events found</h3>
                            <p class="mt-1 text-gray-500">There are no events matching your search criteria.</p>
                            <div class="mt-6">
                                <a href="{{ route('events.index') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                                    Clear filters
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection