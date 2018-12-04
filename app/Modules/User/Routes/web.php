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

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'type']], function () {
	//user
    Route::get('/home', 'UserController@index');
    Route::get('/info', 'UserController@info');
    Route::post('/update/{id}', 'UserController@update')->where('id', '[0-9]+');

    //question
    Route::get('/contest', 'ContestController@index');
    Route::get('/contest/{id}', 'ContestController@exam')->where('id', '[0-9]+');
    Route::post('/contest/{id}/submit', 'ContestController@submit')->where('id', '[0-9]+');

    //feedback
    Route::get('/feedback', 'FeedBackController@index');
    Route::post('/feedback/add/{id}', 'FeedBackController@add')->where('id', '[0-9]+');
});
