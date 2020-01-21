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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/refresh_captcha', 'Auth\RegisterController@refreshCaptcha')->name('refresh');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('users/edit',  ['as' => 'users.edit', 'uses' => 'ProfileController@edit']);

Route::patch('users/profile/update',  ['as' => 'users.update', 'uses' => 'ProfileController@update']);