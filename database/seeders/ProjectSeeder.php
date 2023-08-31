<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('projects');
        foreach ($projects as $project) {
            $newproject = new Project();
            $newproject->title = $project['title'];
            $newproject->link = $project['link'];
            $newproject->description = $project['description'];
            $newproject->save();
        }
    }
}
