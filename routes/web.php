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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('/login', 'HomeController@login')->name('login');
Route::get('/login', 'HomeController@login');
Route::post('/register', 'HomeController@register')->name('register');
Route::get('/register', 'HomeController@register');
Route::post('/logout', 'HomeController@logout')->name('logout');