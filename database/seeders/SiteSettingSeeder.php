<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::insert([
            [
                'key' => 'join_form_enabled',
                'value' => 'true',
                'created_at' => now()->subDays(3),
                'updated_at' => now()->subDays(3),
            ],
            [
                'key' => 'google_form_url',
                'value' => 'https://forms.gle/exampleForm123',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'key' => 'whatsapp_number',
                'value' => '+94771234567',
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
            [
                'key' => 'email',
                'value' => 'info@sirakukal.live',
                'created_at' => now()->subHours(12),
                'updated_at' => now()->subHours(12),
            ],
        ]);
    }
}
