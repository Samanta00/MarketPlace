<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartClientController;
use App\Http\Controllers\ImageProductController;



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
Route::get('/products', [ProductsController::class, 'index']);
Route::post('/products', [ProductsController::class, 'store']);
Route::get('/edit/{id}', [ProductsController::class, 'edit']);
Route::put('/update/{id}', [ProductsController::class, 'update']);
Route::delete('/delete/{id}', [ProductsController::class, 'destroy']);


Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

Route::get('/cart', [CartClientController::class, 'index']);
Route::post('/cart', [CartClientController::class, 'store']);
Route::put('/cartupdate/{id}', [CartClientController::class, 'update']);
Route::delete('/cart/{id}', [CartClientController::class, 'destroy']);


Route::get('/image', [ImageProductController::class, 'show']);
Route::post('/image', [ImageProductController::class, 'create']);