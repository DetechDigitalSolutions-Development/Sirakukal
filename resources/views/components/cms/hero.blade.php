<section class="relative bg-gradient-to-r from-charcoal-black to-charcoal-black/90 py-24 overflow-hidden">
    <div class="absolute inset-0 z-0 opacity-50">
        <div class="absolute inset-0 bg-pattern bg-repeat opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-flame-red to-sunset-orange opacity-30"></div>
        <!-- Background pattern with gradient overlay -->
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:w-1/2 text-white mb-10 lg:mb-0">
                <div class="bg-charcoal-black/40 p-6 rounded-lg backdrop-blur-sm border border-golden-sunrise/50 shadow-lg">
                    <h1 class="text-4xl md:text-5xl font-bold mb-6 uppercase text-golden-sunrise">{{ $title ?? 'Empowering Communities Through Volunteerism' }}</h1>
                    <p class="text-xl mb-8 max-w-xl text-golden-sunrise font-medium">{{ $description ?? 'Join us in our mission to create a sustainable impact in communities through organized volunteer initiatives.' }}</p>
                    <div class="flex flex-wrap gap-4">
                        @include('components.ui.buttons.join', [
                            'text' => __('message.buttons.become_a_volunteer'),
                            // 'text' => 'Become a Volunteer',
                            'class' => 'btn-primary'
                        ])
                        <a href="#about" class="btn-secondary border-2 border-golden-sunrise text-golden-sunrise hover:bg-charcoal-black/80 transition duration-300">
                            {{ __('message.buttons.learn_more') }} 
                        </a>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/2 flex justify-center">
                <div class="relative rounded-lg overflow-hidden shadow-2xl bg-white p-2 w-full max-w-md">
                    @if(isset($video_url))
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="{{ $video_url }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full object-cover"></iframe>
                        </div>
                    @else
                        <img src="{{ $image_url ?? asset('images/hero-image.jpg') }}" alt="Sirakukal Volunteers" class="w-full rounded object-cover aspect-video">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
