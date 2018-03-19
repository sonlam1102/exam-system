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

Route::group(['prefix' => 'admin'], function () {
	//Admin info
    Route::get('/', 'AdminController@index');
    Route::get('/info', 'AdminController@info');
    Route::post('/update/{id}', 'AdminController@update')->where('id', '[0-9]+');

    //User info
    Route::get('/user/list', 'UserController@index');

    //Contest Info
    Route::get('/contest', 'ContestController@index');
    Route::get('/contest/add', 'ContestController@add');
    Route::post('/contest/add', 'ContestController@add');
});
