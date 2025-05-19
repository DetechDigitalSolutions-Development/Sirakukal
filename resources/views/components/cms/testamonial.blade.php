<div class="container mx-auto px-4 sm:px-6 md:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 md:gap-8">
        @foreach($testimonials ?? [] as $testimonial)
            <div class="bg-white p-4 sm:p-5 md:p-6 rounded-lg shadow-sm">
                <div class="text-flame-red mb-3 sm:mb-4 text-xl sm:text-2xl">
                    &ldquo;
                </div>
                <p class="text-gray-600 italic text-sm sm:text-base mb-3 sm:mb-4">
                    {{-- Use description from model if available, fall back to content for backward compatibility --}}
                    {{ $testimonial['description'] ?? $testimonial['content'] ?? '' }}
                </p>
                <div class="flex items-center">
                    {{-- Use image_url from model if available, fall back to image for backward compatibility --}}
                    <img src="{{ $testimonial->image_url ? asset('storage/' . $testimonial->image_url) : asset('images/default-avatar.jpg') }}"
                         alt="{{ $testimonial['author'] ?? $testimonial['name'] ?? 'Testimonial Author' }}" 
                         class="w-8 h-8 sm:w-10 sm:h-10 rounded-full mr-2 sm:mr-3">
                    <div>
                        {{-- Use author from model if available, fall back to name for backward compatibility --}}
                        <p class="font-bold text-sm sm:text-base">{{ $testimonial['author'] ?? $testimonial['name'] ?? '' }}</p>
                        {{-- author_title is a custom field we added to complement the model fields --}}
                        <p class="text-gray-500 text-xs sm:text-sm">{{ $testimonial['author_title'] ?? $testimonial['title'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>