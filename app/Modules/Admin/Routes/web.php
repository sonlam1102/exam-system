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
    Route::get('/contest/edit/{id}', 'ContestController@edit')->where('id', '[0-9]+');  //add question request
    Route::post('/contest/edit/{id}/info', 'ContestController@edit_info')->where('id', '[0-9]+');  //edit contest infp
    Route::post('/contest/edit/{id}/question', 'ContestController@add_question')->where('id', '[0-9]+');  //add question request
});
