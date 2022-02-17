<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminAuthController;
use \App\Http\Controllers\UserAuthController;


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

], function ($router) {

    Route::post('login', [AdminAuthController::class,'login']);
    Route::post('signup', [AdminAuthController::class,'signup']);
    Route::post('logout', [AdminAuthController::class,'logout']);
    Route::post('refresh', [AdminAuthController::class,'refresh']);
    Route::post('me', [AdminAuthController::class,'me']);

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'user'

], function ($router) {

    Route::post('login', [UserAuthController::class,'login']);
    Route::post('logout', [UserAuthController::class,'logout']);
    Route::post('refresh', [UserAuthController::class,'refresh']);
    Route::post('me', [UserAuthController::class,'me']);

});

Route::resource('product', ProductController::class);
Route::post('product/search', [ProductController::class,'search']);

Route::resource('customer', CustomerController::class);
