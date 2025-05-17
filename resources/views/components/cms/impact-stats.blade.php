<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <div>
            <div class="font-bold text-4xl mb-1 text-flame-red">
                {{ $volunteers ?? '500+' }}
            </div>
            <p class="text-gray-600 text-sm">Volunteers</p>
        </div>
        
        <div>
            <div class="font-bold text-4xl mb-1 text-flame-red">
                {{ $hours ?? '10,000+' }}
            </div>
            <p class="text-gray-600 text-sm">Hours Served</p>
        </div>
        
        <div>
            <div class="font-bold text-4xl mb-1 text-flame-red">
                {{ $communities ?? '20+' }}
            </div>
            <p class="text-gray-600 text-sm">Communities Helped</p>
        </div>
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