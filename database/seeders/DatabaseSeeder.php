<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserType;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        UserType::factory()->createMany([
            ['type' => 'Admin'],
            ['type' => 'User']
        ]);

        User::factory()->create([
            'email' => 'dev@gmail.com',
            'password' => Hash::make('Dev@123'),
            'remember_token' => Str::random(10),
            'user_types_id' => UserType::where('type', 'User')->first()->id,
            'email_verified_at' => now(),
        ]);

        User::factory(5)->create();
    }
}
