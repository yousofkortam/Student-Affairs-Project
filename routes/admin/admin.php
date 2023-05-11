<?php

use App\Http\Controllers\adminController\adminController;
use App\Http\Controllers\pagesController\pagesController;
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


Route::prefix('admin')->group(function () {

    Route::get('/add-student', [pagesController::class, 'addStudentPage']);

    Route::controller(adminController::class)->group(function () {

        Route::post('/add-dept', 'addDepartment');

        Route::post('/add-new-student', 'addStudent');

        Route::post('/add-new-doctor', 'addDoctor');

        Route::post('add-new-role', 'addRole');

        Route::post('/add-new-course', 'addCourse');

        Route::post('/add-new-admin', 'addAdmin');

    });
});