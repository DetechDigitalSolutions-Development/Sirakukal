@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    @include('components.cms.hero')

    {{-- About Our Mission Section --}}
    <section class="py-20">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">About Our Mission</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            @include('components.cms.about')
        </div>
    </section>

    {{-- Focus Areas Section --}}
    <section class="py-20 ">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Our Focus Areas</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            @include('components.cms.focus-area')
        </div>
    </section>

    {{-- Upcoming Events Section --}}
    <section class="py-20 ">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Upcoming Events</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @foreach($events ?? [] as $event)
                    @include('components.events.card', ['event' => $event])
                @endforeach
            </div>
        </div>
    </section>


    {{-- Impact Statistics Section --}}
    <section class="py-20 bg-white">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Our Impact So Far</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            @include('components.cms.impact-stats', [
                'volunteers' => $impactStats['volunteers'] ,
                'hours' => $impactStats['hours'] ,
                'events' => $impactStats['events'] ,
                'eventsLabel' => 'Community Events Held'
            ])
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section class="py-20 ">
        <div class="container mx-auto px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">What Our Volunteers Say</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
            @include('components.cms.testamonial', ['testimonials' => $testimonials ?? []])
        </div>
    </section>

    {{-- Ready to Make a Difference CTA --}}
    <section class="py-16 bg-flame-red text-white">
        <div class="container mx-auto px-8 max-w-4xl">
            <div class="text-center py-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold">Ready to Make a Difference?</h2>
                <div class="h-1 w-20 bg-primary rounded mx-auto mt-4"></div>
            </div>
                <a href="{{ route('volunteers.volunteer') }}" class="inline-block px-8 py-3 bg-white text-flame-red hover:bg-gray-100 font-medium rounded-full transition duration-300 text-center">
                    Become a Volunteer Today!
                </a>
            </div>
        </div>
    </section>
@endsection
