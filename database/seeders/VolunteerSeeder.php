<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Volunteer;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class VolunteerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $statuses = ['School Leaver', 'Undergraduate', 'Graduate', 'Professional', 'Entrepreneur'];
        $referredSources = ['Friends', 'Social Media', 'Newspapers', 'Others'];
        $districts = ['Colombo', 'Jaffna', 'Kandy', 'Galle', 'Batticaloa'];

        for ($i = 1; $i <= 10; $i++) {
            Volunteer::create([
                'volunteer_id' => 'VOL' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'full_name' => $faker->name(),
                'initials_name' => strtoupper(substr($faker->firstName, 0, 1)) . '. ' . $faker->lastName,
                'district' => $faker->randomElement($districts),
                'address' => $faker->address(),
                'nic_number' => strtoupper(Str::random(9)),
                'date_of_birth' => $faker->date('Y-m-d', '2005-01-01'),
                'joined_date' => now(),
                'status' => $faker->randomElement($statuses),
                'institution' => $faker->company(),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $faker->numerify('07########'),
                'whatsapp' => $faker->numerify('07########'),
                'referred_by' => $faker->randomElement($referredSources),
                'reason_to_join' => $faker->sentence(10),
            ]);
        }
    }
}
