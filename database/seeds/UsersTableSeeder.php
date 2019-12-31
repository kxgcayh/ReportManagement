<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create User
        $user = User::create([
            'name' => 'Galih',
            'is_active' => 1,
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'departement_id' => 2,
            'created_by' => 1,
        ]);
        $role = Role::create(['name' => 'User']);
        $permissions = Permission::pluck('id', 'id')
            ->only('1', '2', '17', '18', '23', '24'); // Only Manage Projects
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
