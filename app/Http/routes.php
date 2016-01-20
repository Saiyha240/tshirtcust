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
//    Route::post('tshirts/{tshirt}/pay', ['as' => 'tshirts.pay', 'uses' => 'TshirtController@pay']);
//    Route::get('tshirts/{tshirt}/status', ['as' => 'tshirts.status', 'uses' => 'TshirtController@status']);
	Route::resource( 'tshirts', 'TshirtController' );

	Route::group( [ 'prefix' => 'admin', 'middleware' => 'roles' ], function () {
		Route::get( '/', [ 'as' => 'admin.index', 'uses' => 'AdminController@index' ] );
		Route::get( 'dashboard', [ 'as' => 'admin.dashboard', 'uses' => 'AdminController@dashboard' ] );
		Route::get( 'orders', [ 'as' => 'admin.orders', 'uses' => 'AdminController@orders' ] );
		Route::get( 'reports', [ 'as' => 'admin.reports', 'uses' => 'AdminController@reports' ] );
		Route::get( 'users', [ 'as' => 'admin.users', 'uses' => 'AdminController@users' ] );
		Route::get( 'shirts', [ 'as' => 'admin.shirts', 'uses' => 'AdminController@shirts' ] );
		Route::get( 'layouts', [ 'as' => 'admin.layouts', 'uses' => 'AdminController@layouts' ] );
		Route::get( 'images', [ 'as' => 'admin.images', 'uses' => 'AdminController@images' ] );
		Route::post( 'images/store', [ 'as' => 'admin.images.store', 'uses' => 'AdminController@store' ] );
	} );

	Route::resource( 'users', 'UserController' );

	Route::post( 'cart/addItem/{tshirtId}', [ 'as' => 'cart.addItem', 'uses' => 'CartController@addItem' ] );
	Route::get( 'cart/removeItem/{tshirtId}', [ 'as' => 'cart.removeItem', 'uses' => 'CartController@removeItem' ] );
	Route::get( '/cart', [ 'as' => 'getCart', 'uses' => 'CartController@index' ] );

	Route::post( 'cart/checkout', [ 'as' => 'cart.checkout', 'uses' => 'CartController@pay' ] );
	Route::get( 'cart/{payment_id}/status', [ 'as' => 'cart.status', 'uses' => 'CartController@status' ] );

	Route::get('/orders', function () {
		return view('orders.orders');
	});

	Route::resource( 'fileentries', 'FileEntryController' );
} );

Route::get( '/', function () {
	return view( 'index' );
} );

Route::get( '/about', function () {
	return view( 'about.about' );
} );
