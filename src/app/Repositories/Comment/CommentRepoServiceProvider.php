<?php
namespace App\Repositories\Comment;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Comment\CommentRepository;


class CommentRepoServiceProvider extends ServiceProvider
{

  public function boot()
  {
    // code...
  }

  public function register()
  {
    $this->app->bind('App\Repositories\Comment\CommentRepositoryInterface', 'App\Repositories\Comment\CommentRepository');
  }
}
