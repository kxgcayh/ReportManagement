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
          'role-list', 'role-create', 'role-edit', 'role-delete', 
          'brand-list', 'brand-create', 'brand-edit', 'brand-delete',
          'user-list', 'user-create', 'user-edit', 'user-delete',
          'production-list', 'production-create', 'production-edit', 'production-delete',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
