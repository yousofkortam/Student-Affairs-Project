<?php

use App\Http\Controllers\profController\professorController;
use App\Http\Controllers\systemController\systemController;
use App\Models\Role;
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
        return redirect('/professor/dashboard');
    }else if ($role == "Student") {
        return redirect('/student/dashboard');
    }
});

Route::get('/login', function () {
    if (Auth::check()) {
        if (Auth::user()->role->role_name == "Admin") {
            return redirect('/admin/dashboard');
        }else if (Auth::user()->role->role_name == "Doctor") {
            return redirect('/professor/dashboard');
        }else if (Auth::user()->role->role_name == "Student") {
            return redirect('/student/dashboard');
        }
    }
    $roles = Role::all();
    return view('login')->with([
        'roles' => $roles,
    ]);
});


Route::get('/courses/{id}', [systemController::class, 'details']);
Route::get('/courses/{id}/lectures', [systemController::class, 'lectures']);
Route::get('/courses/{id}/assignments', [systemController::class, 'assignments']);
Route::get('/courses/{id}/students', [professorController::class, 'courseStudents'])->middleware('professor');
Route::post('/login', [systemController::class, 'login'])->name('login');
Route::get('/logout', [systemController::class, 'logout'])->name('logout');
