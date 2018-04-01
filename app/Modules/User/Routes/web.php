<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'user'], function () {
    Route::get('/home', 'UserController@index');
    Route::get('/info', 'UserController@info');
    Route::post('/update/{id}', 'UserController@update')->where('id', '[0-9]+');
});
