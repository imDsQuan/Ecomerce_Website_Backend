<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\DeliveryServiceController;
use App\Http\Controllers\OrderController;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'admin'

], function () {

    Route::post('login', [AdminAuthController::class,'login']);
    Route::post('signup', [AdminAuthController::class,'signup']);
    Route::post('logout', [AdminAuthController::class,'logout']);
    Route::post('refresh', [AdminAuthController::class,'refresh']);
    Route::post('me', [AdminAuthController::class,'me']);

});

Route::get('product/feature', [ProductController::class, 'feature']);
Route::get('product/latest', [ProductController::class, 'latest']);
Route::get('product/total', [ProductController::class,'total']);
Route::get('product/profit', [ProductController::class,'getProfit']);
Route::post('product/search', [ProductController::class,'search']);
Route::get('product', [ProductController::class,'index']);
Route::post('product', [ProductController::class,'store']);
Route::get('product/{id}', [ProductController::class,'show']);
Route::post('product/{id}', [ProductController::class,'update'])->middleware('CORS');
Route::delete('product/{id}', [ProductController::class,'destroy']);


Route::get('customer/latest', [CustomerController::class,'latest']);
Route::get('customer/total',[CustomerController::class,'total']);
Route::post('customer/search', [CustomerController::class,'search']);
Route::resource('customer', CustomerController::class);

Route::resource('customer/{id}/address', AddressController::class);
Route::resource('deliveryService', DeliveryServiceController::class);


Route::get('order/total', [OrderController::class,'totalOrder']);
Route::get('order/profit', [OrderController::class,'totalProfit']);
Route::get('order/recent', [OrderController::class, 'recent']);
Route::resource('order', OrderController::class);

Route::resource('discount', DiscountController::class);



Route::group([

    'middleware' => 'api',
    'prefix' => 'user'

], function () {

    Route::post('login', [UserAuthController::class,'login']);
    Route::post('logout', [UserAuthController::class,'logout']);
    Route::post('refresh', [UserAuthController::class,'refresh']);
    Route::post('me', [UserAuthController::class,'me']);

});
