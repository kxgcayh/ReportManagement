<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id_category' => 1,
            'name' => 'LHP',
            'is_active' => 1,
            'created_at' => now(),
            'created_by' => 1,
        ]);
        Category::create([
            'id_category' => 2,
            'name' => 'HUK',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 2,
        ]);
    }
}
