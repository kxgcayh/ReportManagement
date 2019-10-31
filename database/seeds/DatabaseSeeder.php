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
        $this->call(PermissionTableSeeder::class);
        $this->call(LocationTableSeeder::class);
        $this->call(DepartementTableSeeder::class);
        $this->call(CreateAdminUserSeeder::class);
    }
}
