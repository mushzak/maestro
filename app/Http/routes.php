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

Route::get('/', 'PageController@index');
Route::get('about', 'PageController@about');
Route::get('contact', 'PageController@contact');
Route::get('gallery', 'PageController@gallery');
Route::get('auth/login', [ 'uses' => 'Auth\AuthController@getLogin' ]);
Route::post('auth/login', [ 'uses' => 'Auth\AuthController@postLogin' ]);
Route::get('auth/logout', [ 'uses' => 'Auth\AuthController@getLogout' ]);
Route::get('/auth/register', [ 'uses' => 'Auth\AuthController@getLogout' ]);
Route::delete('/admin/{id}',array('uses' => 'AdminController@destroyGallery', 'as' => 'admin.destroyGallery'));
Route::get('/admin/{id}',array('uses' => 'AdminController@editGallery', 'as' => 'admin.editGallery'));
Route::post('/admin/updateGallery',array('uses' => 'AdminController@updateGallery', 'as' => 'admin.updateGallery'));
Route::group(['middleware' => 'auth'], function () {
	Route::resource('/admin', 'AdminController@index');
	Route::post('/admin/gallery','AdminController@gallery');
});