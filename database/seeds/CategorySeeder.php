<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=[];
        $user_id= \Illuminate\Support\Facades\DB::table('users')->pluck('id');
        $faker = \Faker\Factory::create();
        for($i=0 ; $i<=6 ; $i++){
            $item= [
                'name'=> $faker->name,
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'image' => 'images/'. $faker->image($dir = 'public/images', $width = 640, $height = 480, 'cats', false),
                'is_delete' => 0,
                'creator_at' => $faker->randomElement($user_id),
            ];
            $category[]=$item;
        }
        \Illuminate\Support\Facades\DB::table('categories')->insert($category);
    }
}

