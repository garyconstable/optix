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

Route::get('/', 'IndexController@index');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/admin', 'AdminController@index')->name('home')->middleware('verified');

Route::get('/users', 'UsersController@index')->name('users')->middleware('verified');

Route::get('/user/{id}', 'UserController@index')->name('user')->middleware('verified');
