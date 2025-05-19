<?php

namespace App\Filament\Resources\SiteSettingResource\Pages;

use App\Filament\Resources\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use Filament\Notifications\Notification;
use Filament\Forms\Components\TextInput;
use libphonenumber\PhoneNumberUtil;

class ListSiteSettings extends Page
{
    protected static string $resource = SiteSettingResource::class;

    protected static string $view = 'filament.resources.site-setting-resource.pages.list-site-settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'join_form_enabled' => filter_var(SiteSetting::where('key', 'join_form_enabled')->value('value'), FILTER_VALIDATE_BOOLEAN),
            'whatsapp_number' => SiteSetting::where('key', 'whatsapp_number')->value('value'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make('join_form_enabled')
                    ->label('Enable Volunteer Signup Form')
                    ->helperText('Toggles visibility of the volunteer registration form on the public website.')
                    ->afterStateUpdated(function ($state) {
                        SiteSetting::updateOrCreate(['key' => 'join_form_enabled'], ['value' => $state ? 'true' : 'false']);
                    }),
                TextInput::make('whatsapp_number')
                    ->label('WhatsApp Number')
                    ->helperText('Number used for WhatsApp contact on the site (with country code).')
                    ->afterStateUpdated(function ($state) {
                        SiteSetting::updateOrCreate(['key' => 'whatsapp_number'], ['value' => $state]);
                    }),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $this->form->getState(); // triggers afterStateUpdated
        Notification::make()
            ->title('Setting updated.')
            ->success()
            ->send();
    }
}
