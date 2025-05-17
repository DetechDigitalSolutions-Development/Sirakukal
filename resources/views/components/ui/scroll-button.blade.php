<div 
    x-data="{ 
        showButton: false,
        atBottom: false,
        scrollAction() {
            if (this.atBottom) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            } else {
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            }
        },
        updateScrollState() {
            this.showButton = window.scrollY > 200;
            
            // Check if we're at or near the bottom of the page
            const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight;
            const clientHeight = document.documentElement.clientHeight;
            
            // Consider we're at bottom if within 100px of the bottom
            this.atBottom = (scrollTop + clientHeight >= scrollHeight - 100);
        }
    }"
    x-init="
        updateScrollState();
        window.addEventListener('scroll', () => {
            updateScrollState();
        });
    "
    class="fixed bottom-6 right-6 z-50"
>
    <!-- Single button that flips between up and down -->
    <button 
        x-show="showButton"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        @click="scrollAction()"
        class="bg-primary hover:bg-primary-dark text-white rounded-full p-3 shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none"
        :aria-label="atBottom ? 'Scroll to top' : 'Scroll to bottom'"
    >
        <svg class="w-5 h-5 transition-transform duration-300" :class="{'rotate-180': !atBottom}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
        </svg>
    </button>
</div>
