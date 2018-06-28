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





Route::group(['namespace' => 'Home', 'prefix' => 'home', 'as' => 'home.', 'middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'index', 'uses' =>  'HomeController@index']);
    Route::resource('articles', 'ArticleController', ['except' => ['show']]);
});



Auth::routes();
