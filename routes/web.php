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
use \App\Repositories\UserRepository;
use App\Services\Twitter;

Route::get('/', function (Twitter $twitter) {

    dd($twitter);
    return view('welcome');
});

Route::resource('projects','ProjectsController');

Route::patch('/tasks/{task}', 'ProjectTasksController@update');
Route::Post('/projects/{project}/tasks', 'ProjectTasksController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
