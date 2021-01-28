<?php

use Illuminate\Database\Seeder;
use App\Song;
use Faker\Generator as Faker;

class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) {
            $song = new Song();

            $song->title = $faker->word();
            $song->description = $faker->word();
            $song->length = $faker->randomNumber(3, false);

            $song->save();
        }
    }
}
