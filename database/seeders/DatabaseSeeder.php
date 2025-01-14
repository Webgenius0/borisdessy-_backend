<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SocialMediaSeeder::class);
        $this->call(SystemSettingSeeder::class);
        $this->call(DynamicPageSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AllPriceValueSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(CardSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(WalletSeeder::class);
        $this->call(TransactionHistorySeeder::class);
        $this->call(OrderSeeder::class);
        $this->call(OrderCardSeeder::class);
        
    }
}
