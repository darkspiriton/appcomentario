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
        $faker = Faker::create('es_ES');
        DB::table('users')->insert(array(
            'cantO' => $faker->numberBetween($min = 0, $max = 100),
            'cantR' => $faker->numberBetween($min = 500, $max = 1000),                
            'created_at' => $faker->dateTimeThisYear($max = 'now'),
            'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
        ));
        
    }
}
