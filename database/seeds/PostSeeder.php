<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post=[];
        $faker = \Faker\Factory::create();
        $user_id = \Illuminate\Support\Facades\DB::table('users')->pluck('id');
        $cate_id = \Illuminate\Support\Facades\DB::table('categories')->pluck('id');
        for ($i=0; $i < 500; $i++){
            $item = [
                'title'=> $faker->name,
                'cate_id'=>$faker->randomElement($cate_id),
                'user_id'=> $faker->randomElement($user_id),
                'publish_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'summary' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'content' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'view' => rand(1, 20),
                'is_delete' => '0',
                'creator_at' => $faker->randomElement($user_id),
            ];
            $post[]=$item;
        }
        \Illuminate\Support\Facades\DB::table('posts')->insert($post);
    }
}
