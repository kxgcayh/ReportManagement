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
        $this->call(CreateManagerUserSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(ProductionTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
    }
}
