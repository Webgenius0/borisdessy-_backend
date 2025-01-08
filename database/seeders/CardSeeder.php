<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;
use App\Models\Country;
use App\Models\PriceValue;
use Faker\Factory as Faker;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use Faker to generate fake data
        $faker = Faker::create();

        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => $faker->word,
                'type' => 'gift',
                'platform_name' => 'ROBLOX',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/1.png', 
            ]);

            $countryNames = ['USA', 'Canada', 'UK', 'Germany', 'France']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [3, 5, 10, 20, 50];
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => $faker->word,
                'type' => 'voucher',
                'platform_name' =>'APPLE STORE',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['Bangladesh', 'india', 'pakistan', 'nepal', 'bhutan']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [10, 20, 50, 100, 200]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => $faker->word,
                'type' => 'gift',
                'platform_name' => 'GOOGLE STORE',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['China', 'Japan', 'Korea', 'Vietnam', 'Thailand']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [5, 10, 20, 50, 100]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PLAYSTATION',
                'type' => 'gift',
                'platform_name' => 'GOOGLE STORE',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PLAYSTATION',
                'type' => 'gift',
                'platform_name' => 'FORTNITE',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PLAYSTATION',
                'type' => 'gift',
                'platform_name' => 'PC',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 3; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PLAYSTATION',
                'type' => 'gift',
                'platform_name' => 'MOBILE',
                'price' => $faker->randomFloat(2, 10, 100),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->company,
                'usage' => $faker->sentence,
                'description' => $faker->paragraph,
                'image' => 'uploads/card/images/2.png', 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->countries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->allPriceValues()->create([
                    'value' => $amount,
                ]);
            }
        }
    }
}
