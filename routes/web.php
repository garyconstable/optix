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

Route::get('/home', 'ProfileController@index')->name('home')->middleware('verified');
Route::post('/home', 'ProfileController@store')->name('bio')->middleware('verified');

Route::get('/users', 'UsersController@index')->name('users')->middleware('verified');

Route::get('/user/{id}', 'UserController@index')->name('user')->middleware('verified');
Route::post('/user/{id}', 'UserController@store')->name('user')->middleware('verified');

Route::get('/comment/delete/{id}', 'AdminController@deleteComment')->name('delete_comment')->middleware('verified');

Route::get('/admin/enable/{id}', 'AdminController@enableUser')->name('enable_user')->middleware('verified');
Route::get('/admin/disable/{id}', 'AdminController@disableUser')->name('disable_user')->middleware('verified');
