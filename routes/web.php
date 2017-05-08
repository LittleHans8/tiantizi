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

Route::group(['prefix' => 'api', 'middleware' => ['simpleapi']], function () {
//    Route::get('users', 'APIUserController@index');
//    Route::post('users/{id}/traffic', 'APIUserController@addTraffic');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'APIUserController@index');  // api check pass
        Route::post('/{id}/traffic', 'APIUserController@addTraffic'); // api check pass
    });

    Route::group(['prefix' => 'nodes'], function () {
        Route::post('/{id}/online_count', 'APINodeController@onlineUserLog');// api check pass
        Route::post('/{id}/info', 'APINodeController@info');// api check pass
        Route::get('/{id}/users', 'APINodeController@users'); // 待定，ss-py-my 并没有出现该 api
        Route::post('/{id}/traffic', 'APINodeController@postTraffic');// 待定，ss-py-my 并没有出现该 api
    });
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


