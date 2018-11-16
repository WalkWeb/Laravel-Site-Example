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

// Главная
Route::get('/', 'HomeController@index')->name('home');

// Просмотр категорий и постов
Route::get('/blog/category/{slug?}', 'BlogController@category')->name('category');
Route::get('/blog/post/{slug?}', 'BlogController@post')->name('post');

// Админка
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {
    Route::get('/', 'StatsController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/post', 'PostController', ['as' => 'admin']);
});

// Роуты для авторизации/регистрации/и т.д.
Auth::routes();

// TODO Сюда переадресовывает после регистрации и/или авторизации. Надо бы удалить, а переадресовывать на главную
Route::get('/home', 'HomeController@index')->name('home');


