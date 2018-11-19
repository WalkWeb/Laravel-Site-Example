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
Route::get('/blog/category/{id?}', 'BlogController@category')->name('category');
Route::get('/blog/post/{id?}', 'BlogController@post')->name('post');

// Админка
Route::group(['prefix' => 'admin', 'namespace' => 'Admin',], function() {
    Route::get('/', 'StatsController@index')->name('admin.index');
    Route::resource('/category', 'CategoryController', ['as' => 'admin']);
    Route::resource('/post', 'PostController', ['as' => 'admin']);
});

// Роуты для авторизации/регистрации/и т.д.
Auth::routes();

// Сюда переадресовывает после регистрации и/или авторизации
// При этом переадресация прописана в /vendor/laravel/framework/src/Illuminate/Foundation/Auth/RedirectsUsers.php
// И нет возможности её изменить
Route::get('/home', 'HomeController@index')->name('home');


