<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Type;
use App\Functions\Helper;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for($i = 0; $i < 30; $i++){
            $newProject = new Project();
            $newProject->type_id = Type::inRandomOrder()->first()->id;
            $newProject->title = $faker->sentence(3);
            $newProject->slug = Helper::generateSlug($newProject->title, Project::class);
            $newProject->category = $faker->randomElement(['Web Development', 'Mobile App', 'Design', 'Data Science', 'Machine Learning']);
            $newProject->description = $faker->paragraphs(3, true);
            $newProject->start_date = $faker->date('Y-m-d', '-1 year');
            $newProject->end_date = $faker->optional()->date('Y-m-d', 'now');
            $newProject->project_url = $faker->url;
            $newProject->save();
        }
    }
}
