<?php

use App\Http\Controllers\studentController\studentController;
use App\Http\Controllers\studentController\studentPagesController;
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




Route::group(['middleware' => 'auth', 'student'], function () {

    Route::prefix('student')->group(function () {
        Route::controller(studentPagesController::class)->group(function () {
            Route::get('/dashboard', 'dashboard');
        });
    });

    Route::prefix('student')->group(function () {
        Route::controller(studentController::class)->group(function () {
            Route::get('/canregister/{id}', 'checkIfStudentCanRegisterThisCourse');
        });
    });

    
    
});