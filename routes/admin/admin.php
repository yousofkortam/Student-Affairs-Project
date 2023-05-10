<?php

use App\Http\Controllers\adminController\adminController;
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

Route::get('/admin', function () {
    return "Admin";
});

Route::post('/add-dept', [adminController::class, 'addDepartment']);

Route::post('/add-new-student', [adminController::class, 'addStudent']);

Route::post('/add-new-doctor', [adminController::class, 'addDoctor']);

Route::post('/add-new-role', [adminController::class, 'addRole']);

Route::post('/add-new-course', [adminController::class, 'addCourse']);