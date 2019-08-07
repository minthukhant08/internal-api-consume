<?php
namespace App\Repositories\Like;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Like\LikeRepositoryInterface;
use App\Repositories\Like\LikeRepository;


class LikeRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\Like\LikeRepositoryInterface', 'App\Repositories\Like\LikeRepository');
  }
}
