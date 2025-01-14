<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 600; $i++) {
            \App\Models\PurchaseHistory::create([
                'user_id' => $faker->numberBetween(2, 19),
                'card_id' => $faker->numberBetween(1, 99),
                'card_name' => $faker->name,
                'devlivery_date' => $faker->date,
                'quantity' => $faker->numberBetween(1, 5),
                'total_price' => $faker->numberBetween(100, 1000),
                'status' => $faker->randomElement(['pending', 'cancelled', 'completed']),
            ]);
        }
    }
}
