@php
    // Get registration status from settings (default to enabled)
    $isRegistrationEnabled = config('volunteer.registration_enabled', true);
    
    // Default values for button
    $defaultText = 'Become a Volunteer';
    $defaultLink = route('volunteers.volunteer');
    $defaultClasses = 'inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-primary hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition duration-300';
    
    // Use provided values or defaults
    $text = $text ?? $defaultText;
    $link = $link ?? $defaultLink;
    $class = $class ?? $defaultClasses;
@endphp

@if($isRegistrationEnabled)
    <a href="{{ $link }}" class="{{ $class }}">
        {{ $text }}
        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </a>
@else
    <button disabled class="cursor-not-allowed opacity-60 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gray-400 focus:outline-none transition duration-300">
        Registration Closed
    </button>
@endif