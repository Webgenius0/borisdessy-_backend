<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Rafi Ahmed',
                'email' => 'rafi.cse.ahmed@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Rhishi',
                'email' => 'rhishi@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Rahim',
                'email' => 'rahim@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Tariq',
                'email' => 'tariq@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Mariam',
                'email' => 'mariam@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Saif',
                'email' => 'saif@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Sofia',
                'email' => 'sofia@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Junaid',
                'email' => 'junaid@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Nadia',
                'email' => 'nadia@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Ali',
                'email' => 'ali@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Hassan',
                'email' => 'hassan@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Aisha',
                'email' => 'aisha@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Zain',
                'email' => 'zain@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Farhan',
                'email' => 'farhan@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Sara',
                'email' => 'sara@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Osman',
                'email' => 'osman@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Sami',
                'email' => 'sami@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Lina',
                'email' => 'lina@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
            [
                'name' => 'Imran',
                'email' => 'imran@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
           
            [
                'name' => 'Super',
                'email' => 'super@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('12345678'),
                'role' => 'superadmin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
            ],
        ]);
    }
}
