<x-filament::widget>
    <x-filament::card>
        <x-slot name="header">Recent Volunteer Signups</x-slot>

        <ul class="space-y-2">
            @foreach ($this->getRecords() as $volunteer)
                <li class="text-sm">
                    <strong>{{ $volunteer->full_name }}</strong><br>
                    {{ $volunteer->email }}<br>
                    <span class="text-gray-500">{{ $volunteer->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </x-filament::card>
</x-filament::widget>
