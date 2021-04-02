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


Route::group(['prefix' => 'admin', 'middleware' =>'auth'], function() {
    Route::get('laughsns/create', 'Admin\LaughsnsController@add');
    Route::get('laughsns', 'Admin\LaughsnsController@index');
    Route::get('laughsns/edit', 'Admin\LaughsnsController@edit');
    Route::get('laughsns/delete', 'Admin\LaughsnsController@delete');
    Route::post('laughsns/edit', 'Admin\LaughsnsController@update');
    Route::post('laughsns/create', 'Admin\LaughsnsController@create');
});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'LaughsnsController@index');
Route::get('index', 'MypageController@index')->middleware('auth');
Route::get('create', 'LaughsnsController@add');
Route::get('edit', 'LaughsnsController@edit');
Route::get('laughsns/create', 'LaughsnsController@add');
Route::post('laughsns/create', 'LaughsnsController@create');
Route::post('laughsns/edit', 'LaughsnsController@update');
Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);
    Route::post('users/{user}/follow', 'UsersController@follow')->name('follow');
    Route::delete('users/{user}/unfollow', 'UsersController@unfollow')->name('unfollow');
});



