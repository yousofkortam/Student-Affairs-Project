<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\Professor;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
     /**
     * Store a newly created department in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addDepartment(Request $request)
    {
        $validatedData = $request->validate([
            'department_name' => 'required|string|max:255',
            'department_code' => 'required|string|max:10|unique:departments',
        ]);
    
        $department = Department::create($validatedData);
    
        return response()->json([
            'message' => 'Department created successfully',
            'department' => $department,
        ], 201);
    }

    public function addCourse(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'course_code' => 'required|string|max:255|unique:courses',
            'course_name' => 'required|string|max:255',
            'department_id' => 'required',
            'professor_id' => 'required|int',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        $course = new Course();
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->department_id = $request->input('department_id');
        $course->professor_id = $request->input('professor_id');

        $course->save();

        return response()->json([
            'message' => 'Course added successfully',
            'course' => $course,
        ], 201);
    }

    public function addRole(Request $request)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|string|max:255|unique:roles',
        ]);

        $role = new Role();
        $role->role_name = $validatedData['role_name'];

        $role->save();

        return response()->json([
            'message' => 'Role created successfully',
            'role' => $role,
        ], 201);
    }

    public function addStudent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $student = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role_id' => 1
        ]);


        $st = new Student();
        $st->user_id = $student->id;
        $st->enrollment_date = $student->created_at;

        $st->save();

        return response()->json([
            'message' => 'Student created successfully',
            'student' => $student,
        ], 201);
    }

    public function addDoctor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|min:10',
            'department_id' => 'required|int'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $doctor = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role_id' => 2,
        ]);

        $doc = new Professor();
        $doc->user_id = $doctor->id;
        $doc->department_id = $request->input('department_id');
        $doc->hire_date = $doctor->created_at;

        $doc->save();

        return response()->json([
            'message' => 'Doctor created successfully',
            'student' => $doctor,
        ], 201);
    }
}

