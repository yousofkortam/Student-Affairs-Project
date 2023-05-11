<?php

namespace App\Http\Controllers\systemController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class systemController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Login successful'
            ]);
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }
}
