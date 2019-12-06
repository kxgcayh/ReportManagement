<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Kautsar Al Bana',
            'is_active' => 1,
            'email' => 'kautsar@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'departement_id' => 1,
            'created_by' => 1,
        ]);
        // Create Role
        $role = Role::create(['name' => 'Admin']);
        // Select Permission
        $permissions = Permission::pluck('id', 'id')->all();
        // Sync Created Role with Selected Permission
        $role->syncPermissions($permissions);
        // Assign Model with Created Role
        $user->assignRole([$role->id]);
    }
}
