<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::resource('product', 'ProductController'); T

Route::post('/passportAuthSimple', 'AuthController@passportAuthSimple')->name('passportAuthSimple');

Route::post('/passportAuthGrant', 'AuthController@passportAuthGrant')->name('passportAuthGrant');

Route::post('/passportAuthClient', 'AuthController@passportAuthClient')->name('passportAuthClient');

Route::post('/passportGenerateAuthorizeUrl', 'AuthController@passportGenerateAuthorizeUrl');

Route::middleware('auth:api')->group(function(){
    
    Route::get('/passportTestToken', 'AuthController@passportTestToken');
            
    Route::post('product/list', 'ProductController@list')->name('product.list');
    
    Route::get('cart/confirm', 'CartController@confirm')->name('cart.confirm');
    
    Route::get('cart/number','CartController@getCartNumber')->name('cart.number');
    
    Route::post('cart/product','CartController@getCartProductNumber')->name('cart.product');
    
    Route::resource('product', 'ProductController');
    
    Route::resource('user', 'UserController');
    
    Route::resource('cart', 'CartController');
    
    Route::resource('address', 'AddressController');
    
    Route::resource('command', 'CommandController');
    
    Route::resource('category', 'CategoryController');
    
});


    