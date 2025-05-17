<div class="container mx-auto px-4" id="about">
    <div class="flex flex-col lg:flex-row items-center gap-12">
        <div class="lg:w-1/2">
            <img src="{{ $image_url ?? asset('images/about-image.jpg') }}" alt="About Sirakukal" class="rounded-lg shadow-lg w-full h-auto object-cover aspect-video">
        </div>
        <div class="lg:w-1/2">
            <div class="mb-6">
                <h2 class="text-sm font-bold text-flame-red uppercase tracking-wider mb-2">{{ $subtitle ?? 'About Us' }}</h2>
                <h3 class="text-3xl font-bold mb-4 heading-dynamic">{{ $title ?? 'Who We Are' }}</h3>
                <div class="h-1 w-20 bg-flame-red rounded mb-6"></div>
            </div>
            
            <div class="prose prose-lg max-w-none mb-8">
                {!! $content ?? '<p>Sirakukal is a volunteer-driven organization dedicated to creating positive change in communities through organized initiatives, education, and sustainable development projects.</p>' !!}
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="flex items-start">
                    <div class="bg-golden-sunrise/20 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-sunset-orange" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1">Our Mission</h4>
                        <p class="text-charcoal-black">{{ $mission ?? 'To create sustainable impact through volunteer engagement.' }}</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="bg-golden-sunrise/20 p-3 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-sunset-orange" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                            <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-lg mb-1">Our Vision</h4>
                        <p class="text-charcoal-black">{{ $vision ?? 'A world where volunteerism creates thriving communities.' }}</p>
                    </div>
                </div>
            </div>
            
            <a href="{{ $button_link ?? route('about') }}" class="btn-primary inline-flex items-center">
                {{ $button_text ?? 'Learn More About Us' }}
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</div>