<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Michael Sørensen',
                'email' => 'michael@soerensens.dk',
                'role_id' => 3,
            ],
            [
                'name' => 'Moderator',
                'email' => 'mod@mod.dk',
                'role_id' => 2,
            ],
            [
                'name' => 'User',
                'email' => 'user@user.dk',
                'role_id' => 1,
            ],
        ];

        foreach ($users as $userData) {
            User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'slug' => Str::slug($userData['name']),
                    'password' => Hash::make('Skoven05'), // Skift til rigtig adgangskode ved behov
                    'role_id' => $userData['role_id'],
                ]
            );
        }
    }
}
