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

Route::get('/', ['as' => 'home', 'uses' => 'UserController@index']);


Route::get('stats', ['as' => 'stats', 'uses' => 'UserController@stats']);

Route::post('search', ['uses' => 'UserController@search','as' => 'search']);

Route::resource('users', 'UserController');

URL::forceSchema('https');
