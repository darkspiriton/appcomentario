<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for($i=0;$i<1000;$i++)
        {
            DB::table('comments')->insert(array(
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'comment'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
                'status' => $faker->numberBetween($min = 0, $max = 1),
                'stars' => $faker->numberBetween($min = 2, $max = 5),
                'created_at' => $faker->dateTimeThisYear($max = 'now'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
            ));

        }
    }
}
