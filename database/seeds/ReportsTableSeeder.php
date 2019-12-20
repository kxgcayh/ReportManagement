<?php

use App\Models\Report;
use Illuminate\Database\Seeder;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Report::create([
            'id_report' => 1,
            'name' => 'Report Pertamaku',
            'file' => '',
            'is_active' => 1,
            'approval' => 1,
            'brand_id' => 1,
            'category_id' => 1,
            'project_id' => 1,
            'type_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'created_by' => 1,
            'updated_by' => 2,
        ]);
    }
}
