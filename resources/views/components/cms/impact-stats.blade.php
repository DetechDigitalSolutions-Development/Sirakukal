{{-- Impact Stats Component --}}
{{-- Check if a section title is provided, otherwise don't render the section header --}}
@if(isset($sectionTitle))
<div class="text-center mb-8 sm:mb-10 md:mb-12">
    <h2 class="text-2xl sm:text-2xl md:text-3xl font-bold">{{ $sectionTitle }}</h2>
    <div class="h-1 w-16 sm:w-18 md:w-20 bg-primary rounded mx-auto mt-3 sm:mt-4"></div>
</div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 md:gap-8 text-center">
    <div class="p-4 sm:p-6 md:p-8 bg-white rounded-lg shadow-sm">
        <div class="text-flame-red flex justify-center mb-3 sm:mb-4">
            <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 5.5A3.5 3.5 0 0 1 15.5 9a3.5 3.5 0 0 1-3.5 3.5A3.5 3.5 0 0 1 8.5 9 3.5 3.5 0 0 1 12 5.5M5 8c.56 0 1.08.15 1.53.42-.15 1.43.27 2.85 1.13 3.96C7.16 13.34 6.16 14 5 14a3 3 0 0 1-3-3 3 3 0 0 1 3-3m14 0a3 3 0 0 1 3 3 3 3 0 0 1-3 3c-1.16 0-2.16-.66-2.66-1.62a5.536 5.536 0 0 0 1.13-3.96c.45-.27.97-.42 1.53-.42M5.5 18.25c0-2.07 2.91-3.75 6.5-3.75s6.5 1.68 6.5 3.75V20h-13v-1.75M0 20v-1.5c0-1.39 1.89-2.56 4.45-2.9-.59.68-.95 1.62-.95 2.65V20H0m24 0h-3.5v-1.75c0-1.03-.36-1.97-.95-2.65 2.56.34 4.45 1.51 4.45 2.9V20Z"></path>
            </svg>
        </div>
        <div class="font-bold text-2xl sm:text-3xl md:text-4xl mb-1 text-flame-red counter" data-count="{{ trim(str_replace(['+', ','], '', $volunteers ?? '500')) }}">
            {{ $volunteers ?? '500+' }}
        </div>
        <p class="text-gray-600 text-sm sm:text-base">{{ $volunteersLabel ?? 'Dedicated Volunteers' }}</p>
    </div>
    
    <div class="p-4 sm:p-6 md:p-8 bg-white rounded-lg shadow-sm">
        <div class="text-flame-red flex justify-center mb-3 sm:mb-4">
            <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 20c-4.4 0-8-3.6-8-8s3.6-8 8-8 8 3.6 8 8-3.6 8-8 8m0-18c-5.5 0-10 4.5-10 10s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2m5 11h-4.5V5H11v9h6v-1Z"></path>
            </svg>
        </div>
        <div class="font-bold text-2xl sm:text-3xl md:text-4xl mb-1 text-flame-red counter" data-count="{{ trim(str_replace(['+', ','], '', $hours ?? '10000')) }}">
            {{ $hours ?? '10,000+' }}
        </div>
        <p class="text-gray-600 text-sm sm:text-base">{{ $hoursLabel ?? 'Hours Contributed' }}</p>
    </div>
    
    <div class="p-4 sm:p-6 md:p-8 bg-white rounded-lg shadow-sm">
        <div class="text-flame-red flex justify-center mb-3 sm:mb-4">
            <svg class="w-8 h-8 sm:w-10 sm:h-10 md:w-12 md:h-12" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5v-5Z"></path>
            </svg>
        </div>
        <div class="font-bold text-2xl sm:text-3xl md:text-4xl mb-1 text-flame-red counter" data-count="{{ trim(str_replace(['+', ','], '', $events ?? '20')) }}">
            {{ $events ?? '20+' }}
        </div>
        <p class="text-gray-600 text-sm sm:text-base">{{ $eventsLabel ?? 'Community Events Held' }}</p>
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
        let formattedSuffix = hasPlus ? '+' : '';
        
        // Set duration based on target value (larger numbers animate faster per increment)
        const duration = 2000; // 2 seconds total animation
        const stepTime = Math.abs(Math.floor(duration / 50));
        
        if (current < target) {
            const increment = Math.ceil(target / (duration / 30)); // Smoother animation with more steps
            let newCurrent = current + increment;
            
            if (newCurrent <= target) {
                counter.innerText = newCurrent.toLocaleString() + formattedSuffix;
                setTimeout(() => animateCounter(counter, newCurrent, target, displayFormat), stepTime);
            } else {
                counter.innerText = target.toLocaleString() + formattedSuffix;
            }
        }
    }
</script>
@endpush