<?php

namespace App\Filament\Widgets;

use App\Models\Volunteer;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class VolunteerStatsWidget extends BaseWidget
{
    protected int|string|array $columnSpan = [
        'default' => 6,
        'md' => 3,
        'xl' => 6,
    ];

    protected function getCards(): array
    {
        return [
            Card::make('Total Volunteers', Volunteer::count()),
            Card::make('Joined Volunteers', Volunteer::where('joined_date', true)->count()),
        ];
    }
}
