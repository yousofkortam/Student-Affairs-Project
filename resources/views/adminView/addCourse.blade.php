@extends('layouts.adminLayout')

@section('content')
    <form method="post" action="{{ url('/admin/add-new-course') }}" class="form">
        <h3 style="text-align: center">Add Course</h3>
        <div class="flex">
            <label>
                <input name="course_name" value="{{ old('course_name') }}" required="" type="text" class="input">
                <span>Name</span>
                @error('course_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <input name="course_code" value="{{ old('course_code') }}" required="" placeholder="" type="text"
                    class="input">
                <span>Code</span>
                @error('course_code')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
        </div>
        <label>
            <select class="form-select input" type="number" name="department_id">
                @foreach ($data['depts'] as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->department_name }}</option>
                @endforeach
            </select>
            {{-- <input name="department-id" required="" type="number" placeholder="" class="input"> --}}
            <span>Department</span>
        </label>
        <label>
            <select class="form-select input" type="number" name="professor_id">
                @foreach ($data['profs'] as $prof)
                    <option value="{{ $prof->id }}">Dr.{{ $prof->user->first_name }} {{ $prof->user->last_name }}
                    </option>
                @endforeach
            </select>
            <span>Professor</span>
        </label>
        <div class="d-flex">
            <label>
                <select class="selectpicker" name="prerequisites[]" multiple aria-label="size 3 select example">
                    @foreach ($data['courses'] as $course)
                        <option value="{{ $course->id }}">{{ $course->course_name }} - {{ $course->course_code }}
                        </option>
                    @endforeach
                </select>
            </label>
            <span>Prerequiestes</span>
        </div>
        <button type="submit" class="fancy" href="">Add course</button>
    </form>
@endsection
