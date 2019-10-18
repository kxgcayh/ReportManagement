<?php

use Illuminate\Database\Seeder;

class DepartementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements = [
            [
            'id_departement' => 1,
            'name' => 'REA',
            'location_id' => 1,
            'is_active' => true,
            ],
            [
                'id_departement' => 2,
                'name' => 'RKA',
                'location_id' => 1,
                'is_active' => true,
            ],
        ];
        Departement::insert($departements);
    }
}
