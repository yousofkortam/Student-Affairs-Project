<?php

use App\Http\Controllers\systemController\systemController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }
    $role = Auth::user()->role->role_name;
    if ($role == "Admin") {
        return redirect('/admin/dashboard');
    }else if ($role == "Doctor") {
        return redirect('/doctor/dashboard');
    }else if ($role == "Student") {
        return redirect('/student/dashboard');
    }
});

Route::get('/login', function () {
    if (Auth::check()) {
        if (Auth::user()->role->role_name == "Admin") {
            return redirect('/admin/dashboard');
        }else if (Auth::user()->role->role_name == "Doctor") {
            return redirect('/doctor/dashboard');
        }else if (Auth::user()->role->role_name == "Student") {
            return redirect('/student/dashboard');
        }
    }
    return view('login');
});



Route::post('/login', [systemController::class, 'login'])->name('login');
Route::get('/logout', [systemController::class, 'logout'])->name('logout');
