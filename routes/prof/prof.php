<?php

use App\Http\Controllers\profController\professorController;
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

Route::group(['middleware' => 'auth', 'professor'], function () {

    Route::prefix('professor')->group(function () {
        Route::controller(professorController::class)->group(function () {
            Route::get('/dashboard', 'dashboard');
            Route::get('/courses', 'coursesPage');
            Route::get('/students', 'studentsPage');
            Route::get('/departments', 'department');
        });
    });

});
