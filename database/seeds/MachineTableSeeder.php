<?php

use App\Models\Machine;
use Illuminate\Database\Seeder;

class MachineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Machine::create([
            'id_machine' => 1,
            'name' => '3 Roll',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 2,
        ]);
        Machine::create([
            'id_machine' => 2,
            'name' => '4 Roll',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 2,
            'updated_by' => 1,
        ]);
        Machine::create([
            'id_machine' => 3,
            'name' => '5 Roll',
            'is_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 3,
            'updated_by' => 2,
        ]);
        Machine::create([
            'id_machine' => 4,
            'name' => '1 Roll',
            'is_active' => 0,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 3,
        ]);
    }
}
