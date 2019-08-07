<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class CourseTableSeeder extends Seeder
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
            DB::table('course')->insert([
              'name'        =>  $faker->name,
              'image'       =>  base64_encode($img),
              'created_at'  =>  now(),
              'updated_at'  =>  now()
            ]);
          }
    }
}
