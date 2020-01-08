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
                'name' => 'L - Men',
                'is_active' => true,
                'detail' => 'Minuman Berotot',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 1,
                'updated_by' => 2,
            ],
            [
                'id_brand' => 2,
                'product_id' => 2,
                'name' => 'Hilo',
                'is_active' => true,
                'detail' => 'Minuman Peninggi!',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 2,
                'updated_by' => 3,
            ],
            [
                'id_brand' => 3,
                'product_id' => 3,
                'name' => 'Tropicana',
                'is_active' => true,
                'detail' => 'Low Fat Milk',
                'created_at' => now(),
                'updated_at' => now(),
                'created_by' => 3,
                'updated_by' => 1,
            ]
        ];
        Brand::insert($brands);
    }
}
