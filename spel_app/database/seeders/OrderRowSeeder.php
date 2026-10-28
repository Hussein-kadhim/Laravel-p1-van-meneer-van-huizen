<?php

namespace Database\Seeders;

use App\Models\Orderrow;
use Illuminate\Database\Seeder;

class OrderRowSeeder extends Seeder
{
    public function run(): void
    {
        Orderrow::create([
            'order_id' => 1,
            'product_id' => 1,
        ]);

        Orderrow::create([
            'order_id' => 1,
            'product_id' => 2,
        ]);
    }
}
