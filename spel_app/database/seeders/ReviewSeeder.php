<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        Review::create([
            'comment' => 'Geweldige console, super snel!',
            'user_id' => 1,
            'product_id' => 1,
        ]);

        Review::create([
            'comment' => 'Fijne controller met goede haptische feedback.',
            'user_id' => 2,
            'product_id' => 2,
        ]);
    }
}
