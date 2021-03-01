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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'LaughsnsController@index');