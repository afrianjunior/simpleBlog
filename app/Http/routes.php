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

// Route::get('/', 'WelcomeController@index');

// Route::get('home', 'HomeController@index');

// Route::controllers([
// 	'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);


Route::get('/', 'ArticleController@index');
Route::get('article', 'ArticleController@showAll');
Route::get('article/create', 'ArticleController@create');
Route::post('article', 'ArticleController@store');
Route::get('article/{id}', 'ArticleController@show');
Route::get('article/{id}/edit', [
	'as' => 'article.edit',
	'uses' => 'ArticleController@edit'
	]);
Route::put('article/{id}', [
	'as' => 'article.update',
	'uses' => 'ArticleController@update'
	]);
Route::delete('article/{id}', [
	'as' => 'article.destroy',
	'uses' => 'ArticleController@destroy'
	]);