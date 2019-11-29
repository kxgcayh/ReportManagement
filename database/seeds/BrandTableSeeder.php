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
            ],
            [
                'id_brand' => 2,
                'name' => 'Milo',
                'is_active' => true,
                'detail' => 'Susu Peningkat Stamina',
            ],
            [
                'id_brand' => 3,
                'name' => 'L-Men',
                'is_active' => true,
                'detail' => 'Susu Berotot',
            ]
        ];
        Brand::insert($brands);
    }
}
