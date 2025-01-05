<?php

namespace Database\Seeders;

use App\Models\AllPriceValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AllPriceValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = range(1, 500);

        foreach ($values as $value) {
            AllPriceValue::create([
                'value' => $value
            ]);
        }
    
        
    }
}
