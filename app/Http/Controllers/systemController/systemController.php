<?php

namespace App\Http\Controllers\systemController;

use App\Http\Controllers\Controller;
use App\Models\isCourseRegisterActive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class systemController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password', 'role_id');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role->role_name;
            $isActive = isCourseRegisterActive::where('isActive', 1)->first();
            session()->put('courseActive', $isActive != null? 1 : 0);
            if ($role == "Admin") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/admin/dashboard'
                ]);
            }else if ($role == "Doctor") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/professor/dashboard'
                ]);
            }else if ($role == "Student") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/student/dashboard'
                ]);
            }
        }

        return response()->json([
            'message' => 'Incorrect email or password'
        ],
         401);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
