<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 600; $i++) {
            \App\Models\Order::create([
                'user_id' => $faker->numberBetween(2, 19),
                'total_price' => $faker->numberBetween(100, 1000),
                'status' => $faker->randomElement(['pending', 'cancelled', 'completed']),
                'note' => $faker->paragraph(3),
            ]);
        }
    }
}
