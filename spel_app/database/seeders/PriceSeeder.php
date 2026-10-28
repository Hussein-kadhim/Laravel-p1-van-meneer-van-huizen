<?php

namespace Database\Seeders;

use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        Price::create([
            'price' => 499.99,
            'effdate' => now(),
            'product_id' => 1,
        ]);

        Price::create([
            'price' => 69.99,
            'effdate' => now(),
            'product_id' => 2,
        ]);
    }
}
