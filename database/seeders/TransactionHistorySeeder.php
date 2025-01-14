<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \App\Models\TransactionHistory::create([
                'user_id' => $faker->numberBetween(2, 19),
                'transection_number' => $faker->unique()->numberBetween(1000000000, 9999999999),
                'transaction_type' => $faker->randomElement(['DEPOSIT', 'WITHDRAW']),
                'card_type' => $faker->randomElement(['VISA', 'MASTERCARD', 'DISCOVER', 'AMEX']),
                'amount' => $faker->numberBetween(100, 1000),
            ]);
        }
    }
}
