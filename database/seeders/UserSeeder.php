<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create roles if they don't exist
        $roles = ['Super Admin', 'Admin', 'Editor', 'Viewer'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role]);
        }

        // Create users with different roles
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password'),
                'role' => 'Super Admin'
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'Admin'
            ],
            [
                'name' => 'Content Editor',
                'email' => 'editor@example.com',
                'password' => Hash::make('password'),
                'role' => 'Editor'
            ],
            [
                'name' => 'Regular Viewer',
                'email' => 'viewer@example.com',
                'password' => Hash::make('password'),
                'role' => 'Viewer'
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
                'role' => null // No specific role
            ]
        ];

        foreach ($users as $userData) {
            $user = User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'email' => $userData['email'],
                    'password' => $userData['password'],
                ]
            );

            if ($userData['role']) {
                $user->assignRole($userData['role']);
            }
        }

        // Create 10 random users (optional)
        User::factory()->count(10)->create()->each(function ($user) {
            $user->assignRole('Viewer');
        });
    }
}