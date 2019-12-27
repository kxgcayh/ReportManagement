<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'id_product' => 1,
            'production_id' => 1,
            'is_active' => 1,
            'name' => 'L - Men',
            'detail' => 'Minuman Berotot',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 2,
        ]);

        Product::create([
            'id_product' => 2,
            'production_id' => 2,
            'is_active' => 1,
            'name' => 'Hilo',
            'detail' => 'Minuman Peninggi',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 2,
            'updated_by' => 1,
        ]);

        Product::create([
            'id_product' => 3,
            'production_id' => 3,
            'is_active' => 1,
            'name' => 'Tropicana',
            'detail' => 'Low Fat Milk',
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 3,
            'updated_by' => 1,
        ]);
    }
}
