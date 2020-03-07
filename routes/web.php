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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('home/vue', 'HomeController@vue')->name('home.vue');

Route::get('login/api', 'UserController@loginApiGet');

Route::post('login/api', 'UserController@loginApiPost');

Route::resource('user', 'UserController');

Route::resource('product', 'ProductController');

Route::get('cart/confirm', 'CartController@confirm')->name('cart.confirm');

Route::resource('cart', 'CartController');

Route::resource('address', 'AddressController');

Route::resource('command', 'CommandController');

