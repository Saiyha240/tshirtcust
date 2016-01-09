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

Route::group(['middleware' => 'auth'], function(){
    Route::post('tshirt/{tshirt}/pay', ['as' => 'tshirt.pay', 'uses' => 'TshirtController@pay']);
    Route::get('tshirt/{tshirt}/status', ['as' => 'tshirt.status', 'uses' => 'TshirtController@status']);
    Route::resource('tshirt', 'TshirtController');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/payment', function () {
    return view('payment/payment');
});
