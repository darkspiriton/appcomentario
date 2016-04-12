<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<100;$i++){
            DB::table('users_online')->insert(array(
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
            ));
        }

        for($j=0;$j<800;$j++) {
            DB::table('users_register')->insert(array(
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
            ));
        }
    }
}
