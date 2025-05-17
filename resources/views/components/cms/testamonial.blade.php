<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($testimonials ?? [] as $testimonial)
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="text-flame-red mb-4 text-2xl">
                    &ldquo;
                </div>
                <p class="text-gray-600 italic mb-4">
                    {{-- Use description from model if available, fall back to content for backward compatibility --}}
                    {{ $testimonial['description'] ?? $testimonial['content'] ?? '' }}
                </p>
                <div class="flex items-center">
                    {{-- Use image_url from model if available, fall back to image for backward compatibility --}}
                    <img src="{{ $testimonial['image_url'] ?? $testimonial['image'] ?? asset('images/default-avatar.jpg') }}" 
                         alt="{{ $testimonial['author'] ?? $testimonial['name'] ?? 'Testimonial Author' }}" 
                         class="w-10 h-10 rounded-full mr-3">
                    <div>
                        {{-- Use author from model if available, fall back to name for backward compatibility --}}
                        <p class="font-bold">{{ $testimonial['author'] ?? $testimonial['name'] ?? '' }}</p>
                        {{-- author_title is a custom field we added to complement the model fields --}}
                        <p class="text-gray-500 text-sm">{{ $testimonial['author_title'] ?? $testimonial['title'] ?? '' }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>