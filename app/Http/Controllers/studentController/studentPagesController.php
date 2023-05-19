<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class studentPagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('student');
    }

    public function dashboard()
    {
        $courses = Auth::user()->student->courses;
        return View('studentView.dashboard')->with('courses', $courses);
    }

    public function courseRegister()
    {
        $courses = Course::all();
        $validatedCourses = array();
        foreach($courses as $course) 
        {
            $st = new studentController();
            if ($st->checkIfStudentCanRegisterThisCourse($course->id)) {
                $validatedCourses[] = $course;
            }
        }
        return View('studentView.courseRegister')->with([
            'courses' => $validatedCourses,
        ]);
    }
    
}
