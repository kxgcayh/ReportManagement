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
                'product_id' => 1,
                'name' => 'Water Sugar Free',
                'is_active' => true,
                'detail' => 'Bebas Gula',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 2,
            ],
            [
                'id_brand' => 2,
                'product_id' => 2,
                'name' => 'Active Tiramisu',
                'is_active' => true,
                'detail' => 'Tiramisu yang bikin Seru!',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 2,
                'updated_by' => 3,
            ],
            [
                'id_brand' => 3,
                'product_id' => 3,
                'name' => 'Madu Bebas Gula',
                'is_active' => true,
                'detail' => 'Anti Diabetes',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 3,
                'updated_by' => 1,
            ]
        ];
        Brand::insert($brands);
    }
}
