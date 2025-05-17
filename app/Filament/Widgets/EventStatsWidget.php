<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EventStatsWidget extends BaseWidget
{
    protected int|string|array $columnSpan = [
        'default' => 6,
        'md' => 3,
        'xl' => 6,
    ];

    protected function getCards(): array
    {
        return [
            Card::make('Total Events', Event::count()),
            Card::make('Upcoming Events', Event::where('date', '>=', now())->count()),
        ];
    }
}
