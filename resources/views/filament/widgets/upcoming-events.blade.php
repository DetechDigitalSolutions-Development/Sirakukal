<x-filament::widget>
    <x-filament::card>
        <x-slot name="header">Upcoming Events</x-slot>

        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2">Event</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($this->getEvents() as $event)
                    <tr class="border-b">
                        <td class="px-4 py-2 font-medium text-gray-800">{{ $event->name }}</td>
                        <td class="px-4 py-2 text-gray-700">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                        <td class="px-4 py-2">
                            <span @class([
                                'px-2 py-1 rounded text-xs font-semibold',
                                'bg-blue-100 text-blue-700' => $event->status === 'Upcoming',
                                'bg-green-100 text-green-700' => $event->status === 'Confirmed',
                            ])>
                                {{ $event->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="px-4 py-2 text-gray-500 italic">No upcoming events.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-filament::card>
</x-filament::widget>
