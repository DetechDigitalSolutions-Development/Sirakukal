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
                'date' => '2025-06-08',
                'time' => '08:00:00',
                'venue' => 'Mount Lavinia Beach',
                'description' => 'Annual beach cleanup to protect Sri Lanka\'s beautiful coastline and marine ecosystem.',
                'image_url' => 'events/coastal-cleanup.jpg',
                'type' => 'Physical',
                'category' => 'Event',
                'link' => 'https://example.com/coastal-cleanup',
                'reference_links' => 'event-docs/coastal-guidelines.pdf' // Array format for single file
            ],
            [
                'name' => 'Kandy Esala Perahera',
                'date' => '2025-08-15',
                'time' => '19:30:00',
                'venue' => 'Temple of the Sacred Tooth Relic, Kandy',
                'description' => 'The grand cultural pageant featuring traditional dancers, drummers, and decorated elephants.',
                'image_url' => 'events/perahera.jpg',
                'type' => 'Physical',
                'category' => 'Event',
                'link' => 'https://example.com/esala-perahera',
                'reference_links' => 'event-docs/perahera-schedule.pdf'
                  
                
            ],
            [
                'name' => 'Online Tech Workshop',
                'date' => '2025-09-20',
                'time' => '14:00:00',
                'venue' => 'Virtual',
                'description' => 'Learn about the latest web development technologies in this interactive online workshop.',
                'image_url' => 'events/tech-workshop.jpg',
                'type' => 'Online',
                'category' => 'Class',
                'link' => 'https://example.com/tech-workshop',
                'reference_links' => 'event-docs/workshop-materials.pdf'
            ],
            // Add more events as needed...
        ];

        foreach ($events as $eventData) {
            Event::create($eventData);
        }
    }
}