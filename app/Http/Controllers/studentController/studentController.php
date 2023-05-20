<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Degree;
use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('student');
    }

    public function checkIfStudentCanRegisterThisCourse($courseId)
    {
        $course = Course::with('prerequisites')->find($courseId);

        if (!$course) {
            return false;
        }

        $prerequisiteIds = $course->prerequisites->pluck('id');

        $passedPrerequisites = Degree::where('student_id', Auth::user()->id)
            ->whereIn('course_id', $prerequisiteIds)
            ->where('degree', '>=', 50.00)
            ->count();

        if ($passedPrerequisites === $prerequisiteIds->count()) {
            return true;
        }

        return false;
    }

    public function courseReg(Request $request)
    {
        $courseId = $request->input('courseId');

        $enrollment = new Enrollment();
        $enrollment->course_id = $courseId;
        $enrollment->student_id = Auth::user()->id;

        $enrollment->save();

        // Return a response indicating success
        return response()->json(['message' => 'Course enrolled successfully']);
    }
}