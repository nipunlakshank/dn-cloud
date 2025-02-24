<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Dev',
            'last_name' => 'User',
            'email' => 'dev@gmail.com',
            'password' => Hash::make('Dev@123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('Test@123'),
            'remember_token' => Str::random(10),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
