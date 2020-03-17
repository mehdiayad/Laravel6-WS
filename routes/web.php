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


////////////////////////////
// Additional Ressources  //
////////////////////////////

Route::post('/loginSimple', 'AuthController@loginSimple')->name('loginSimple');

Route::post('/loginPassport', 'AuthController@loginPassport')->name('loginPassport');

Route::get('user/test', 'UserController@test')->name('user.test');

Route::post('product/list', 'ProductController@list')->name('product.list');

Route::get('cart/confirm', 'CartController@confirm')->name('cart.confirm');

Route::get('cart/number','CartController@getCartNumber')->name('cart.number');

Route::post('cart/product','CartController@getCartProductNumber' )->name('cart.product');


////////////////////////
// Default Ressources //
////////////////////////

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('product', 'ProductController');

Route::resource('cart', 'CartController');

Route::resource('address', 'AddressController');

Route::resource('command', 'CommandController');

Route::resource('category', 'CategoryController');

