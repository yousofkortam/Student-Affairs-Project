<?php

namespace App\Http\Controllers\systemController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class systemController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password', 'role_id');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role->role_name;
            if ($role == "Admin") {
                return redirect('/admin/dashboard');
            }else if ($role == "Doctor") {
                return redirect('/professor/dashboard');
            }else if ($role == "Student") {
                return redirect('/student/dashboard');
            }
        }

        return response()->json([
            'message' => 'Invalid email or password',
        ], 401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
