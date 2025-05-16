<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\VolunteerStatsWidget;
use App\Filament\Widgets\EventStatsWidget;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static ?string $title = 'Admin Dashboard';

    protected static string $routePath = '/';

    protected function getHeaderWidgets(): array
    {
        return [
           
        ];
    }
}


