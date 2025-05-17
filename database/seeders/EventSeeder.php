<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'name' => 'Coastal Cleanup Day',
                'date' => '2025-06-01',
                'time' => '09:00:00',
                'venue' => 'Galle Face Green',
                'description' => 'Join us in cleaning up the coastal area to protect marine life.',
                'image_url' => 'https://via.placeholder.com/640x480?text=Cleanup+Event',
            ],
            [
                'name' => 'Health Camp',
                'date' => '2025-07-15',
                'time' => '10:00:00',
                'venue' => 'Batticaloa General Hospital',
                'description' => 'A free medical camp to assist rural communities.',
                'image_url' => 'https://via.placeholder.com/640x480?text=Health+Camp',
            ],
            // Add more as needed...
        ];

        foreach ($events as $data) {
            Event::create($data);
        }
    }
}
