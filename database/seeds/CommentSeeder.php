<?php

use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment=[];
        $faker = \Faker\Factory::create();
        $user_id = \Illuminate\Support\Facades\DB::table('users')->pluck('id');
        $post_id = \Illuminate\Support\Facades\DB::table('posts')->pluck('id');
        for ($i=0;$i<=30;$i++){
            $item=[
                'user_id'=> $faker->randomElement($user_id),
                'post_id'=> $faker->randomElement($post_id),
                'content'=> $faker->realText($maxNbChars = 200, $indexSize = 2),
                'email'=> $faker->freeEmail,
                'parent' => null,
                'is_delete' => 0,
                'creator_at' => $faker->randomElement($user_id),
            ];
            $comment[]=$item;
        }
        \Illuminate\Support\Facades\DB::table('comments')->insert($comment);
    }
}
