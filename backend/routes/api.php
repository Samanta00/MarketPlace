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
});


//Route::get('users', [UserController::class, 'index']);
