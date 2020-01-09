<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Benny',
            'is_active' => 1,
            'email' => 'manager@manager.com',
            'password' => bcrypt('password'),
            'departement_id' => 3,
            'created_by' => 1,
            'created_at' => now(),
            ]);
        $role = Role::create(['name' => 'Manager']);
        $permissions = Permission::pluck('id', 'id')
            ->except('4'); // Except Manage Roles
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
