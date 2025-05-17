{{-- You can pass an array of stats or use the default ones --}}
@php
    $stats = $stats ?? [
        [
            'icon' => '<svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>',
            'count' => '1,000+',
            'label' => 'Volunteers',
            'description' => 'Active volunteers across the region'
        ]
    ];
@endphp

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
        @foreach($stats as $stat)
        <div class="bg-charcoal-black p-6 rounded-lg shadow-lg">
            <div class="text-golden-sunrise mb-4 flex justify-center">
                {!! $stat['icon'] !!}
            </div>
            <div class="font-bold text-4xl mb-1 text-golden-sunrise counter" data-count="{{ preg_replace('/[^0-9]/', '', $stat['count']) }}">
                {{ $stat['count'] }}
            </div>
            <h3 class="text-xl font-bold mb-2 text-ivory-white uppercase">{{ $stat['label'] }}</h3>
            <p class="text-ivory-white/80">{{ $stat['description'] }}</p>
        </div>
        @endforeach
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check if Intersection Observer is supported
        if ('IntersectionObserver' in window) {
            const counters = document.querySelectorAll('.counter');
            const options = {
                threshold: 0.5
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const countTo = parseInt(counter.getAttribute('data-count'));
                        const displayValue = counter.innerText;
                        
                        // Only animate if not already animated
                        if (!counter.classList.contains('counted')) {
                            animateCounter(counter, 0, countTo, displayValue);
                            counter.classList.add('counted');
                        }
                        
                        // Unobserve after animation
                        observer.unobserve(counter);
                    }
                });
            }, options);
            
            counters.forEach(counter => {
                observer.observe(counter);
            });
        }
    });
    
    function animateCounter(counter, current, target, displayFormat) {
        // Determine if the display has a plus sign or other suffix
        const hasPlus = displayFormat.includes('+');
        const suffix = hasPlus ? '+' : '';
        
        // Set duration based on target value (larger numbers animate faster per increment)
        const duration = 2000; // 2 seconds total animation
        const stepTime = Math.abs(Math.floor(duration / target));
        
        if (current < target) {
            const increment = Math.ceil(target / (duration / 30)); // Smoother animation with more steps
            let newCurrent = current + increment;
            
            if (newCurrent <= target) {
                counter.innerText = newCurrent.toLocaleString() + suffix;
                setTimeout(() => animateCounter(counter, newCurrent, target, displayFormat), stepTime);
            } else {
                counter.innerText = target.toLocaleString() + suffix;
            }
        }
    }
</script>
@endpush