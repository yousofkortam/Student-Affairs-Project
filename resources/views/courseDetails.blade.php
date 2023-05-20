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
                <h1>Lectures</h1>
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
                <h1>Assignments</h1>
                <p>Click here to see the assignments.</p>
            </div>
        </a>

    </div>
@endsection