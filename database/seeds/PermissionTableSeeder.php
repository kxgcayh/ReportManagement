<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'View Reports', 'Manage Reports',
            'View Brands', 'Manage Brands',
            'View Categories', 'Manage Categories',
            'View Departements', 'Manage Departements',
            'View Locations', 'Manage Locations',
            'View Machines', 'Manage Machines',
            'View Productions', 'Manage Productions',
            'View Products', 'Manage Products',
            'View Projects', 'Manage Projects',
            'View Roles', 'Manage Roles',
            'View Types', 'Manage Types',
            'View Users', 'Manage Users',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
