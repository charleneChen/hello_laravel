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

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');
Route::resource('users', 'UsersController');

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//Route::resource('orders', 'OrdersController', ['only' => ['create', 'store', 'destroy']]);

Route::get('parties/{party}/orders/create', 'OrdersController@create')->name('orders.create');
Route::get('parties/{party}/orders', 'OrdersController@index')->name('orders.index');
Route::post('parties/{party}/orders', 'OrdersController@store')->name('orders.store');
Route::delete('parties/{party}/orders/{order}', 'OrdersController@destroy')->name('orders.destroy');