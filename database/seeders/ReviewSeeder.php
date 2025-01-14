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

        for ($i = 0; $i < 700; $i++) {
            \App\Models\Review::create([
                'user_id' => $faker->numberBetween(2, 22),
                'card_id' => $faker->numberBetween(1, 99),
                'rating' => $faker->randomFloat(1, 1, 5),
                'comment' => $faker->paragraph(5),
            ]);
        }
    }
}
