<?php

use Illuminate\Database\Seeder;

use App\Models\Type;
class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'id_type' => 1,
            'name' => 'CAS',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 2,
        ]);

        Type::create([
            'id_type' => 2,
            'name' => 'MAS',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 2,
            'updated_by' => 1,
        ]);

        Type::create([
            'id_type' => 3,
            'name' => 'MSF',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 2,
            'updated_by' => 3,
        ]);
    }
}
