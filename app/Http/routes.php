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

// Route ke halaman guest
Route::get('/', 'ArticleController@index');
Route::get('article', 'ArticleController@showAll');
Route::get('article/{id}', 'ArticleController@show');

// Authentication
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
	]);

// Route ke halaman admin
Route::get('admin', 'AdminPageController@index');
Route::get('admin/article', 'AdminPageController@showAll');
Route::get('admin/articlecreate', 'AdminPageController@create');
Route::get('admin/article/{id}', 'AdminPageController@show');
Route::post('admin/article', 'AdminPageController@store');
Route::get('admin/article/{id}/edit', [
	'as' => 'admin.edit',
	'uses' => 'AdminPageController@edit'
	]);
Route::put('admin/article/{id}', [
	'as' => 'admin.update',
	'uses' => 'AdminPageController@update'
	]);
Route::delete('admin/artilce/{id}', [
	'as' => 'admin.destroy',
	'uses' => 'AdminPageController@destroy'
	]);
