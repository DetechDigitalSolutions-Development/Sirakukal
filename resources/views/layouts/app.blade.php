<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sirakukal')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/Logo (1).png') }}">
    <!-- Or for .ico -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

    @vite('resources/css/app.css')
    
    <!-- Alpine.js for interactive components -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Smooth scroll behavior for anchor links -->
    <script>
        // Store the scroll target in localStorage with proper cleanup
        function setScrollTarget(target) {
            // Clean up any old scroll targets first
            cleanupScrollTargets();
            
            // Set new scroll target with timestamp
            localStorage.setItem('sirakukal_scrollTarget', target);
            localStorage.setItem('sirakukal_scrollTime', Date.now());
        }
        
        // Cleanup function to prevent localStorage pollution
        function cleanupScrollTargets() {
            // Remove any old scroll targets (older than 1 minute)
            const scrollTime = localStorage.getItem('sirakukal_scrollTime');
            const now = Date.now();
            
            // Remove if older than 1 minute or doesn't exist
            if (!scrollTime || (now - scrollTime > 60000)) {
                localStorage.removeItem('sirakukal_scrollTarget');
                localStorage.removeItem('sirakukal_scrollTime');
            }
            
            // Also clean up any legacy items (from previous implementation)
            localStorage.removeItem('scrollTarget');
            localStorage.removeItem('scrollTime');
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM content loaded, initializing smooth scroll behavior');
            
            // Function to handle smooth scrolling with offset and enhanced animation
            function smoothScrollToElement(element) {
                if (!element) {
                    console.log('No target element found for smooth scroll');
                    return;
                }
                
                console.log('Scrolling to element:', element);
                
                // Calculate position with offset to account for fixed header
                const headerOffset = 80; // Adjust based on your header height
                const elementPosition = element.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                const startPosition = window.pageYOffset;
                const distance = offsetPosition - startPosition;
                
                // Directly scroll if distance is very small
                if (Math.abs(distance) < 10) {
                    window.scrollTo(0, offsetPosition);
                    return;
                }
                
                console.log('Starting animation scroll, distance:', distance);
                
                // Use requestAnimationFrame for smoother animation
                const duration = 800; // ms
                let start = null;
                
                // Easing function for smooth deceleration
                function easeOutQuart(t) {
                    return 1 - Math.pow(1 - t, 4);
                }
                
                function animateScroll(timestamp) {
                    if (!start) start = timestamp;
                    const elapsed = timestamp - start;
                    const progress = Math.min(elapsed / duration, 1);
                    const easeProgress = easeOutQuart(progress);
                    window.scrollTo(0, startPosition + distance * easeProgress);
                    
                    if (elapsed < duration) {
                        window.requestAnimationFrame(animateScroll);
                    } else {
                        console.log('Animation completed');
                    }
                }
                
                window.requestAnimationFrame(animateScroll);
            }
            
            // First check for a stored scroll target (for cross-page navigation)
            // Run cleanup on page load
            cleanupScrollTargets();
            
            const scrollTarget = localStorage.getItem('sirakukal_scrollTarget');
            const scrollTime = localStorage.getItem('sirakukal_scrollTime');
            const now = Date.now();
            
            // Only use targets that are recent (within last 3 seconds)
            if (scrollTarget && scrollTime && (now - scrollTime < 3000)) {
                console.log('Found scroll target in localStorage:', scrollTarget);
                
                // Use a longer delay for cross-page navigation
                // This is critical for allowing the page to fully render
                setTimeout(function() {
                    const targetElement = document.querySelector(scrollTarget);
                    if (targetElement) {
                        console.log('Target element found, scrolling...');
                        smoothScrollToElement(targetElement);
                    } else {
                        console.log('Target element not found in DOM');
                    }
                    
                    // Clear the scroll target after use
                    localStorage.removeItem('sirakukal_scrollTarget');
                    localStorage.removeItem('sirakukal_scrollTime');
                    cleanupScrollTargets(); // Ensure complete cleanup
                }, 1000);
            }
            // Handle URL hash if present
            else if (window.location.hash) {
                console.log('Found hash in URL:', window.location.hash);
                
                setTimeout(function() {
                    const targetElement = document.querySelector(window.location.hash);
                    if (targetElement) {
                        smoothScrollToElement(targetElement);
                    }
                }, 800);
            }
            
            // Handle same-page anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        smoothScrollToElement(targetElement);
                        history.pushState(null, null, targetId);
                    }
                });
            });

            // Handle links with hash fragments from other pages
            document.querySelectorAll('a[href*="#"]').forEach(anchor => {
                if (!anchor.getAttribute('href').startsWith('#')) {
                    anchor.addEventListener('click', function(e) {
                        const href = this.getAttribute('href');
                        const hashIndex = href.indexOf('#');
                        
                        if (hashIndex !== -1) {
                            const baseUrl = href.substring(0, hashIndex);
                            const hash = href.substring(hashIndex);
                            
                            // Check if we're already on the target page
                            const currentPath = window.location.pathname;
                            const isCurrentPage = (
                                currentPath === baseUrl ||
                                currentPath + '/' === baseUrl || 
                                '/' + currentPath === baseUrl
                            );
                            
                            // If we're on the same page, prevent navigation and just scroll
                            if (isCurrentPage) {
                                e.preventDefault();
                                
                                const targetElement = document.querySelector(hash);
                                if (targetElement) {
                                    smoothScrollToElement(targetElement);
                                    history.pushState(null, null, hash);
                                }
                            } else {
                                // For cross-page navigation, set the target for the next page
                                setScrollTarget(hash);
                                console.log('Set scroll target for next page:', hash);
                            }
                        }
                    });
                }
            });
        });
    </script>
    
    <!-- Custom styles for brand colors -->
    <style>
        [x-cloak] { display: none !important; }
        :root {
            /* Brand Colors */
            --flame-red: #D72638;
            --sunset-orange: #EF6C00;
            --golden-sunrise: #FBB13C;
            --ivory-white: #FAF9F6;
            --charcoal-black: #2B2D42;
            
            /* Utility mappings */
            --color-primary: var(--flame-red);
            --color-secondary: var(--sunset-orange);
            --color-accent: var(--golden-sunrise);
        }
        
        /* Background colors */
        .bg-flame-red { background-color: var(--flame-red); }
        .bg-sunset-orange { background-color: var(--sunset-orange); }
        .bg-golden-sunrise { background-color: var(--golden-sunrise); }
        .bg-ivory-white { background-color: var(--ivory-white); }
        .bg-charcoal-black { background-color: var(--charcoal-black); }
        
        /* Text colors */
        .text-flame-red { color: var(--flame-red); }
        .text-sunset-orange { color: var(--sunset-orange); }
        .text-golden-sunrise { color: var(--golden-sunrise); }
        .text-ivory-white { color: var(--ivory-white); }
        .text-charcoal-black { color: var(--charcoal-black); }
        
        /* Border colors */
        .border-flame-red { border-color: var(--flame-red); }
        .border-sunset-orange { border-color: var(--sunset-orange); }
        .border-golden-sunrise { border-color: var(--golden-sunrise); }
        .border-ivory-white { border-color: var(--ivory-white); }
        .border-charcoal-black { border-color: var(--charcoal-black); }
        
        /* Hover states */
        .hover\:bg-flame-red:hover { background-color: var(--flame-red); }
        .hover\:bg-sunset-orange:hover { background-color: var(--sunset-orange); }
        .hover\:bg-golden-sunrise:hover { background-color: var(--golden-sunrise); }
        .hover\:bg-ivory-white:hover { background-color: var(--ivory-white); }
        .hover\:bg-charcoal-black:hover { background-color: var(--charcoal-black); }
        
        .hover\:text-flame-red:hover { color: var(--flame-red); }
        .hover\:text-sunset-orange:hover { color: var(--sunset-orange); }
        .hover\:text-golden-sunrise:hover { color: var(--golden-sunrise); }
        .hover\:text-ivory-white:hover { color: var(--ivory-white); }
        .hover\:text-charcoal-black:hover { color: var(--charcoal-black); }
        
        /* Focus states */
        .focus\:ring-flame-red:focus { --tw-ring-color: var(--flame-red); }
        .focus\:ring-sunset-orange:focus { --tw-ring-color: var(--sunset-orange); }
        
        /* Legacy support */
        .bg-primary { background-color: var(--flame-red); }
        .text-primary { color: var(--flame-red); }
        .border-primary { border-color: var(--flame-red); }
        .hover\:bg-primary:hover { background-color: var(--flame-red); }
        .hover\:text-primary:hover { color: var(--flame-red); }
        .focus\:ring-primary:focus { --tw-ring-color: var(--flame-red); }
        
        /* Typography Classes */
        .heading-large {
            font-weight: 700;
            text-transform: uppercase;
            color: var(--flame-red);
        }
        
        .heading-dynamic {
            font-weight: 700;
            color: var(--sunset-orange);
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        
        /* Button Classes */
        .btn-primary {
            background-color: var(--flame-red);
            color: var(--ivory-white);
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--sunset-orange);
        }
        
        .btn-secondary {
            background-color: var(--charcoal-black);
            color: var(--golden-sunrise);
            border-radius: 0.5rem;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
        }
        
        /* Badge Classes */
        .badge {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
        
        .badge-primary {
            background-color: var(--charcoal-black);
            color: var(--golden-sunrise);
        }
        
        .badge-highlight {
            background-color: var(--flame-red);
            color: var(--ivory-white);
        }
    </style>
</head>
<body class="bg-ivory-white text-charcoal-black">
    <!-- Sticky Navbar Wrapper -->
    <header class="sticky top-0 z-50 bg-white shadow-md">
        <div x-data="{ mobileMenuOpen: false }" class="container mx-auto px-4 py-2">
            <!-- Flexible layout with logo and nav closer together -->
            <div class="flex items-center justify-between relative">
                <!-- Left side with logo and navigation combined -->
                <div class="flex items-center">
                    <!-- Logo -->
                    <div class="mr-8">
                        <a href="/" class="flex items-center">
                            <img src="{{ asset('images/Logo (1).PNG') }}" alt="Sirakukal Logo" class="h-12">
                        </a>
                    </div>
                    
                    <!-- Main Navigation - next to logo -->
                    <nav class="hidden md:flex items-center space-x-5">
                        <a href="/" class="text-charcoal-black hover:text-flame-red font-medium">Home</a>
                        <a href="{{ route('about') }}" class="text-charcoal-black hover:text-flame-red font-medium">About Us</a>
                        <a href="{{ route('events.index') }}" class="text-charcoal-black hover:text-flame-red font-medium">Events</a>
                        <a href="{{ route('aim') }}" class="text-charcoal-black hover:text-flame-red font-medium">Aim</a>
                        <a href="{{ route('impact') }}" class="text-charcoal-black hover:text-flame-red font-medium">Impact</a>
                        <a href="{{ route('events.index') }}#contact" class="text-charcoal-black hover:text-flame-red font-medium">Contact</a>
                    </nav>
                </div>
                
                <!-- CTA Buttons and Language Selector on the right -->
                <div class="flex items-center justify-end space-x-2">
                    <!-- Language Selector -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" type="button" class="flex items-center text-charcoal-black hover:text-flame-red text-[10px] sm:text-xs font-medium rounded-full bg-gray-100 px-1.5 sm:px-2 py-0.5 sm:py-1 transition-colors duration-200">
                            <span class="font-semibold">EN</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-2.5 w-2.5 sm:h-3 sm:w-3 ml-0.5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div x-show="open" 
                             x-cloak
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100" 
                             x-transition:enter-start="opacity-0 transform scale-95" 
                             x-transition:enter-end="opacity-100 transform scale-100" 
                             x-transition:leave="transition ease-in duration-75" 
                             x-transition:leave-start="opacity-100 transform scale-100" 
                             x-transition:leave-end="opacity-0 transform scale-95"
                             class="absolute right-0 mt-1 w-20 sm:w-24 rounded shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50 overflow-hidden">
                            <div class="divide-y divide-gray-100" role="menu" aria-orientation="vertical">
                                <button class="block w-full text-left px-2 sm:px-3 py-1.5 sm:py-2 text-[10px] sm:text-xs text-charcoal-black hover:bg-gray-50 bg-white font-semibold" role="menuitem">English</button>
                                <button class="block w-full text-left px-2 sm:px-3 py-1.5 sm:py-2 text-[10px] sm:text-xs text-charcoal-black hover:bg-gray-50" role="menuitem">தமிழ்</button>
                            </div>
                        </div>
                    </div>
                    @if (is_join_form_enabled() === 'true')
                        <a href="{{ route('volunteers.volunteer') }}" class="bg-flame-red text-white font-medium px-2 sm:px-3 py-0.5 sm:py-1 rounded hover:bg-sunset-orange transition duration-300 text-[10px] sm:text-sm whitespace-nowrap">
                            Join Us
                        </a>
                    @endif
                    <button 
                        @click="$dispatch('open-volunteer-search-modal'); mobileMenuOpen = false" 
                        class="bg-charcoal-black text-white font-medium px-2 sm:px-3 py-0.5 sm:py-1 rounded hover:bg-gray-700 transition duration-300 text-[10px] sm:text-sm cursor-pointer whitespace-nowrap"
                    >
                        Find my Id
                    </button>
                    
                    <!-- Mobile menu button -->
                    <button type="button" class="md:hidden text-gray-500 hover:text-flame-red focus:outline-none" 
                            @click="mobileMenuOpen = !mobileMenuOpen">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    

                </div>
            </div>
            
            <!-- Mobile Navigation Menu -->
            <div class="md:hidden fixed inset-x-0 top-14 sm:top-16 z-40" x-show="mobileMenuOpen" 
                 x-transition:enter="transition ease-out duration-200" 
                 x-transition:enter-start="opacity-0 transform -translate-y-10" 
                 x-transition:enter-end="opacity-100 transform translate-y-0" 
                 x-transition:leave="transition ease-in duration-150" 
                 x-transition:leave-start="opacity-100 transform translate-y-0" 
                 x-transition:leave-end="opacity-0 transform -translate-y-10">
                <div class="bg-white shadow-lg border-t border-gray-100 py-2 max-h-[calc(100vh-3.5rem)] sm:max-h-[calc(100vh-4rem)] overflow-y-auto">
                    <nav class="container mx-auto px-4 flex flex-col space-y-1">
                        <a href="/" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">Home</a>
                        <a href="{{ route('about') }}" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">About Us</a>
                        <a href="{{ route('events.index') }}" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">Events</a>
                        <a href="{{ route('aim') }}" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">Aim</a>
                        <a href="{{ route('impact') }}" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">Impact</a>
                        <a href="{{ route('events.index') }}#contact" class="py-1.5 sm:py-2 px-3 sm:px-4 text-gray-800 hover:bg-gray-50 hover:text-flame-red rounded-md font-medium transition-all duration-200 text-sm sm:text-base">Contact</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    
    <main class="min-h-screen">
        @yield('content')
    </main>
    <footer class="bg-charcoal-black text-ivory-white py-3 mt-4">
        <div class="container mx-auto px-2">
            <div class="flex flex-col md:flex-row justify-between mb-2">
                <div class="mb-2 md:mb-0 md:w-1/4">
                    <h3 class="text-xs font-bold text-golden-sunrise mb-1">Sirakukal</h3>
                    <p class="text-gray-400 text-xs leading-tight">Empowering communities through volunteer initiatives and sustainable development projects.</p>
                </div>
                <div class="flex flex-row gap-4 md:gap-6 md:w-3/4 md:justify-end">
                    <div>
                        <h4 class="text-xs font-semibold text-golden-sunrise mb-1">Quick Links</h4>
                        <ul class="space-y-0 text-xs">
                            <li><a href="/" class="text-gray-400 hover:text-sunset-orange">Home</a></li>
                            <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-sunset-orange">About Us</a></li>
                            <li><a href="{{ route('events.index') }}" class="text-gray-400 hover:text-sunset-orange">Events</a></li>
                            <li><a href="#donate" class="text-gray-400 hover:text-sunset-orange">Donate</a></li>
                        </ul>
                    </div>
                    <div>

                        <h4 class="text-lg font-semibold text-golden-sunrise mb-3">Get Involved</h4>
                        <ul class="space-y-2">
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="pt-2 border-t border-gray-800 flex flex-col md:flex-row justify-between items-center text-xs">
                <p class="text-gray-400 text-xs">&copy; {{ date('Y') }} Sirakukal. All rights reserved.</p>
                <div class="flex space-x-2 mt-1 md:mt-0">
                    <a href="https://www.facebook.com/sirakukal.info/" target="_blank" class="text-gray-400 hover:text-sunset-orange">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/sirakukal_amayam?igsh=NnNtdGN0OW5xYjY5" target="_blank" class="text-gray-400 hover:text-sunset-orange">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://www.linkedin.com/company/sirakukal-amayam/" target="_blank" class="text-gray-400 hover:text-sunset-orange">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Include the volunteer search modal -->    
    @include('modals.volunteer-search-modal')

    <!-- Include the scroll buttons for quick navigation -->
    @include('components.ui.scroll-button')
    
    <!-- Include the WhatsApp button for quick contact -->
    @include('components.ui.whatsapp-button', ['phoneNumber' => '919876543210'])
    
    <!-- Stack for component scripts -->
    @stack('scripts')
</body>
</html>
