<?php

namespace App\Http\Controllers\studentController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Degree;
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
            return response()->json([
                'error' => 'Course not found',
                'canRegister' => false
            ]);
        }

        $prerequisiteIds = $course->prerequisites->pluck('id');

        $passedPrerequisites = Degree::where('student_id', Auth::user()->id)
            ->whereIn('course_id', $prerequisiteIds)
            ->where('degree', '>=', 50.00)
            ->count();

        if ($passedPrerequisites === $prerequisiteIds->count()) {
            return response()->json([
                'message' => 'Student can register for this course',
                'canRegister' => true,
                'course' => $course,
                'prerequisites' => $course->prerequisites
            ]);
        }

        return response()->json([
            'message' => 'Student cannot register for this course',
            'canRegister' => false,
            'prerequisites' => $course->prerequisites
        ]);
    }
}
