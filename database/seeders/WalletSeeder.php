<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 21; $i++) {
            \App\Models\Wallet::create([
                'user_id' => $faker->numberBetween(1, 21),
                'balance' => $faker->numberBetween(500, 1500),
                'token' => $faker->numberBetween(1, 5),
            ]);
        }

    }
}
