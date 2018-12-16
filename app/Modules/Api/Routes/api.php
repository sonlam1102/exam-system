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
Route::post('/logout', 'ApiController@logout')->middleware('api_auth');
Route::get('/error', 'ApiController@auth_error');

Route::get('/main', 'MainController@index')->middleware('api_auth');
