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

Route::get('/', ['as' => 'home', function () { return view('welcome'); }]);
Route::model('users', 'User');
Route::get( '/login' , ['as' => 'login','uses' => 'HomeController@showLogin'] );
Route::post( '/login' , ['as' => 'post.login','uses' => 'HomeController@doLogin'] );
Route::get( '/register' , ['as' => 'register','uses' => 'HomeController@showLogin'] );
Route::get( '/logout' , ['as' => 'logout','uses' => 'HomeController@doLogout'] );

Route::group([ 'middleware' => 'auth'], function() {
	get('/profile/{user}', [
		'as' => 'profile',
		'uses' => 'ProfileController@index'
		]);
	Route::model('exercises', 'Exercise');
	Route::resource('exercises', 'ExercisesController');
	Route::bind('exercises', function ($value, $route) {
		return App\Exercise::whereSlug($value)->first();
	});
});
Route::get('/exercises', ['as' => 'exercises.index', 'uses' => 'ExercisesController@index']);
Route::get('/exercises-from/{user}', ['as' => 'exercises.allFromUser', 'uses' => 'ExercisesController@allFromUser']);