@extends('layouts.studentLayout')

@section('page title')
    Course Register
@endsection

@section('styles')
    <link rel="stylesheet" href="/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection

@section('content')
    <div class="container">
        @foreach ($courses as $course)
            <div class="card d-block">
                <div class="d-flex">
                    <button onclick="registerCourse({{$course->id}})" style="background: none; border: none">
                        <div class="card-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                    </button>
                    <div class="card-content">
                        <h2 class="card-title">{{$course->course_name}} - {{$course->course_code}}</h2>
                        <p class="card-description"> Dr.{{$course->professor->user->first_name}} {{$course->professor->user->last_name}} {{$course->department->department_name}} </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/index.js"></script>
    <script>
        function registerCourse(courseId) {
            $.ajax({
                url: 'student/register/' + courseId,
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    alert('Course registered successfully. Course ID: ' + response.id);
                },
                error: function(xhr, status, error) {
                    console.error('Error registering course:', error);
                }
            });
        }
    </script>
@endsection
