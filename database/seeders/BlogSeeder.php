<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Blog::create([
                'user_id' => 1,
                'title' => 'Sample Blog Post ' . $i,
                'content' => "<h3>Overview</h3>
                <p>Roblox Gift Cards are a convenient way for players to enhance their experience on the popular gaming platform Roblox. These gift cards can be used to purchase<br>Robux (the in-game currency) or premium memberships like Roblox Premium. Roblox is an online F2P game developed by Roblox Corporation, in which players can<br>create their own, unique character and explore hundreds of virtual worlds, created by developers, as well as the game's community - everyone can create their own<br>world from scratch. The project created by Roblox Corp, gives players total freedom in terms of gameplay. During the gameplay, players can create a variety of<br>tools, weapons, and other in-game items, and share them with the rest of the Roblox community,</p>
                <h3>Key Features</h3>
                <ul>
                    <li>Roblox gift cards have various amounts, allowing players to choose the card that best fits their budget.</li>
                    <li>Roblox gift cards can be redeemed on multiple platforms, including PC, Mac, and mobile devices.</li>
                    <li>Hundreds of fantastic worlds created by the Roblox developers and the whole community.</li>
                    <li>Browse the in-game shop and buy awesome items using the game's currency, Robux!</li>
                    <li>Roblox gift cards are available in various regions and have global usage.</li>
                </ul>

                <h3>Why Choose A Roblox Gift Card</h3>
                <ul>
                    <li>Roblox is suitable for players of any age, and the moderators are always present to make the game's world safe for everyone.</li>
                    <li>No need for a credit card, a secure way to add credit without sharing payment details.</li>
                    <li>Some Roblox gift cards come with bonus virtual items or special content.</li>
                    <li>Roblox gift cards can be purchased in stores or online and used worldwide.</li>
                </ul>
                <h3>How to Use A Roblox Gift Card</h3>
                <ul>
                    <li>Log in to your account on </li>
                    <li>Head on to the Gift Card Redemption Page.</li>
                    <li>Enter the activation code from the Gift Card.</li>
                    <li>Click 'Redeem' and that's it!</li>
                </ul>
                ",
                'image' => 'uploads/blog/images/1.jpeg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
