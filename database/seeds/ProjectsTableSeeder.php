<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'id_project' => 1,
            'name' => 'Project Pertamaku',
            'is_active' => 1,
            'description' => 'Deskripsi project pertamaku',
            'created_at' => now(),
            'created_by' => 1,
        ]);
    }
}
