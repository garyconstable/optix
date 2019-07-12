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


//--> Index
Route::get('/', 'IndexController@index');

//--> Auth
Auth::routes(['verify' => true]);

//--> Profile
Route::get('/home', 'ProfileController@index')->name('home')->middleware('verified');
Route::post('/home', 'ProfileController@store')->name('home')->middleware('verified');

//--> Admin
Route::get('/admin', 'AdminController@index')->name('home')->middleware('verified');

//--> Users List
Route::get('/users', 'UsersController@index')->name('users')->middleware('verified');

//--> User Details
Route::get('/user/{id}', 'UserController@index')->name('user')->middleware('verified');
Route::post('/user/{id}', 'UserController@store')->name('user')->middleware('verified');
