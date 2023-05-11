<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Professor;
use App\Models\Student;

class adminPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function dashboard()
    {
        $courses = Course::all();
        $students = Student::all();
        $professors = Professor::all();
        $data = [
            'courses' => $courses,
            'students' => $students,
            'professors' => $professors
        ];
        return View('main')->with('data', $data);
    }

    public function addCourse()
    {
        return View('admin.addCourse');
    }

    public function addProfessor()
    {
        return View('admin.addProfessor');
    }

    public function addRole()
    {
        return View('admin.addRole');
    }

    public function addDepartment()
    {
        return View('admin.addDepartment');
    }

    public function addStudent()
    {
        return View('admin.addStudent');
    }
}
