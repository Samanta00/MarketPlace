<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rota para produtos
Route::get('/products', [ProductController::class, 'getList']);
Route::post('/products', [ProductController::class, 'store']);
Route::get('/view/{id}', [ProductController::class, 'get']);
Route::put('/update/{id}', [ProductController::class, 'update']);
Route::delete('/delete/{id}', [ProductController::class, 'destroy']);

//rotas para categorias
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

//rotas para produtos do carrinho do usuario
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::put('/cartupdate/{id}', [CartController::class, 'update']);
Route::delete('/cart/{id}', [CartController::class, 'destroy']);

