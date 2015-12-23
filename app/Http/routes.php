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

/*
  Displays Home Page
*/
Route::get('/', function () {
    return view('index');
});

/*
  Displays Shirt Creation Page
*/
Route::get('/create', function () {
    return view('create');
});

/*
  Registration page
*/
Route::get('/signup', function () {
    return view('signup');
});

/*
  Displays Empty Layout
*/
Route::get('/blank', function () {
    return view('layouts/baselayout');
});

/*
  For testing purposes
*/
Route::get('/test', function () {
    return view('test');
});
