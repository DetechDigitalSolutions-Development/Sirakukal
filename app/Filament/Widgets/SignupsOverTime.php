<?php

namespace App\Filament\Widgets;

use App\Models\Volunteer;
use Illuminate\Support\Facades\DB;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class SignupsOverTime extends ChartWidget
{
    protected static ?string $heading = 'Volunteer Signups Over Time';

    protected int|string|array $columnSpan = 'full';

    protected function getType(): string
    {
        return 'bar'; // Use 'line' if you want a line chart instead
    }

    protected function getData(): array
    {
        // Get signups grouped by day for the last 7 days
        $data = Volunteer::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->whereDate('created_at', '>=', now()->subDays(6))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'labels' => $data->pluck('date')->map(fn($date) => Carbon::parse($date)->format('M d'))->toArray(),
            'datasets' => [
                [
                    'label' => 'Signups',
                    'data' => $data->pluck('count'),
                    'backgroundColor' => '#D72638', // Fill color inside bars
                    'borderColor' => '#D72638',     // Outline of bars
                    'borderWidth' => 2,
                    'hoverBackgroundColor' => '#a31b2c', // Optional: hover effect
                ],
            ],
        ];
    }
}
