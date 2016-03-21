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

/*Route::get('/', function()
{
	return View::make('hello');
});*/

//Route::resource('users', 'UsersController');

//Route::get('login', 'SessionsController@create');
//Route::get('logout', 'SessionsController@destroy');
Route::resource('/', 'UsersController');

Route::resource('session', 'SessionsController');

Route::post("create", 'UsersController@create');

Route::post('upload', ['uses' =>'UsersController@upload']);

//Route::post('fileupload', 'FileController');

Route::get("logout", 'SessionsController@destroy');

Route::post('mainpage', function() {
	return "This is the main page";
})->before('auth');
