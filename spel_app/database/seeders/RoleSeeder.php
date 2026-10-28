<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'name' => 'Categorie admin',
        ]);

        Role::create([
            'name' => 'Product admin',
        ]);

        Role::create([
            'name' => 'Price admin',
        ]);

        Role::create([
            'name' => 'Order admin',
        ]);

        Role::create([
            'name' => 'Review admin',
        ]);

        Role::create([
            'name' => 'User admin',
        ]);

        Role::create([
            'name' => 'Klant',
        ]);
    }
}
