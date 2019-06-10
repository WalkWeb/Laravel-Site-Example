<?php

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

    // Очистка кэша через админку, чтобы не подключиться каждый раз к VPS
    Route::get('/clear-route', function() {
        Artisan::call('route:clear');
        return 'php artisan route:clear - OK';
    })->name('clear-route');

    Route::get('/clear-config', function() {
        Artisan::call('config:cache');
        return 'php artisan config:cache - OK';
    })->name('clear-config');

    Route::get('/clear-view', function() {
        Artisan::call('view:clear');
        return 'php artisan view:clear - OK';
    })->name('clear-view');
});

// Роуты для авторизации/регистрации/и т.д.
Auth::routes();

// Сюда переадресовывает после регистрации и/или авторизации
// При этом переадресация прописана в /vendor/laravel/framework/src/Illuminate/Foundation/Auth/RedirectsUsers.php
// И нет возможности её изменить. Печаль
Route::get('/home', 'HomeController@index')->name('home');


