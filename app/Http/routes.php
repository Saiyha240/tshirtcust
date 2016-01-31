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


Route::group( [ 'prefix' => 'auth' ], function () {
	Route::get( 'login', [ 'as' => 'getLogin', 'uses' => 'Auth\AuthController@getLogin' ] );
	Route::post( 'login', [ 'as' => 'postLogin', 'uses' => 'Auth\AuthController@postLogin' ] );
	Route::get( 'logout', [ 'as' => 'getLogout', 'uses' => 'Auth\AuthController@getLogout' ] );

	Route::get( 'register', [ 'as' => 'getRegister', 'uses' => 'Auth\AuthController@getRegister' ] );
	Route::post( 'register', [ 'as' => 'postRegister', 'uses' => 'Auth\AuthController@postRegister' ] );
} );

Route::group( [ 'middleware' => 'auth' ], function () {
	Route::resource( 'tshirts', 'TshirtController' );

	Route::group( [ 'prefix' => 'admin', 'middleware' => 'roles' ], function () {
		Route::get( '/', [ 'as' => 'admin.index', 'uses' => 'AdminController@index' ] );
		Route::get( 'orders', [ 'as' => 'admin.orders', 'uses' => 'AdminController@orders' ] );
		Route::get( 'reports', [ 'as' => 'admin.reports', 'uses' => 'AdminController@reports' ] );
		Route::get( 'users', [ 'as' => 'admin.users', 'uses' => 'AdminController@users' ] );
		Route::get( 'layouts', [ 'as' => 'admin.layouts', 'uses' => 'AdminController@layouts' ] );
		Route::get( 'images', [ 'as' => 'admin.images', 'uses' => 'AdminController@images' ] );
		Route::post( 'images/store', [ 'as' => 'admin.images.store', 'uses' => 'AdminController@imageStore' ] );
	} );

	Route::get( 'admin/orders/{orderId}', [ 'uses' => 'OrderController@update' ] );
	Route::post( 'config/update/{configId}', [ 'as' => 'config.update', 'uses' => 'ConfigController@update' ] );
	Route::get( 'admin/config', [ 'as' => 'config.index', 'uses' => 'ConfigController@index' ] );

	Route::resource( 'users', 'UserController' );

	Route::post( 'cart/addItem/{tshirtId}', [ 'as' => 'cart.addItem', 'uses' => 'CartController@addItem' ] );
	Route::get( 'cart/removeItem/{tshirtId}', [ 'as' => 'cart.removeItem', 'uses' => 'CartController@removeItem' ] );
	Route::get( '/cart', [ 'as' => 'getCart', 'uses' => 'CartController@index' ] );

	Route::post( 'cart/item/update', [ 'uses' => 'CartItemController@update' ] );

	Route::post( 'cart/checkout', [ 'as' => 'cart.checkout', 'uses' => 'CartController@pay' ] );
	Route::get( 'cart/status/{user}', [ 'as' => 'cart.status', 'uses' => 'CartController@status' ] );

	Route::get( '/orders', [ 'uses' => 'OrderController@index' ] );
	Route::get( '/orders/{order}', [ 'uses' => 'OrderController@show' ] );

	Route::resource( 'fileentries', 'FileEntryController' );
	Route::get('fileentries/images', ['uses' => 'FileEntryController@usableImages'] );

	Route::group( [ 'prefix' => 'api' ], function () {
		Route::get( 'usableImages', ['uses' => "ApiController@getUsableImages"]);
	} );
} );

Route::get( '/', function () {
	return view( 'index' );
} );

Route::get( '/about', function () {
	return view( 'about.about' );
} );
