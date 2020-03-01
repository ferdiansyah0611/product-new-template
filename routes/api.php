<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', 'ApiController@test');
Route::get('/category','ApiController@index');
Route::get('/newseed', 'ApiController@seednew');
Route::get('/newseed/{id}', 'ApiController@seednewID');
Route::get('/newseed/{title}', 'ApiController@seednewTitle');
Route::get('/newseed/upload', 'ApiController@seednewUpload');