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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', 'WorkoutController@index');
Route::get('/log', 'WorkoutController@getLog');
Route::get('/showResults', 'WorkoutController@showResults');
Route::post('/update_log', 'WorkoutController@updateLog');
Route::get('/delete/{id}', 'WorkoutController@delete');
Route::delete('/delete/{id}', 'WorkoutController@destroy');