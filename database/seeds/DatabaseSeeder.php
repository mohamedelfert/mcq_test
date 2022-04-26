<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(AdminSeeder::class);
        $this->call(\Database\Seeders\CreateAdminSeeder::class);
        $this->call(\Database\Seeders\CreateUserSeeder::class);
        $this->call(\Database\Seeders\PermissionTableSeeder::class);
    }
}
