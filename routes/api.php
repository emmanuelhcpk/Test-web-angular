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
Route::group(['prefix' => 'v1'], function () { // versión 1 de la api

    Route::post('users/register', 'AuthController@register');
    Route::post('users/login', 'AuthController@login');
    Route::resource('diccionario','DiccionarioController');
    Route::resource('validacion','ValidacionController');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::get('users/me', 'AuthController@getMe');
    });
});

