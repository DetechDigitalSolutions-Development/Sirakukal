<?php

namespace App\Providers\Filament;

use App\Http\Middleware\FilamentAuthenticate; // Your custom middleware
//use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    protected static string $routePath = '/';

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Sirakukal')
            ->brandLogo(asset('images/Logo (1).PNG'), true) // Second parameter makes it lazy-loaded
            ->brandLogoHeight('3.5rem') // Adjust logo size
            ->favicon(asset('images/favicon.ico')) // Add favicon
            ->colors([
                'primary' => Color::hex('#D72638'), // Using Color class for better theming
                'gray' => Color::Slate, // Better default gray scale
            ])
            ->font('Inter') // Modern font
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('15rem') // Wider sidebar
            ->navigationGroups([
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Volunteer Management')
                    ->icon('heroicon-o-users'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Event Management')
                    ->icon('heroicon-o-calendar'),
                \Filament\Navigation\NavigationGroup::make()
                    ->label('Site Setting')
                    ->icon('heroicon-o-cog'),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                //Authenticate::class,
                FilamentAuthenticate::class, // Using your custom middleware
            ])
            ->viteTheme('resources/css/filament/admin/theme.css'); // For custom CSS
    }
}