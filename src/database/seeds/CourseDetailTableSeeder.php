<?php

use Illuminate\Database\Seeder;
use App\Course;
use Faker\Factory as Faker;

class CourseDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $courses = Course::all()->pluck('id')->toArray();
        foreach (range(1,10) as $index) {
            DB::table('course_detail')->insert([
              'course_id' => $faker->randomElement($courses),
              'topic' => $faker->word,
              'descriptions' => $faker->paragraph,
              'created_at'  =>  now(),
              'updated_at'  =>  now()
            ]);
          }
    }
}
