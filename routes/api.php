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



Route::prefix('user')->group(function(){
    // login register and login
    Route::post('login',[\App\Http\Controllers\AuthUserController::class,'login']);
    Route::post('register',[\App\Http\Controllers\AuthUserController::class,'register']);
    //
    Route::middleware('auth:user')->group(function (){
        Route::get('user',[\App\Http\Controllers\AuthUserController::class,'user']);
        Route::apiResource('category','\App\Http\Controllers\CategoryController');
        Route::apiResource('product','\App\Http\Controllers\ProductController');
    });

});
Route::prefix('admin')->group(function(){
    // s and login
    Route::post('login',[\App\Http\Controllers\AuthAdminController::class,'login']);

    //
    Route::middleware('auth:admin')->group(function (){
    });

});
