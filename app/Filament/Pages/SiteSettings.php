<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\JoinFormVisibilityToggle;
use Filament\Pages\Page;

class SiteSettings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Site Settings';
    protected static ?string $title = 'Site Settings';

    protected static string $view = 'filament.pages.site-settings';

    
}
