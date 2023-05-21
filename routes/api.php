<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["prefix"=>"V1",'namespace'=>'App\Http\Controllers\Api\V1'],function(){
    // Group: Chat
    Route::prefix('chat')->group(function () {
        Route::get('/', 'ChatController@index');
        Route::get('/create', 'ChatController@create');
        Route::post('/', 'ChatController@store');
        Route::get('/{chat}', 'ChatController@show');
        Route::get('/{chat}/edit', 'ChatController@edit');
        Route::put('/{chat}', 'ChatController@update');
        Route::delete('/{chat}', 'ChatController@destroy');
    });

    // Group: Product
    Route::prefix('product')->group(function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/', 'ProductController@store');
        Route::get('/{product}', 'ProductController@show');
        Route::get('/{product}/edit', 'ProductController@edit');
        Route::put('/{product}', 'ProductController@update');
        Route::delete('/{product}', 'ProductController@destroy');
    });

    // Group: Cart
    Route::prefix('cart')->group(function () {
        Route::get('/', 'CartController@index');
        Route::get('/create', 'CartController@create');
        Route::post('/', 'CartController@store');
        Route::get('/{cart}', 'CartController@show');
        Route::get('/{cart}/edit', 'CartController@edit');
        Route::put('/{cart}', 'CartController@update');
        Route::delete('/{cart}', 'CartController@destroy');
    });

    // Group: Addresses
    Route::prefix('addresses')->group(function () {
        Route::get('/', 'AddressController@index');
        Route::get('/create', 'AddressController@create');
        Route::post('/', 'AddressController@store');
        Route::get('/{address}', 'AddressController@show');
        Route::get('/{address}/edit', 'AddressController@edit');
        Route::put('/{address}', 'AddressController@update');
        Route::delete('/{address}', 'AddressController@destroy');
    });

    // Group: Reviews
    Route::prefix('reviews')->group(function () {
        Route::get('/', 'ReviewController@index');
        Route::get('/create', 'ReviewController@create');
        Route::post('/', 'ReviewController@store');
        Route::get('/{review}', 'ReviewController@show');
        Route::get('/{review}/edit', 'ReviewController@edit');
        Route::put('/{review}', 'ReviewController@update');
        Route::delete('/{review}', 'ReviewController@destroy');
    });

    // Group: Shop
    Route::prefix('shop')->group(function () {
        Route::get('/', 'ShopController@index');
        Route::get('/create', 'ShopController@create');
        Route::post('/', 'ShopController@store');
        Route::get('/{shop}', 'ShopController@show');
        Route::get('/{shop}/edit', 'ShopController@edit');
        Route::put('/{shop}', 'ShopController@update');
        Route::delete('/{shop}', 'ShopController@destroy');
    });

    // Group: Account
    Route::prefix('account')->group(function () {
        Route::get('/', 'AccountController@index');
        Route::get('/create', 'AccountController@create');
        Route::post('/', 'AccountController@store');
        Route::get('/{account}', 'AccountController@show');
        Route::get('/{account}/edit', 'AccountController@edit');
        Route::put('/{account}', 'AccountController@update');
        Route::delete('/{account}', 'AccountController@destroy');
    });
});
