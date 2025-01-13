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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/1.png',
                'stock' => 100, 
            ]);

            $countryNames = ['USA', 'Canada', 'UK', 'Germany', 'France']; 
            foreach ($countryNames as $name) {
                $card->cardCountries()->create([
                    'name' => $name,
                ]);
            }

            $availableAmounts = [3, 5, 10, 20, 50];
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Bangladesh', 'india', 'pakistan', 'nepal', 'bhutan']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [10, 20, 50, 100, 200]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['China', 'Japan', 'Korea', 'Vietnam', 'Thailand']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [5, 10, 20, 50, 100]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
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
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
                    'value' => $amount,
                ]);
            }
        }
        for ($i = 1; $i <= 10; $i++) {
            // Create the card entry
            $card = Card::create([
                'card_name' => 'PLAYSTATION',
                'type' => 'gift',
                'platform_name' => 'PLAYSTATION',
                'price' => $faker->randomFloat(3, 120, 1000),
                'discount' => $faker->randomFloat(2, 0, 50),
                'seller_name' => $faker->name,
                'usage' => 'GLOBAL',
                'description' => "<p><strong>Overview</strong></p><p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own world from scratch. The project created by Roblox Corp. gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of tools, weapons, and other in-game items, and share them with the rest of the Roblox community.</p><p><strong>Key Features</strong></p><ul><li>Roblox gift cards has various amounts, allowing players to choose the card that best fits their budget.</li><li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, mobile devices etc.</li><li>Hundreds of fantastic world created by the Roblox developers and the whole community</li><li>Browse the in-game shop and buy awesome items using the game's currency Robux!</li><li>Roblox gift cards are available in various regions, it has global usage.</li></ul><p><strong>Why Choose A Roblox Gift Card</strong></p><ul><li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone</li><li>No need for a credit card, a secure way to add credit without sharing payment details.</li><li>Some Roblox gift cards come with bonus virtual items or special content.</li><li>Roblox gift cards can be purchased in stores or online and used worldwide.</li></ul><p><strong>How to Use A Roblox Gift Card</strong></p><ul><li>Log in to your account on www.roblox.com</li><li>Head on to Gift Card Redemption Page</li><li>Enter the activation code from the Gift Card</li><li>Click 'Redeem' and that's it!</li></ul>",
                'image' => 'uploads/card/images/2.png',
                'stock' => 100, 
            ]);

            $countryNames = ['Dubai', 'Qatar', 'Saudi Arabia', 'Kuwait', 'Oman']; 
            foreach ($countryNames as $countryName) {
                $card->cardCountries()->create([
                    'name' => $countryName,
                ]);
            }

            $availableAmounts = [20, 50, 100, 200, 500]; 
            foreach ($availableAmounts as $amount) {
                $card->cardAvaialeAmounts()->create([
                    'value' => $amount,
                ]);
            }
        }
    }
}
