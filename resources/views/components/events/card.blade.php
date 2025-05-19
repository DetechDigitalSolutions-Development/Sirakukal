<div class="bg-white rounded-lg shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
    {{-- Event Image --}}
    <img src="storage/{{ $event->image_url ?? asset('images/events/default-event.jpg') }}" alt="{{ $event->title ?? 'Event' }}" 
        class="w-full h-48 object-cover">
    
    {{-- Event Content --}}
    <div class="p-4">
        {{-- Date --}}
        <div class="text-gray-500 text-sm mb-2">
            {{ isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('F j, Y') : 'November 15, 2025' }}
        </div>
        
        {{-- Title --}}
        <h3 class="text-lg font-bold mb-2">{{ $event->title ?? 'Community Volunteer Day' }}</h3>
        
        {{-- Description --}}
        <p class="text-gray-600 text-sm mb-3">
            {{ $event->description ?? 'Join us for a day of community service and make a positive impact in our neighborhood.' }}
        </p>
        
        {{-- View More link --}}
        <a href="{{ route('events.show', $event->id ?? 1) }}" class="text-flame-red hover:text-sunset-orange text-sm font-medium">
            View More
        </a>
    </div>
</div>