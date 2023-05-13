<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;

class adminPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function dashboard()
    {
        $courses = Course::all();
        $professors = Professor::all();
        $students = Student::all();
        $roles = Role::all();
        $data = [
            'courses' => $courses,
            'professors' => $professors,
            'students' => $students,
            'roles' => $roles
        ];
        return View('adminView.dashboard')->with('data', $data);
    }

    public function coursesPage()
    {
        $courses = Course::all();
        return View('adminView.courses')->with('courses', $courses);
    }

    public function adminsPage()
    {
        $admins = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Admin');
        })->get();
        return View('adminView.admins')->with('admins', $admins);
    }

    public function professorsPage()
    {
        $professors = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Doctor');
        })->get();
        return View('adminView.professors')->with('professors', $professors);
    }

    public function studentsPage()
    {
        $students = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Student');
        })->get();
        return View('adminView.students')->with('students', $students);
    }
}
