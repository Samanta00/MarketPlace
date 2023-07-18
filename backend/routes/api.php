<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\Authenticate;

Route::group(['middleware' => 'api'], function ($router){
    Route::post('login', [AuthController::class, 'login']);
    Route::post('users', [UserController::class, 'index']);

    Route::get('users/products', [ProductController::class, 'getList']);
    Route::post('users/products', [ProductController::class, 'store']);
    Route::get('users/view/{id}', [ProductController::class, 'get']);
    Route::put('users/update/{id}', [ProductController::class, 'update']);
    Route::delete('users/delete/{id}', [ProductController::class, 'destroy']);

    Route::get('users/categories', [CategoriesController::class, 'index']);
    Route::post('users/categories', [CategoriesController::class, 'store']);
    Route::delete('users/categories/{id}', [CategoriesController::class, 'destroy']);
 
    Route::get('users/cart', [CartController::class, 'index']);
    Route::post('users/cart', [CartController::class, 'store']);
    Route::put('users/cartupdate/{id}', [CartController::class, 'update']);
    Route::delete('users/cart/{id}', [CartController::class, 'destroy']);
});



