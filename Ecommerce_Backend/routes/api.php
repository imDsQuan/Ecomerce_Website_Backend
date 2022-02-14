<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\ProductController;
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

    Route::post('login', [AdminController::class,'login']);
    Route::post('signup', [AdminController::class,'signup']);
    Route::post('logout', [AdminController::class,'logout']);
    Route::post('refresh', [AdminController::class,'refresh']);
    Route::post('me', [AdminController::class,'me']);

});

Route::group([
    'middleware' => 'api',
    'prefix' => 'user'
], function ($router) {

    Route::post('login', [UserController::class,'login']);
    Route::post('logout', [UserController::class,'logout']);
    Route::post('refresh', [UserController::class,'refresh']);
    Route::post('me', [UserController::class,'me']);

});

Route::resource('product', ProductController::class);
