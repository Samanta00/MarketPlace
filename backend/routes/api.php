<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CartController;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Request $request){
    $credentials=$request->only(['email', 'senha']);
    if(!auth()->attempt($credentials)){
        abort(401);
    }
    return response()->json([
        'data'=>[
            'token'=>$token,
            'token_type'=>'bearer',
            'expires_in'=>auth()->factory()->getTTL()*60

        ]
        ]);
});
