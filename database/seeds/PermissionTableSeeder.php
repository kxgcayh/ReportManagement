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
            'View Projects', 'Manage Projects',
            'Manage Data Master', 'Manage Roles',                        
            'View Users', 'Manage Users',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
