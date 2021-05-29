<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Factory;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        foreach (range(1,20) as $index){
            $name=$faker->name;
            Category::create([
                'user_id'=>rand(1,20),
                'name'=>$name,
                'slug'=>slugify($name),
                'status'=>randomStatus(),
            ]);
        }
    }
}
