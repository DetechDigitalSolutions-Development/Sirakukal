{{-- You can pass an array of focus areas or use the default ones --}}
@php
    $focusAreas = $focusAreas ?? [
        [
            'icon' => '<svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>',
            'title' => 'Health & Wellness',
            'description' => 'Promoting healthier communities through awareness programs and wellness initiatives.',
            'link' => '#'
        ]
    ];
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($focusAreas as $area)
        <div class="bg-ivory-white p-6 rounded-lg shadow-md transition-all duration-300 hover:shadow-xl hover:-translate-y-1 border-t-4 border-golden-sunrise">
            <div class="text-sunset-orange mb-4">
                {!! $area['icon'] !!}
            </div>
            <h3 class="text-xl font-bold mb-3 text-flame-red">{{ $area['title'] }}</h3>
            <p class="text-charcoal-black mb-4">{{ $area['description'] }}</p>
            <a href="{{ $area['link'] }}" class="inline-flex items-center text-sunset-orange hover:text-flame-red font-medium">
                Learn more
                <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    @endforeach
</div>