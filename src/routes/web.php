<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('UserHome');
});
//
//   Route::post('/users', 'UserController@store');
// Route::prefix('/v1/users')->group(function(){
//   Route::post('/register', 'UserController@store');
//     Route::post('/login', 'UserController@store');
//     Route::get('/', 'UserController@index');
//     Route::put('/{id}', 'UserController@update');
//     Route::post('/', 'UserController@store');
//     Route::delete('/{id}', 'UserController@destroy');
//     Route::get('/{id}', 'UserController@show');
// });

// Route::prefix('v1/users')->group(function(){
//     Route::post('register', 'UserController@store');
//     Route::put('/{id}', 'UserController@update');
// });

Auth::routes();

Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
// Route::resource('course_details', 'CourseDetailController');
Route::resource('batches', 'BatchController');
Route::resource('activities', 'ActivityController');
