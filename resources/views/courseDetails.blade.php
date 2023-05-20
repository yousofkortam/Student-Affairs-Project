@extends('layouts.studentLayout')


@section('page title')
    {{$course->course_name}} | Details
@endsection

@section('styles')
    <link rel="stylesheet" href="/csdetail.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-inner">
                <h1>{{ $course->course_name }}</h1>
                <p>{{ $course->course_code }}</p>
                <p>Dr.{{ $course->professor->user->first_name }} {{ $course->professor->user->last_name }}</p>
            </div>
        </div>
        <a href="/courses/{{$course->id}}/lectures" class="card">
            <div class="card-icon">
                <div class="card-icon pdf">
                    <i class="fas fa-file-pdf"></i>
                </div>
            </div>
            <div class="card-inner">
                <h1 style="color: black">Lectures</h1>
                <p>Click here to see the lectures.</p>
            </div>
        </a>

        <a href="/courses/{{$course->id}}/assignments" class="card">
            <div class="card-icon">
                <div class="card-icon exam">
                    <i class="fas fa-book"></i>
                </div>
            </div>
            <div class="card-inner">
                <h1 style="color: black">Assignments</h1>
                <p>Click here to see the assignments.</p>
            </div>
        </a>

        @if (Auth::user()->role->role_name == "Doctor")

        <div class="card">
            <div class="card-icon">
                <div class="card-icon exam">
                    <i class="fas fa-plus"></i>
                </div>
            </div>
            <div class="card-inner">
                <h1 style="color: black"> <a href="">Add Lecture</a> </h1>
                <p>Click here to add lecture.</p>
                <h1 style="color: black"><a href="https://docs.google.com/forms/u/0/?tgif=d" target="_blank">Add Assignment</a></h1>
                <p>Click here to add assignments.</p>
            </div>
        </div>


        <a href="/courses/{{$course->id}}/students" class="card">
            <div class="card-icon">
                <div class="card-icon pdf">
                    <i class="fas fa-user-graduate"></i>
                </div>
            </div>
            <div class="card-inner">
                <h1 style="color: black">Students</h1>
                <p>Click here to see the students registered in this course.</p>
            </div>
        </a>

        
        @endif

    </div>
@endsection