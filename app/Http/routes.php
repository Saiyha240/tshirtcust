<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['prefix' => 'auth'], function(){
    Route::get('login', ['as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'getLogout', 'uses' => 'Auth\AuthController@getLogout']);

    Route::get('register', ['as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister']);
    Route::post('register', ['as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister']);
});

Route::group(['prefix' => 'tshirt', 'middleware' => 'auth'], function(){
    Route::get('create', ['as' => 'getTshirtCreate', 'uses' => 'TshirtController@create']);
    Route::get('edit', ['as' => 'getTshirtEdit', 'uses' => 'TshirtController@edit']);
});

Route::get('/', function () {
    return view('index');
});


