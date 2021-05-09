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
        Route::post('placeorder',[\App\Http\Controllers\OrederController::class,'placeorder']);
        Route::get('getorders/{id}',[\App\Http\Controllers\FrontendController::class,'getorders']);

    });
    // get last 4 shoes
    Route::get('lastshoes',[\App\Http\Controllers\FrontendController::class,'getlastproduct']);
    // get categories
    Route::get('category',[\App\Http\Controllers\FrontendController::class,'getcategories']);


    //get all product
    Route::get('getallproducts',[\App\Http\Controllers\FrontendController::class,'getallproducts']);
    // get last 4 clothes
    Route::get('getlastclothes',[\App\Http\Controllers\FrontendController::class,'getlastclothes']);
    // details product
    Route::get('getproduct/{id}',[\App\Http\Controllers\FrontendController::class,'getproduct']);
    //get by category
    Route::get('getproductbycat/{id}',[\App\Http\Controllers\FrontendController::class,'getproductbycat']);
});

