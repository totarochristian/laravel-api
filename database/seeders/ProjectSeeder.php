<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = config('boolfolio.projects');
        foreach ($projects as $project) {
            $new = new Project();
            $new->user_id = 1;
            $new->category_id = $project['category_id'];
            $new->title = $project['title'];
            $new->slug = Str::slug($project['title'], '-');
            $new->image = $project['image'];
            $new->body = $project['body'];
            $new->live_site = $project['live_site'];
            $new->git_repository = $project['git_repository'];
            $new->save();
        }
    }
}
