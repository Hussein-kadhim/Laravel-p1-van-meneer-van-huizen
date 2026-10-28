<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Order::create([
            'orderdate' => now(),
            'user_id' => 1,
            'status' => 1,
        ]);
    }
}
