<div class="bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
    {{-- Event Image --}}
    <img src="{{ $event->image_url ? 'storage/' . $event->image_url : asset('images/events/default-event.jpg') }}" alt="{{ $event->name ?? 'Event' }}" 
        class="w-full h-48 object-cover">
    
    {{-- Event Content --}}
    <div class="p-4">
        {{-- Date and Time --}}
        <div class="text-gray-500 text-sm mb-2">
            {{ isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('F j, Y') : 'November 15, 2025' }}
            @if(isset($event->time))
                <span class="ml-2">{{ $event->time }}</span>
            @endif
        </div>
        
        {{-- Title --}}
        <h3 class="text-lg font-bold mb-2">{{ $event->name ?? 'Community Volunteer Day' }}</h3>
        
        {{-- Location if available --}}
        @if(isset($event->venue))
            <div class="text-gray-600 text-sm mb-2 flex items-center">
                <svg class="w-4 h-4 text-gray-500 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                {{ $event->venue }}
            </div>
        @endif
        
        {{-- Description --}}
        <p class="text-gray-600 text-sm mb-3">
         {!! $event->description !!}
        </p>
        
        {{-- View More link --}}
        <a href="{{ route('events.show', $event->id ?? 1) }}" class="text-flame-red hover:text-sunset-orange text-sm font-medium">
            View More
        </a>
    </div>
</div>