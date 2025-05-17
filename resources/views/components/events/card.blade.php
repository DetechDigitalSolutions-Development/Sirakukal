<div class="bg-white rounded-lg shadow-md overflow-hidden h-full flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
    {{-- Event Image --}}
    <div class="relative">
        <img src="{{ $event->image_url ?? asset('images/events/default-event.jpg') }}" alt="{{ $event->title ?? 'Event' }}" 
            class="w-full h-48 object-cover">
        
        {{-- Status Badge --}}
        @include('components.events.status-badge', ['event' => $event])
    </div>
    
    {{-- Event Content --}}
    <div class="p-6 flex-grow flex flex-col">
        {{-- Date --}}
        <div class="text-primary font-medium text-sm mb-2 flex items-center">
            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
            </svg>
            {{ isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('F j, Y - g:i A') : 'November 15, 2025 - 10:00 AM' }}
        </div>
        
        {{-- Title --}}
        <h3 class="text-xl font-bold mb-2">{{ $event->title ?? 'Community Volunteer Day' }}</h3>
        
        {{-- Description --}}
        <p class="text-gray-600 mb-4 flex-grow">
            {{ $event->description ?? 'Join us for a day of community service and make a positive impact in our neighborhood. Activities include park cleanup, tree planting, and more.' }}
        </p>
        
        {{-- Location --}}
        <div class="text-gray-600 text-sm mb-4 flex items-start">
            <svg class="w-4 h-4 mr-1 mt-0.5 flex-shrink-0 text-primary" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
            </svg>
            <span>{{ $event->location ?? 'Community Center, 123 Main Street' }}</span>
        </div>
        
        {{-- Action Button --}}
        <a href="{{ route('events.show', $event->id ?? 1) }}" class="mt-auto inline-flex items-center px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-dark transition duration-300">
            View Details
            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</div>