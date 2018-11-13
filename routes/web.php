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

/**
 * Домашняя страница
 */
Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {
    Route::get('/', 'StatsController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


