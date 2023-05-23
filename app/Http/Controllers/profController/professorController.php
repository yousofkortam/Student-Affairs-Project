<?php

namespace App\Http\Controllers\profController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Lecture;
use App\Models\Assignment;
use App\Models\Degree;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class professorController extends Controller
{
    public function __construct()
    {
        $this->middleware('professor');
    }

    public function addLecture(Request $request, $courseId)
    {

        $validatedData = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'file_path' => 'required|file',
        ]);

        if ($validatedData->fails()) {
            return redirect('/courses' . '/' . $courseId . '/add-lecture')
                ->withErrors($validatedData);
        }


        // Find course
        $course = Course::find($courseId);

        if (!$course) {
            return redirect('/courses' . '/' . $courseId . '/add-lecture');
        }

        $file = $request->file('file_path');
        $lecture_name = $file->getClientOriginalName();
        $updated_lecture_name = time() . '_' . $lecture_name;
        $file->move('lectures', $updated_lecture_name);

        // Createlecture
        $lecture = new Lecture();
        $lecture->course_id = $courseId;
        $lecture->title = $request->input('title');
        $lecture->description = $request->input('description');
        $lecture->file_path = $updated_lecture_name;

        // Associate the lecture with the course
        $lecture->save();

        return redirect('/courses' . '/' . $courseId . '/lectures');
    }

    public function addAssignment(Request $request, $courseId)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'due_date' => 'required|date',
        ]);

        // Find the specified course
        $course = Course::findOrFail($courseId);

        // Create a new assignment
        $assignment = new Assignment();
        $assignment->title = $request->input('title');
        $assignment->description = $request->input('description');

        // Associate the assignment with the course
        $course->assignments()->save($assignment);

        return response()->json(['message' => 'Assignment added successfully']);
    }

    public function showStudents($courseId)
    {
        // Find the specified course with its students
        $course = Course::with('students')->findOrFail($courseId);

        // Return the list of students
        return response()->json(['students' => $course->students]);
    }

    public function dashboard()
    {
        $courses = Auth::user()->professor->courses;
        return view('professorView.dashboard')->with([
            'courses' => $courses,
        ]);
    }

    public function coursesPage()
    {
        $courses = Auth::user()->professor->courses;
        return view('professorView.courses')->with([
            'courses' => $courses,
        ]);
    }

    public function department()
    {
        $departments = Department::all();
        return view('professorView.departments')->with([
            'departments' => $departments,
        ]);
    }

    public function courseStudents($courseId)
    {
        $course = Course::find($courseId);
        if (!$course) {
            return redirect('/courses' . '/' . $courseId);
        }
        $students = $course->students;
        return view('professorView.students')->with([
            'students' => $students,
            'course' => $course,
        ]);
    }

    public function addMark(Request $request)
    {
        $courseId = $request->input('courseID');
        $studentId = $request->input('studentID');
        $mark = $request->input('degree');

        try {
            $degree = Degree::where('student_id', $studentId)->where('course_id', $courseId)->first();
            if ($degree) {
                return response()->json([
                    'message' => 'Student mark already exists',
                ], 404);
            }

            $Degree = new Degree();
            $Degree->course_id = $courseId;
            $Degree->student_id = $studentId;
            $Degree->degree = $mark;
            $Degree->save();

            return response()->json([
                'message' => 'Mark added successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while adding the mark.',
            ], 500);
        }
    }

    public function editMark(Request $request)
    {
        $courseId = $request->input('courseID');
        $studentId = $request->input('studentID');
        $mark = $request->input('degree');

        try {
            $degree = Degree::where('student_id', $studentId)->where('course_id', $courseId)->first();
            if (!$degree) {
                return response()->json([
                    'message' => 'Please add mark first',
                ], 404);
            }

            $degree->degree = $mark;

            $degree->save();

            return response()->json([
                'message' => 'Mark edited successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'An error occurred while editing the mark.',
            ], 500);
        }
    }


    public function addLec($id)
    {
        return View('professorView.addLecture')->with([
            'courseId' => $id,
        ]);
    }
}
