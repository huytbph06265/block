<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=[];
        $faker = \Faker\Factory::create();
        for ($i=0; $i < 10 ; $i++){
            $item=[
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => bcrypt('123456'),
                'is_delete' => '0',
                'updator_at' => null,

            ];
            $user[]=$item;
        }
        \Illuminate\Support\Facades\DB::table('users')->insert($user);
    }
}
