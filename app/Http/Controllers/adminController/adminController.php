<?php

namespace App\Http\Controllers\adminController;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Department;
use App\Models\isCourseRegisterActive;
use App\Models\Prerequisite;
use App\Models\Professor;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class adminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function activeCourses()
    {
        isCourseRegisterActive::where('id', 1)
            ->update(['isActive' => 1]);
        return response()->json([
            'message' => 'Course registration is active now'
        ]);
    }
    // Done 😎
    public function deactiveCourses()
    {
        isCourseRegisterActive::where('id', 1)
            ->update(['isActive' => 0]);
        return response()->json([
            'message' => 'Course registration is not active now'
        ]);
    }

    public function addDepartment(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'department_name' => 'required|string|max:255',
            'department_code' => 'required|string|max:10|unique:departments',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        $department = new Department();
        $department->department_code = $request->input('department_code');
        $department->department_name = $request->input('department_name');

        $department->save();

        // return response()->json([
        //     'message' => 'Department created successfully',
        //     'department' => $department,
        // ], 201);

        return redirect('/admin/departments');
    }

    public function addCourse(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'course_code' => 'required|string|max:255|unique:courses',
            'course_name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            'professor_id' => 'required|int|exists:professors,id',
            'prerequisites' => 'nullable|array',
            'prerequisites.*' => 'exists:courses,id',
        ]);

        if ($validatedData->fails()) {
            return redirect('/admin/add-course')
            ->withErrors($validatedData)
            ->withInput();
        }

        $course = new Course();
        $course->course_code = $request->input('course_code');
        $course->course_name = $request->input('course_name');
        $course->department_id = $request->input('department_id');
        $course->professor_id = $request->input('professor_id');

        $course->save();

        if ($request->has('prerequisites') && is_array($request->input('prerequisites'))) {
            foreach ($request->input('prerequisites') as $pre_course_id) {
                $prerequisite = new Prerequisite();
                $prerequisite->course_id = $course->id;
                $prerequisite->prerequisite_id = $pre_course_id;

                $prerequisite->save();
            }
        }

        // return response()->json([
        //     'message' => 'Course added successfully',
        //     'course' => $course,
        //     'prerequiesties' => $course->prerequisites,
        // ], 201);

        return redirect('/admin/courses');
    }

    public function addRole(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'role_name' => 'required|string|max:255|unique:roles',
        ]);

        if ($validatedData->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validatedData->errors(),
            ], 422);
        }

        $role = new Role();
        $role->role_name = $request->input('role_name');

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
            return redirect('/admin/add-student')
            ->withErrors($validator)
            ->withInput();
        }

        $role = Role::where('role_name', 'Student')->first();

        $student = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role_id' => $role->id
        ]);


        $st = new Student();
        $st->user_id = $student->id;
        $st->enrollment_date = $student->created_at;

        $st->save();

        // return response()->json([
        //     'message' => 'Student created successfully',
        //     'student' => $student,
        //     'redirect' => '/admin/students'
        // ], 201);

        return redirect('/admin/students');
    }

    public function deleteStudent($id)
    {

        $student = Student::where('user_id', $id)->first();
        if ($student) {
            $student->delete();
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect('/admin/students');
    }

    public function updateStudent(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'Student not found'
            ]);
        }

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/student/' . $id . '/edit')
            ->withErrors($validator)
            ->withInput();
        }

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->phone_number = $request->input('phone_number');
        $user->save();

        // return response()->json([
        //     'message' => 'Student updated successfully',
        //     'user' => $user
        // ]);
        return redirect('/admin/students');
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
            return redirect('/admin/add-professor')
            ->withErrors($validator)
            ->withInput();
        }

        $role = Role::where('role_name', 'Doctor')->first();

        $doctor = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role_id' => $role->id,
        ]);

        $doc = new Professor();
        $doc->user_id = $doctor->id;
        $doc->department_id = $request->input('department_id');
        $doc->hire_date = $doctor->created_at;

        $doc->save();

        // return response()->json([
        //     'message' => 'Doctor created successfully',
        //     'student' => $doctor,
        // ], 201);

        return redirect('/admin/professors');
    }

    public function updateDoctor(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|min:5|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|unique:users,username,' . $id . '|min:3',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'phone_number' => 'required|string|min:10',
            'department_id' => 'required|int'
        ]);

        if ($validator->fails()) {
            return redirect('/admin/professor/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput();
        }

        $userData = $validator->validated();
        if ($request->has('password')) {
            $userData['password'] = bcrypt($request->input('password'));
        }

        $user->update($userData);

        $professor = Professor::where('user_id', $id)->first();
        $professor->department_id = $userData['department_id'];
        $professor->save();

        return redirect('/admin/professors');
    }

    public function deleteProf($id)
    {

        $prof = Professor::where('user_id', $id)->first();
        if ($prof) {
            $prof->delete();
        }
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect('/admin/professors');
    }

    public function addAdmin(Request $request)
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
            return redirect('/admin/add-admin')
            ->withErrors($validator)
            ->withInput();
        }

        $role = Role::where('role_name', 'Admin')->first();

        $admin = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone_number' => $request->input('phone_number'),
            'role_id' => $role->id
        ]);

        // return response()->json([
        //     'message' => 'Student created successfully',
        //     'student' => $student,
        // ], 201);

        return redirect('/admin/adminstrators');
    }

    public function deleteAdmin($id)
    {

        $user = User::find($id);
        if ($user) {
            $user->delete();
        }
        return redirect('/admin/adminstrators');
    }
}
