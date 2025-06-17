<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\VolunteerStatsWidget;
use App\Filament\Widgets\EventStatsWidget;
use App\Filament\Widgets\RecentVolunteerActivity;
use App\Filament\Widgets\UpcomingEvents;
use App\Filament\Widgets\SignupsOverTime;

class Dashboard extends BaseDashboard
{
    public function getWidgets(): array
    {
        return [
            VolunteerStatsWidget::class,
            EventStatsWidget::class,
            RecentVolunteerActivity::class,
            UpcomingEvents::class,
            SignupsOverTime::class,
        ];
    }

    public function getColumns(): int
    {
        return 12;
    }



}
