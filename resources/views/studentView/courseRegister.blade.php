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
            @for ($i = 0; $i < count($courses); $i++)
                <div class="card d-block">
                    <div class="d-flex">
                        <a onclick="@if($actives[$i])deleteRegisteredCourse({{$courses[$i]->id}})@else registerCourse({{$courses[$i]->id}})@endif"
                            style="background: none; border: none">
                            <div
                                class="card-icon @if ($actives[$i]) active @endif">
                                <i class="fas fa-plus"></i>
                            </div>
                        </a>
                        <div class="card-content">
                            <h2 class="card-title">{{ $courses[$i]->course_name }} - {{ $courses[$i]->course_code }}</h2>
                            <p class="card-description"> Dr.{{ $courses[$i]->professor->user->first_name }}
                                {{ $courses[$i]->professor->user->last_name }}
                                {{ $courses[$i]->department->department_name }} </p>
                        </div>
                    </div>
                </div>
            @endfor
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/index.js"></script>
    <script>
        function registerCourse(courseId) {
            $.ajax({
                url: '/student/register',
                type: 'POST',
                dataType: 'json',
                data: {
                    courseId: courseId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error registering course:');
                }
            });
        }

        function deleteRegisteredCourse(courseId) {
            $.ajax({
                url: '/student/delete-register',
                type: 'POST',
                dataType: 'json',
                data: {
                    courseId: courseId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Error unregistering course:');
                }
            });
        }
    </script>
@endsection
