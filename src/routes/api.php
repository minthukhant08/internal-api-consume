<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/users'], function()
{
      Route::post('/', 'UserController@store');
      Route::post('/login', 'UserController@login');
      Route::get('/image/{id}', 'UserController@image');
});

Route::get('v1/courses/image/{id}', 'CourseController@image');
Route::get('v1/activities/image/{id}', 'ActivityController@image');

Route::group(['prefix' => 'v1/users',  'middleware' => 'jwt.auth'], function()
{
      Route::get('/', 'UserController@index');
      Route::get('/{id}', 'UserController@show');
      Route::put('/{id}', 'UserController@update');
      Route::delete('/{id}', 'UserController@destroy');
});

Route::group(['prefix' => 'v1/courses',  'middleware' => 'jwt.auth'], function()
{
      Route::get('/', 'CourseController@index');
      Route::get('/{id}', 'CourseController@show');
      Route::post('/', 'CourseController@store');
      Route::put('/{id}', 'CourseController@update');
      Route::delete('/{id}', 'CourseController@destroy');
});

Route::group(['prefix' => 'v1/course_detail',  'middleware' => 'jwt.auth'], function()
{
      Route::post('/', 'CourseDetailController@store');
      Route::put('/{id}', 'CourseDetailController@update');
      Route::delete('/{id}', 'CourseDetailController@destroy');
});

Route::group(['prefix' => 'v1/activities',  'middleware' => 'jwt.auth'], function()
{
      Route::get('/', 'ActivityController@index');
      Route::get('/{id}', 'ActivityController@show');
      Route::post('/', 'ActivityController@store');
      Route::put('/{id}', 'ActivityController@update');
      Route::delete('/{id}', 'ActivityController@destroy');
});

Route::group(['prefix' => 'v1/comments',  'middleware' => 'jwt.auth'], function()
{
      Route::get('/', 'CommentController@index');
      Route::post('/', 'CommentController@store');
      Route::put('/{id}', 'CommentController@update');
      Route::delete('/{id}', 'CommentController@destroy');
});

Route::group(['prefix' => 'v1/batches',  'middleware' => 'jwt.auth'], function()
{
      Route::get('/', 'BatchController@index');
      Route::get('/{id}', 'BatchController@show');
      Route::post('/', 'BatchController@store');
      Route::put('/{id}', 'BatchController@update');
      Route::delete('/{id}', 'BatchController@destroy');
});

Route::group(['prefix' => 'v1/likes',  'middleware' => 'jwt.auth'], function()
{
      Route::post('/', 'LikeController@store');
      Route::delete('/{id}', 'LikeController@destroy');
});

Route::group(['prefix' => 'v1/replies',  'middleware' => 'jwt.auth'], function()
{
      Route::post('/', 'LikeController@store');
      Route::put('/{id}', 'BatchController@update');
      Route::delete('/{id}', 'LikeController@destroy');
});
