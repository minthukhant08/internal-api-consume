<?php
namespace App\Repositories\CourseDetail;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CourseDetail\CourseDetailRepositoryInterface;
use App\Repositories\CourseDetail\CourseDetailRepository;


class CourseDetailRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\CourseDetail\CourseDetailRepositoryInterface', 'App\Repositories\CourseDetail\CourseDetailRepository');
  }
}
