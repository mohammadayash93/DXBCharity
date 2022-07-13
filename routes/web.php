<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function()
{
    Route::get('/', 'App\Http\Controllers\Front\FrontController@index')->name('index');
    Route::get('/home', 'App\Http\Controllers\Front\FrontController@index')->name('home');
    Route::get('/donate', 'App\Http\Controllers\Front\FrontController@donate')->name('donate');
    Route::get('/page/{slug}', 'App\Http\Controllers\Front\FrontController@page')->name('page.slug');
});

Route::group(['prefix' => 'admin'], function() {
    Auth::routes();
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('admin.index');
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('admin.home');
    Route::get('/config', 'App\Http\Controllers\ConfigController@index')->name('config');
    Route::put('/config/update/{id}', 'App\Http\Controllers\ConfigController@update')->name('config.update');

    Route::group(['namespace' => 'App\Http\Controllers\Profile'], function (){
        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile/update/profile/{id}', 'ProfileController@updateProfile')->name('profile.update.profile');
        Route::put('/profile/update/password/{id}', 'ProfileController@updatePassword')->name('profile.update.password');
        Route::put('/profile/update/avatar/{id}', 'ProfileController@updateAvatar')->name('profile.update.avatar');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Error'], function (){
        Route::get('/unauthorized', 'ErrorController@unauthorized')->name('unauthorized');
    });

    Route::group(['namespace' => 'App\Http\Controllers\User'], function (){
        //Users
        Route::get('/user', 'UserController@index')->name('user');
        Route::get('/user/create', 'UserController@create')->name('user.create');
        Route::post('/user/store', 'UserController@store')->name('user.store');
        Route::get('/user/edit/{id}', 'UserController@edit')->name('user.edit');
        Route::put('/user/update/{id}', 'UserController@update')->name('user.update');
        Route::get('/user/edit/password/{id}', 'UserController@editPassword')->name('user.edit.password');
        Route::put('/user/update/password/{id}', 'UserController@updatePassword')->name('user.update.password');
        Route::get('/user/show/{id}', 'UserController@show')->name('user.show');
        Route::get('/user/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        // Roles
        Route::get('/role', 'RoleController@index')->name('role');
        Route::get('/role/create', 'RoleController@create')->name('role.create');
        Route::post('/role/store', 'RoleController@store')->name('role.store');
        Route::get('/role/edit/{id}', 'RoleController@edit')->name('role.edit');
        Route::put('/role/update/{id}', 'RoleController@update')->name('role.update');
        Route::get('/role/show/{id}', 'RoleController@show')->name('role.show');
        Route::get('/role/destroy/{id}', 'RoleController@destroy')->name('role.destroy');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Country'], function (){
        //Countries
        Route::get('/country', 'CountryController@index')->name('country');
        Route::get('/country/create', 'CountryController@create')->name('country.create');
        Route::post('/country/store', 'CountryController@store')->name('country.store');
        Route::get('/country/edit/{id}', 'CountryController@edit')->name('country.edit');
        Route::put('/country/update/{id}', 'CountryController@update')->name('country.update');
        Route::get('/country/show/{id}', 'CountryController@show')->name('country.show');
        Route::get('/country/destroy/{id}', 'CountryController@destroy')->name('country.destroy');
        // Cities
        Route::get('/city', 'CountryController@indexCity')->name('city');
        Route::get('/city/create', 'CountryController@createCity')->name('city.create');
        Route::post('/city/store', 'CountryController@storeCity')->name('city.store');
        Route::get('/city/edit/{id}', 'CountryController@editCity')->name('city.edit');
        Route::put('/city/update/{id}', 'CountryController@updateCity')->name('city.update');
        Route::get('/city/show/{id}', 'CountryController@showCity')->name('city.show');
        Route::get('/city/destroy/{id}', 'CountryController@destroyCity')->name('city.destroy');
        Route::post('/city/get_by_country', 'CountryController@getByCountryId')->name('city.get_by_country');
    });

    Route::group(['namespace' => 'App\Http\Controllers\Category'], function (){
        //Categories
        Route::get('/category', 'CategoryController@index')->name('category');
        Route::get('/category/create', 'CategoryController@create')->name('category.create');
        Route::post('/category/store', 'CategoryController@store')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
        Route::put('/category/update/{id}', 'CategoryController@update')->name('category.update');
        Route::get('/category/show/{id}', 'CategoryController@show')->name('category.show');
        Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('category.destroy');

    });

    Route::group(['namespace' => 'App\Http\Controllers\Page'], function (){
        //Pages
        Route::get('/page', 'PageController@index')->name('page');
        Route::get('/page/create', 'PageController@create')->name('page.create');
        Route::post('/page/store', 'PageController@store')->name('page.store');
        Route::get('/page/edit/{id}', 'PageController@edit')->name('page.edit');
        Route::put('/page/update/{id}', 'PageController@update')->name('page.update');
        Route::get('/page/show/{id}', 'PageController@show')->name('page.show');
        Route::get('/page/destroy/{id}', 'PageController@destroy')->name('page.destroy');

        //Contact
        Route::get('/contact', 'ContactController@index')->name('contact');
        Route::get('/contact/create', 'ContactController@create')->name('contact.create');
        Route::post('/contact/store', 'ContactController@store')->name('contact.store');
        Route::get('/contact/edit/{id}', 'ContactController@edit')->name('contact.edit');
        Route::put('/contact/update/{id}', 'ContactController@update')->name('contact.update');
        Route::get('/contact/show/{id}', 'ContactController@show')->name('contact.show');
        Route::get('/contact/destroy/{id}', 'ContactController@destroy')->name('contact.destroy');
    });


    Route::group(['namespace' => 'App\Http\Controllers\Item'], function (){
        //Items
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/create', 'ItemController@create')->name('item.create');
        Route::post('/item/store', 'ItemController@store')->name('item.store');
        Route::get('/item/edit/{id}', 'ItemController@edit')->name('item.edit');
        Route::put('/item/update/{id}', 'ItemController@update')->name('item.update');
        Route::get('/item/show/{id}', 'ItemController@show')->name('item.show');
        Route::get('/item/destroy/{id}', 'ItemController@destroy')->name('item.destroy');
    });
});
