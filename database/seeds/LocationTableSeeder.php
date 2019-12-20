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
                'name' => 'Ciawi',
                'description' => 'Jl. Raya Ciawi No. 280A RT 1 RW 3 Sindangsari, Bogor Timur, Kota Bogor',
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
            [
                'id_location' => 2,
                'name' => 'Cibitung',
                'description' => 'Kawasan Industri MM 2100, Jl. Selayar 2. Blok H7 - H8, Jatiwangi, Kec. Cikarang Barat, Kota Bekasi',
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
            [
                'id_location' => 3,
                'name' => 'Jakarta',
                'description' => 'Jl. Rawa Bali 2, No. 3, RW03 Kec. Cakung Kawasan Industri Pulogadung, Kota Jakarta.',
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ],
            [
                'id_location' => 4,
                'name' => 'Sentul',
                'description' => 'Jl. Alternatif Sentul No. 9, Kec. Babakan Madang, Kota Bogor',
                'is_active' => true,
                // 'created_at' => now(),
                // 'updated_at' => now(),
                // 'created_by' => 1,
                // 'updated_by' => 2,
            ]
        ];
        Location::insert($locations);
    }
}
