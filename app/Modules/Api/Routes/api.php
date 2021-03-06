<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', 'ApiController@login');
Route::post('/register', 'ApiController@register_user');
Route::get('/error', 'ApiController@auth_error');
Route::post('/logout', 'ApiController@logout');

Route::get('/', 'MainController@index')->middleware('api_auth');

Route::group(['prefix' => 'contest'], function (){
    Route::get('/{id}', 'ContestController@index')->where('id', '[0-9]+')->middleware('api_auth');
    Route::post('/{id}/submit', 'ContestController@submit')->where('id', '[0-9]+')->middleware('api_auth');
});

Route::group(['prefix' => 'user', 'middleware' => ['api_auth'] ], function (){
    Route::post('/info', 'UserController@info');
    Route::get('/info', 'UserController@info');
});