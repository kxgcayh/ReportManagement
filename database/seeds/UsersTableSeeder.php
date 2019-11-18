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
        $user = User::create([
            'name' => 'Galih',
            'is_active' => 1,
            'email' => 'galih@user.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'departement_id' => 2,
        ]);
        $role = Role::create(['name' => 'User']);
        $permissions = Permission::pluck('id', 'id')
            ->except('2', '4', '6', '8', '10', '14', '16', '18'); // Only Manage Projects
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
