<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Volunteer;
use Faker\Factory as Faker;

class VolunteerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $skillsPool = ['Teaching', 'First Aid', 'Cooking', 'Fundraising', 'Public Speaking'];
        $interestsPool = ['Education', 'Health', 'Environment', 'Community Development'];

        for ($i = 1; $i <= 10; $i++) {
            Volunteer::create([
                'volunteer_id' => 'VOL' . str_pad($i, 3, '0', STR_PAD_LEFT), // e.g. VOL001
                'name' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'address' => $faker->address(),
                'skills' => array_slice($skillsPool, 0, rand(1, 3)),
                'interested_areas' => array_slice($interestsPool, 0, rand(1, 2)),
            ]);
        }
    }
}
