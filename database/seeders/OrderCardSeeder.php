<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 1000; $i++) {
            \App\Models\OrderCard::create([
                'order_id' => $faker->numberBetween(1, 600),
                'card_id' => $faker->numberBetween(1, 100),
                'quantity' => $faker->numberBetween(1, 10),
                'unit_price' => $faker->numberBetween(100, 1000),
            ]);
        }
    }
}
