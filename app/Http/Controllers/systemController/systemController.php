<?php

namespace App\Http\Controllers\systemController;

use App\Http\Controllers\Controller;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class systemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password', 'role_id');

        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role->role_name;
            if ($role == "Admin") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/admin/dashboard'
                ]);
            }else if ($role == "Doctor") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/professor/dashboard',
                ]);
            }else if ($role == "Student") {
                return response()->json([
                    'message' => 'Login successful',
                    'redirect' => '/student/dashboard',
                ]);
            }
        }

        return response()->json([
            'message' => 'Incorrect email or password'
        ],
         401);
    }

    public function details($courseId)
    {
        if (Auth::user()->role->role_name == "Student") {
            $courses = Auth::user()->student->courses;
            if (!$courses->find($courseId)) {
                return redirect('/student/dashboard');
            }
        }

        if (Auth::user()->role->role_name == "Doctor") {
            $courses = Auth::user()->professor->courses;
            if (!$courses->find($courseId)) {
                return redirect('/professor/dashboard');
            }
        }
        $course = Course::find($courseId);
        $pre = $course->prerequisites;
        $degree = Degree::where('student_id', Auth::user()->id)->where('course_id', $courseId)->get();
        return View('courseDetails')->with([
            'user_id' => Auth::user()->id,
            'course' => $course,
            'pre' => $pre,
            'degree' => $degree
        ]);
    }

    public function lectures($id)
    {
        if (Auth::user()->role->role_name == "Student") {
            $courses = Auth::user()->student->courses;
            if (!$courses->find($id)) {
                return redirect('/student/dashboard');
            }
        }

        if (Auth::user()->role->role_name == "Doctor") {
            $courses = Auth::user()->professor->courses;
            if (!$courses->find($id)) {
                return redirect('/professor/dashboard');
            }
        }
        $lectures = Lecture::where('course_id', $id)->get();
        return View('lectures')->with([
            'lectures' => $lectures,
            'course id' => $id,
        ]);
    }

    public function assignments($id)
    {
        if (Auth::user()->role->role_name == "Student") {
            $courses = Auth::user()->student->courses;
            if (!$courses->find($id)) {
                return redirect('/student/dashboard');
            }
        }

        if (Auth::user()->role->role_name == "Doctor") {
            $courses = Auth::user()->professor->courses;
            if (!$courses->find($id)) {
                return redirect('/professor/dashboard');
            }
        }

        $assignments = Assignment::where('course_id', $id)->get();

        return View('assignment')->with([
            'assignments' => $assignments,
        ]);
    }

    public function viewLecture($lec_name)
    {
        return view('lectureView')->with([
            'lec_name' => $lec_name,
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
