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

use App\Http\Middleware\RedirectIfNotAuthenticated;
use App\Http\Middleware\SimpleAuth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

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

Route::group(['prefix' => 'user', 'middleware' => ['simpleauth']], function () {
    Route::get('/', function () {
        return view('dashboard.person');
    });

    Route::get('/blank', function () {
        return view('layouts.blank');
    });

    Route::get('/node', 'NodeController@index');

    Route::get('/buy', function () {
        return view('dashboard.buy');
    });
    Route::get('/gift', function () {
        return view('dashboard.gift');
    });
    Route::get('/spread', function () {
        return view('dashboard.spread');
    });
});

Route::get('/home', 'PersonController@index')
    ->middleware(RedirectIfNotAuthenticated::class);


//Route::get('/home', 'HomeController@index');

//Route::get('/register',function () {
//    return view('auth.register');
//});




