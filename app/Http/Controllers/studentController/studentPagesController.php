<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
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
    
}
