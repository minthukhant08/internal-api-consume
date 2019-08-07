<?php
namespace App\Repositories\Course;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Course\CourseRepositoryInterface;
use App\Repositories\Course\CourseRepository;


class CourseRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\Course\CourseRepositoryInterface', 'App\Repositories\Course\CourseRepository');
  }
}
