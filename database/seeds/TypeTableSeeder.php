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
            'name' => 'Excel',
            'is_active' => 1,
            'created_at' => now(),
            'created_by' => 1,
        ]);
    }
}
