<?php
namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return response()->json(['status' => true], 200);
    }
}
