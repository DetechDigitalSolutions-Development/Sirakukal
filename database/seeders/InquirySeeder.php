<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inquiry;

class InquirySeeder extends Seeder
{
    public function run(): void
    {
        Inquiry::insert([
            [
                'full_name' => 'Kavitha Raj',
                'email' => 'kavitha@example.com',
                'help_message' => 'I would like to know more about upcoming volunteering opportunities.',
                'read' => false,
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'full_name' => 'Suren Fernando',
                'email' => 'suren@example.com',
                'help_message' => 'Can I volunteer part-time while studying?',
                'read' => false,
                'created_at' => now()->subDay(),
                'updated_at' => now()->subDay(),
            ],
            [
                'full_name' => 'Ayesha Nimal',
                'email' => 'ayesha@example.com',
                'help_message' => 'Do you provide certificates for volunteering?',
                'read' => true,
                'created_at' => now()->subHours(10),
                'updated_at' => now()->subHours(10),
            ],
        ]);
    }
}

