<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::resource('/', 'UsersController');

Route::resource('session', 'SessionsController');

Route::post("create", 'UsersController@create');

Route::post('upload', ['uses' =>'UsersController@upload']);

Route::get("logout", 'SessionsController@destroy');

Route::post('mainpage', function() {
	return "This is the main page";
})->before('auth');
