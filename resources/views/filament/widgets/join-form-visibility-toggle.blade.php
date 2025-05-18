<x-filament::widget>
    <x-filament::card>
        <x-slot name="header">
            Join Form Visibility
        </x-slot>

        <div class="space-y-4">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Toggle to control whether the volunteer registration form is available to the public.
            </p>

            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-800 dark:text-white">
                    Public Signups
                </span>

                {{-- Sliding toggle --}}
                <button
                    wire:click="toggle"
                    type="button"
                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500
                        {{ $enabled ? 'bg-green-600' : 'bg-red-500' }}"
                    role="switch"
                    aria-checked="{{ $enabled ? 'true' : 'false' }}"
                >
                    <span
                        aria-hidden="true"
                        class="inline-block h-4 w-4 transform rounded-full bg-white transition duration-200
                            {{ $enabled ? 'translate-x-6' : 'translate-x-1' }}"
                    ></span>
                </button>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
