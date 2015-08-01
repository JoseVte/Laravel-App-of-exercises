<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::model('exercises', 'Exercise');
Route::model('users', 'User');
Route::resource('exercises', 'ExercisesController');
Route::bind('exercises', function ($value, $route) {
	return App\Exercise::whereSlug($value)->first();
});