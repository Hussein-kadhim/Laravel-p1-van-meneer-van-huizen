<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Gebruiker',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);

        User::create([
            'name' => 'Jan Jansen',
            'email' => 'jan@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 7,
        ]);
    }
}
