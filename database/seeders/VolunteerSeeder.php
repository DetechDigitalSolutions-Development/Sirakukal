<?php

namespace Database\Seeders;

use App\Models\Volunteer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class VolunteerSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Use constants from Volunteer model
        $statuses = array_keys(Volunteer::STATUS);
        $educationLevels = array_keys(Volunteer::EDUCATION_LEVELS);
        $referredSources = array_keys(Volunteer::HEARD_SOURCES);
        $districts = array_keys(Volunteer::DISTRICTS);

        for ($i = 1; $i <= 50; $i++) {
            $dob = $faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d');
            $joinedDate = $faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d');
            
            Volunteer::create([
                'id' => str_pad($i, 3, '0', STR_PAD_LEFT),
                'full_name' => $faker->name(),
                'initials_name' => $this->generateInitials($faker->name),
                'district' => $faker->randomElement($districts),
                'address' => $this->generateSriLankanAddress($faker),
                'nic_number' => $this->generateNIC($dob, $faker),
                'date_of_birth' => $dob,
                'joined_date' => $joinedDate,
                'applicant_type' => $faker->randomElement($educationLevels),
                'institution' => $faker->randomElement([
                    'University of Colombo',
                    'University of Peradeniya',
                    'University of Jaffna',
                    'Open University',
                    'NSBM',
                    'SLIIT',
                    $faker->company()
                ]),
                'email' => $faker->unique()->safeEmail(),
                'phone' => $this->generateSriLankanPhoneNumber($faker),
                'whatsapp' => $this->generateSriLankanPhoneNumber($faker),
                'referred_by' => $faker->randomElement($referredSources),
                'reason_to_join' => $faker->paragraph(2),
            ]);
        }
    }

    protected function generateInitials(string $fullName): string
    {
        $names = explode(' ', $fullName);
        $initials = array_map(fn($name) => strtoupper(substr($name, 0, 1)), $names);
        return implode('.', array_slice($initials, 0, 2)) . '.';
    }

    protected function generateSriLankanPhoneNumber($faker): string
    {
        return $faker->randomElement(['071', '072', '075', '076', '077', '078']) . $faker->numerify('#######');
    }

    protected function generateNIC(string $dob, $faker): string
    {
        $year = substr($dob, 2, 2);
        $days = $faker->numberBetween(1, 366);
        $sequence = str_pad($faker->numberBetween(1, 999), 3, '0', STR_PAD_LEFT);
        $letter = $faker->randomElement(['V', 'X']);
        
        return "{$year}{$days}{$sequence}{$letter}";
    }

    protected function generateSriLankanAddress($faker): string
    {
        $street = $faker->streetAddress();
        $city = $faker->city();
        $postalCode = $faker->postcode();
        
        return "{$street}, {$city}, Sri Lanka. {$postalCode}";
    }
}