<?php

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'id_brand' => 1,
                'name' => 'Hilo',
                'is_active' => true,
                'detail' => 'Susu Peninggi Badan',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 2,
            ],
            [
                'id_brand' => 2,
                'name' => 'Milo',
                'is_active' => true,
                'detail' => 'Susu Peningkat Stamina',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 2,
            ],
            [
                'id_brand' => 3,
                'name' => 'L-Men',
                'is_active' => true,
                'detail' => 'Susu Berotot',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 2,
            ]
        ];
        Brand::insert($brands);
    }
}
