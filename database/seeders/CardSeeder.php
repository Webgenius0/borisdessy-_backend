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

        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'AMAZON',
                'type' => 'gift',
                'platform_name' => 'STEAM',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'GOOGLE STORE',
                'type' => 'voucher',
                'platform_name' =>'GOOGLE STORE',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'APPLE STORE',
                'type' => 'gift',
                'platform_name' => 'APPLE STORE',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'FORTNITE',
                'type' => 'gift',
                'platform_name' => 'FORTNITE',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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

        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'XBOX',
                'type' => 'voucher',
                'platform_name' => 'XBOX',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'ROBLOX',
                'type' => 'voucher',
                'platform_name' => 'ROBLOX',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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

        
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'MINECRAFT',
                'type' => 'gift',
                'platform_name' => 'MINECRAFT',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PC GAME',
                'type' => 'gift',
                'platform_name' => 'PC',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'MOBILE LEGENDS',
                'type' => 'gift',
                'platform_name' => 'MOBILE',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
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
