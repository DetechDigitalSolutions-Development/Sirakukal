<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($testimonials ?? [] as $testimonial)
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <div class="text-flame-red mb-4 text-2xl">
                    &ldquo;
                </div>
                <p class="text-gray-600 italic mb-4">
                    {{ $testimonial['content'] }}
                </p>
                <div class="flex items-center">
                    <img src="{{ $testimonial['image'] ?? asset('images/default-avatar.jpg') }}" alt="{{ $testimonial['name'] }}" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="font-bold">{{ $testimonial['name'] }}</p>
                        <p class="text-gray-500 text-sm">{{ $testimonial['title'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>