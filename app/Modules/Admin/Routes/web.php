<?php

Route::group(['prefix' => 'admin'], function () {
	//Admin info
    Route::get('/index', 'AdminController@index');
    Route::get('/info', 'AdminController@info');
    Route::post('/update/{id}', 'AdminController@update')->where('id', '[0-9]+');

    //User info
    Route::get('/user/list', 'UserController@index');

    //Contest Info
    Route::get('/contest', 'ContestController@index');
    Route::get('/contest/add', 'ContestController@add');
    Route::post('/contest/add', 'ContestController@add');
    Route::post('/contest/edit/{id}/info', 'ContestController@edit_info')->where('id', '[0-9]+');  //edit question
    Route::get('/contest/edit/{id}', 'ContestController@add_question')->where('id', '[0-9]+');
});
