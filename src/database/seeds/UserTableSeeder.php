<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Batch;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
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
      $batches = Batch::all()->pluck('id')->toArray();
      $img = file_get_contents('public/images/fake.png');
        foreach (range(1,10) as $index) {
            DB::table('user')->insert([
              'name'          =>  $faker->name,
              'email'         =>  $faker->unique()->safeEmail,
              'password'      =>  $faker->password,
              'date_of_birth' =>  $faker->date('Y-m-d', now()),
              'nrc_no'        =>  Str::random(10),
              'phone_no'      =>  $faker->e164PhoneNumber,
              'address'       =>  $faker->address,
              'image'         =>  base64_encode($img),
              'grade'         =>  $faker->randomElement(['A','B','C']),
              'company'       =>  $faker->name,
              'job'           =>  $faker->jobTitle,
              'course_id'     =>  $faker->randomElement($courses),
              'batch_id'      =>  $faker->randomElement($batches),
              'user_type'     =>  $faker->numberBetween(1,2),
              'gender'        =>  $faker->numberBetween(1,2),
              'created_at'    =>  now(),
              'updated_at'    =>  now()
            ]);
          }
    }
}
