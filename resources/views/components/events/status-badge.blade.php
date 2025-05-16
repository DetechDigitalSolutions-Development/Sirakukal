@php
    // Determine if event is upcoming or completed
    $isUpcoming = true; // Default for demo
    
    if (isset($event) && isset($event->date)) {
        $eventDate = \Carbon\Carbon::parse($event->date);
        $isUpcoming = $eventDate->isFuture();
    }
    
    $badgeClass = $isUpcoming 
        ? 'bg-green-500 text-white' 
        : 'bg-gray-500 text-white';
    
    $badgeText = $isUpcoming ? 'Upcoming' : 'Completed';
@endphp

<div class="absolute top-4 left-4">
    <span class="{{ $badgeClass }} text-xs font-bold px-3 py-1 rounded-full shadow">
        {{ $badgeText }}
    </span>
</div>
