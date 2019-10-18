<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            [
            'id_location' => 1,
            'name' => 'Bogor',
            'description' => 'Jl. Raya Wangun',
            'is_active' => true,
            ], [
                'id_location' => 2,
                'name' => 'Sentul',
                'description' => 'Jl. Cibinong',
                'is_active' => true,
            ],
        ];
        Location::insert($locations);
    }
}
