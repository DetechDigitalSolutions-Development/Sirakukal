<?php
namespace App\Filament\Widgets;

use App\Models\SiteSetting;
use Filament\Widgets\Widget;

class JoinFormVisibilityToggle extends Widget
{
    protected static string $view = 'filament.widgets.join-form-visibility-toggle';

    public bool $enabled;

    public function mount(): void
    {
        $this->enabled = filter_var(SiteSetting::get('join_form_enabled', false), FILTER_VALIDATE_BOOLEAN);
    }

    public function toggle(): void
    {
        $this->enabled = !$this->enabled;
        SiteSetting::set('join_form_enabled', $this->enabled ? 'true' : 'false');
        $this->dispatch('banner', title: 'Join form ' . ($this->enabled ? 'enabled' : 'disabled'));
    }
}
