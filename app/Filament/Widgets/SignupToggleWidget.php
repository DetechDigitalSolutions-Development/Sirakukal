<?php

namespace App\Filament\Widgets;

use App\Models\SiteSetting;
use Filament\Widgets\Widget;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;

class VolunteerToggleWidget extends Widget
{
    use InteractsWithForms;

    protected static string $view = 'filament.widgets.volunteer-toggle-widget';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'join_form_enabled' => filter_var(SiteSetting::get('join_form_enabled', false), FILTER_VALIDATE_BOOLEAN),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            Toggle::make('join_form_enabled')
                ->label('Enable Volunteer Signups')
                ->inline(false)
                ->reactive()
                ->afterStateUpdated(function ($state) {
                    SiteSetting::set('join_form_enabled', $state ? 'true' : 'false');
                    session()->flash('success', 'Volunteer signups ' . ($state ? 'enabled' : 'disabled') . '.');
                }),
        ])->statePath('data');
    }

    public static function canView(): bool
    {
        return true; // you can add role check here
    }
}

