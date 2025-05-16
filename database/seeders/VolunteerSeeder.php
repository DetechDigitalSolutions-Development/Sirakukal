<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Volunteer;

class VolunteerSeeder extends Seeder
{
    public function run(): void
    {
        $volunteers = [
            [
                'name' => 'Kavitha Raj',
                'email' => 'kavitha@example.com',
                'phone' => '0771234567',
                'address' => '123 Beach Road, Colombo',
                'skills' => json_encode(['Teaching', 'First Aid']),
                'interested_areas' => json_encode(['Education', 'Health']),
            ],
            [
                'name' => 'Nimal Perera',
                'email' => 'nimal@example.com',
                'phone' => '0787654321',
                'address' => '456 Main Street, Jaffna',
                'skills' => json_encode(['Cooking', 'Fundraising']),
                'interested_areas' => json_encode(['Environment']),
            ],
            // Add more as needed...
        ];

        foreach ($volunteers as $data) {
            Volunteer::create($data);
        }
    }
}
