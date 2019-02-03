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

Route::group(['prefix' => 'root', 'middleware' => ['auth', 'root']], function () {
    Route::get('/home', 'RootController@index');
    Route::get('/info', 'RootController@account');
    Route::post('/update', 'RootController@update')->where('id', '[0-9]+');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'UserController@index');   //List users
        Route::get('/info/{id}', 'UserController@info')->where('id', '[0-9]+');    //User info
        Route::post('/{id}/reset', 'UserController@reset')->where('id', '[0-9]+');   // Reset admin password
        Route::get('/add', 'UserController@add');
        Route::post('/add', 'UserController@add');
    });

    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', 'SubjectController@index');
        Route::get('/add', 'SubjectController@add');
        Route::post('/add', 'SubjectController@add');
    });
});
