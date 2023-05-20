<?php

    namespace App\Http\Controllers\profController;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\Course;
    use App\Models\Lecture;
    use App\Models\Assignment;

class professorController extends Controller
{
    public function __construct()
    {
        $this->middleware('professor');
    }

    public function addLecture(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file_path' => 'required|string',
        ]);

        // Find  course
        $course = Course::find($courseId);

        if (!$course) {
            return response()->json([
                'message' => 'course not found'
            ]);
        }

        $file = $request->file('file_path');
        $lecture_name = $file->getClientOriginalName();
        $updated_lecture_name = time() . '_' . $lecture_name;
        $file->move('lectures', $updated_lecture_name);

        // Createlecture
        $lecture = new Lecture();
        $lecture->couse_id = $courseId;
        $lecture->title = $request->input('title');
        $lecture->description = $request->input('description');
        $lecture->file_path = $updated_lecture_name;
        
        // Associate the lecture with the course
        $lecture->save();

        return response()->json(['message' => 'Lecture added successfully']);
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
}
