<?php

use App\Http\Controllers\pagesController\pagesController;
use App\Http\Controllers\systemController\systemController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::get('/login', [pagesController::class, 'loginPage']);
Route::post('/login', [systemController::class, 'login'])->name('login');
Route::get('/logout', [systemController::class, 'logout']);
Route::get('/pre/{id}', [systemController::class, 'getPre']);
