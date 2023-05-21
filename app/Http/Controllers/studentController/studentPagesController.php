<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
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
        $actives = array();
        foreach ($courses as $course) {
            $st = new studentController();
            if ($st->checkIfStudentCanRegisterThisCourse($course->id)) {
                $validatedCourses[] = $course;
                $enrollment = Enrollment::where('course_id', $course->id)
                    ->where('student_id', Auth::user()->student->id)
                    ->first();
                if ($enrollment) { // true
                    $actives[] = true;
                }else { // false
                    $actives[] = false;
                }
            }
        }
        return View('studentView.courseRegister')->with([
            'courses' => $validatedCourses,
            'actives' => $actives,
        ]);
    }
}
