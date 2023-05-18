<?php

use App\Http\Controllers\adminController\adminController;
use App\Http\Controllers\adminController\adminPagesController;
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


Route::group(['middleware' => 'auth', 'admin'], function () {

    Route::prefix('admin')->group(function () {
        Route::controller(adminPagesController::class)->group(function () {
            Route::get('/dashboard', 'dashboard');
            Route::get('/courses', 'coursesPage');
            Route::get('/adminstrators', 'adminsPage');
            Route::get('/professors', 'professorsPage');
            Route::get('/students', 'studentsPage');
            Route::get('/add-course', 'addCourse');
            Route::get('/add-student', 'addStudent');
            Route::get('/add-admin', 'addAdmin');
            Route::get('/add-professor', 'addProf');
            Route::get('/departments', 'departments');
            Route::get('/add-department', 'addDept');
        });
    });

    Route::prefix('admin')->group(function () {
        Route::controller(adminController::class)->group(function () {
            Route::post('/add-dept', 'addDepartment');
            Route::post('/add-new-student', 'addStudent');
            Route::post('/add-new-admin', 'addAdmin');
            Route::post('/add-new-doctor', 'addDoctor');
            Route::post('/add-new-role', 'addRole');
            Route::post('/add-new-course', 'addCourse');
            Route::post('/active-courses-register', 'activeCourses');
            Route::post('/deactive-courses-register', 'activeCourses');
            Route::get('/delete-student/{id}', 'deleteStudent');
            Route::get('/delete-professor/{id}', 'deleteProf');
            Route::get('/delete-admin/{id}', 'deleteAdmin');
        });
    });
    
});
