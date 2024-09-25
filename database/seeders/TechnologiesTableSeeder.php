<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use App\Functions\Helper;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'PHP', 'Python', 'Laravel', 'Django', 'Node.js', 'React', 'Vue.js', 'MySQL', 'MongoDB', 'Docker', 'Git', 'AWS'];

        foreach($data as $technology){
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->slug = Helper::generateSlug($newTechnology->name, Technology::class);
            $newTechnology->save();
        }

    }
}
