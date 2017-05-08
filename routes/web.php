<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'api','middleware'=>['simpleapi']] ,function () {
    Route::get('users', 'APIUserController@index');
    Route::post('users/{id}/traffic', 'APIUserController@addTraffic');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/login', function () {
    return view('auth.login');
});

//Route::get('/register',function () {
//    return view('auth.register');
//});

Route::get('/blank', function () {
    return view('layouts.blank');
});

Route::get('/person', function () {
    return view('dashboard.person');
});

Route::get('/node', function () {
    return view('dashboard.node');
});

Route::get('/buy', function () {
    return view('dashboard.buy');
});
Route::get('/gift', function () {
    return view('dashboard.gift');
});
Route::get('/spread', function () {
    return view('dashboard.spread');
});


