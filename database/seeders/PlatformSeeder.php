<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            [
                'name' => 'STREAM'
            ],
            [
                'name' => 'GOOGLE STORE'
            ],
            [
                'name' => 'APPLE STORE'
            ],
            [
                'name' => 'PLAYSTATION'
            ],
            [
                'name' => 'FORTNITE'
            ],
            [
                'name' => 'ROBLOX'
            ],
            [
                'name' => 'MINECRAFT'
            ],
            [
                'name' => 'PC'
            ],
            [
                'name' => 'MOBILE'
            ],
        ];

        foreach($platforms as $platform){
            Platform::create($platform);
        }
    }
}
