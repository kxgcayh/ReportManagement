<?php

use App\Models\Departement;
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
                'name' => 'RPP',
                'location_id' => 1,
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
            [
                'id_departement' => 2,
                'name' => 'REA',
                'location_id' => 1,
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
            [
                'id_departement' => 3,
                'name' => 'RKA',
                'location_id' => 1,
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
        ];
        Departement::insert($departements);
    }
}
