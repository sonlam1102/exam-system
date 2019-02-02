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

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'customer']], function () {
	//user
    Route::get('/home', 'UserController@index');
    Route::get('/info', 'UserController@info');
    Route::post('/update', 'UserController@update')->where('id', '[0-9]+');

    //contest
    Route::group(['prefix' => 'contest'], function () {
        Route::get('/', 'ContestController@index');
        Route::get('/{id}', 'ContestController@exam')->where('id', '[0-9]+');
        Route::post('/{id}/submit', 'ContestController@submit')->where('id', '[0-9]+');
    });

    //feedback
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'FeedBackController@index');
        Route::post('/add/{id}', 'FeedBackController@add')->where('id', '[0-9]+');
    });

});
