<!-- resources/views/filament/widgets/toggle-signup-form.blade.php -->
<x-filament::widget>
    <x-filament::card>
        <x-slot name="header">
            Join Form Visibility
        </x-slot>

        <div class="space-y-4">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Toggle to control volunteer registration form availability
            </p>

            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-800 dark:text-white">
                    Public Signups
                </span>

                <button
                    wire:click="toggle"
                    type="button"
                    wire:loading.attr="disabled"
                    role="switch"
                    aria-checked="{{ $enabled ? 'true' : 'false' }}"
                    @class([
                        'relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 ease-in-out',
                        'bg-primary-600' => $enabled,
                        'bg-gray-200 dark:bg-gray-700' => !$enabled,
                    ])
                >
                    <span
                        @class([
                            'pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow-lg transition duration-200 ease-in-out',
                            'translate-x-6' => $enabled,
                            'translate-x-1' => !$enabled,
                        ])
                    ></span>
                </button>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>