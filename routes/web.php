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

Route::get('/', 'UserController@list')->name('user.list');
Route::get('/show/{id}', 'UserController@show')->name('user.show');

Route::get('/register', 'UserController@signup')->name('user.signup');
Route::post('/register', 'UserController@store')->name('user.store');

Route::get('/login', 'UserController@signin')->name('user.signin');
Route::post('/login', 'UserController@auth')->name('user.auth');

Route::get('/logout', 'UserController@logout')->name('user.logout');
