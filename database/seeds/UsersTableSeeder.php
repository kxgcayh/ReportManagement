<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tr_users = [
            [
            'departement_id' => 1,
            'name' => 'KautsarAlbana',
            'username' => 'kautsaralbana',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_active' => true,
            ],
        ];
        User::insert($tr_users);
    }
}
