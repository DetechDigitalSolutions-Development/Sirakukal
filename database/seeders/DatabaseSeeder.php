<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
        VolunteerSeeder::class,
        EventSeeder::class,
        InquirySeeder::class,
        SiteSettingSeeder::class,
        UserSeeder::class,
        
    ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
