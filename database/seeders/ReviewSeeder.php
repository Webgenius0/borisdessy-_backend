<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\Review::create([
                'user_id' => $faker->numberBetween(1, 18),
                'card_id' => $faker->numberBetween(1, 21),
                'rating' => $faker->randomFloat(1, 1, 5),
                'comment' => $faker->sentence,
            ]);
        }
    }
}
