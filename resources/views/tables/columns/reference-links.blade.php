@php
    $links = is_string($getState()) ? json_decode($getState(), true) : $getState();
@endphp

@if (is_array($links))
    <ul class="space-y-1">
        @foreach ($links as $link)
            <li>
                <a 
                    href="{{ Storage::disk('public')->url($link) }}" 
                    target="_blank" 
                    class="text-primary-600 hover:underline"
                >
                    {{ basename($link) }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <span class="text-gray-500 italic">No files</span>
@endif
