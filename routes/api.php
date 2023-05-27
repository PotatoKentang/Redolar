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


Route::group(["prefix"=>"V1",'namespace'=>'App\Http\Controllers\Api\V1','middleware' => ['auth:sanctum']],function(){
    // Group: Chat
    Route::resource('chat', ChatController::class);

    // Group: Product
    Route::resource('product', ProductController::class);

    // Group: Cart
    Route::resource('cart', CartController::class);

    // Group: Addresses
    Route::resource('addresses', AddressController::class);

    // Group: Reviews
    Route::resource('reviews', ReviewController::class);

    // Group: Shop
    Route::resource('shop', ShopController::class);

    // Group: Account
    Route::resource('account', AccountController::class);

    // Group: Order
    Route::resource('order', OrderController::class);

    // Group: Messages
    Route::resource('messages', MessageController::class);

    
});
