<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ProjectController@index');
Route::get('/about','PagesController@about');
// Route::resource('projects/index','ProjectController');
Route::get('/create','ProjectController@create');
Route::post('/update/{id}','ProjectController@update');
Route::post('/create','ProjectController@store');
Route::get('/task','taskController@task');