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
            'departement_id' => 3,
            'name' => 'Benny',
            'email' => 'benny@manager.com',
            'password' => bcrypt('password')
        ]);
        $role = Role::create(['name' => 'Manager']);
        $user->assignRole([$role->id]);
    }
}
