<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Functions\Helper;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['Planning', 'Design', 'Development', 'Testing', 'Deployment', 'Maintenance', 'Closure'];

        foreach($data as $type){
            $newType = new Type();
            $newType->name = $type;
            $newType->slug = Helper::generateSlug($newType->name, Type::class);
            $newType->save();
        }
    }
}
