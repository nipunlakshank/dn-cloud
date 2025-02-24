<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (App::environment('production')) {
            $this->call([
                ProductionSeeder::class,
            ]);

            return;
        }

        $this->call([
            UserSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
