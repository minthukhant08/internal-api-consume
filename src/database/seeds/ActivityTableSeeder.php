<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ActivityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $img = file_get_contents('public/images/fake.png');
        foreach (range(1,10) as $index) {
            DB::table('activities')->insert([
              'name'         => $faker->word,
              'image'        =>  base64_encode($img),
              'date'         => $faker->date('Y-m-d', now()),
              'remarks'      => $faker->sentence,
              'descriptions' => $faker->paragraph,
              'speaker_name' => $faker->name,
              'created_at'   =>  now(),
              'updated_at'   =>  now()
            ]);
          }
    }
}
