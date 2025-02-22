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

            /** Warning : Do not change the seeding order  */
            $this->call([
                PermissionSeeder::class,
                UserRoleSeeder::class,
                ProductionSeeder::class,
            ]);

            return;
        }

        /** Warning : Do not change the seeding order  */
        $this->call([
            PermissionSeeder::class,
            UserRoleSeeder::class,
            UserSeeder::class,
            ChatSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
