<?php

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'type']], function () {
	//Admin info
    Route::get('/home', 'AdminController@index');
    Route::get('/info', 'AdminController@admin');
    Route::post('/update/{id}', 'AdminController@update')->where('id', '[0-9]+');

    //User info
    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'UserController@index');   //List users
        Route::get('/info/{id}', 'UserController@info')->where('id', '[0-9]+');    //User info
    });

    //Contest Info
    Route::group(['prefix' => 'contest'], function () {
        Route::get('/', 'ContestController@index');
        Route::get('/add', 'ContestController@add');
        Route::post('/add', 'ContestController@add');
        Route::get('/edit/{id}', 'ContestController@edit')->where('id', '[0-9]+');  //add question request
        Route::post('/edit/{id}/info', 'ContestController@edit_info')->where('id', '[0-9]+');  //edit contest infp
        Route::post('/edit/{id}/question', 'ContestController@add_question')->where('id', '[0-9]+');  //add question request
        Route::delete('/delete/{id}', 'ContestController@deleteContest')->where('id', '[0-9]+');  //delete contest by id
        Route::delete('/delete/{id}/question', 'ContestController@deleteQuestion')->where('id', '[0-9]+');  //delete question by id
        Route::get('/{id}/candidate', 'ContestController@listCandidate')->where('id', '[0-9]+');  //get candidtes of contest
    });

    //Feedback
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('/', 'FeedBackController@index');
    });

    //Subject
    Route::group(['prefix' => 'subject'], function () {
        Route::get('/', 'SubjectController@index');
        Route::get('/add', 'SubjectController@add');
        Route::post('/add', 'SubjectController@add');
    });
});
