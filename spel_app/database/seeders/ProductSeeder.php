<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'PlayStation 5',
            'description' => 'Sony PlayStation 5 Console',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'DualSense Draadloze Controller',
            'description' => 'Draadloze controller voor PlayStation 5',
            'category_id' => 2,
        ]);
    }
}
