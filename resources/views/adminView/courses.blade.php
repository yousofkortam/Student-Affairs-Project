@extends('layouts.adminLayout')

@section('page title')
    Courses
@endsection

@section('content')
    <div class="col-sm-7">
        <a href="/admin/add-course">Add Course</a>
    </div>
    <div class="content mt-3">






        @foreach ($courses as $course)
            <div class="col-lg-3 col-md-6">
                <a href="/courses/{{ $course->id }}">
                    <div class="card" style="
                    border: 1px solid #ccc;
                    overflow: hidden;
                    white-space: nowrap;">
                        <div class="card-body">
                            <div class="stat-widget-four">
                                <div class="stat-icon dib">
                                    <i class="ti-server text-muted"></i>
                                </div>
                                <div class="stat-content">
                                    <div class="text-left dib">
                                        <div class="stat-heading">
                                            <span
                                                style="display: inline-block;
                                    max-width: 100%;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    white-space: nowrap;">
                                                {{ $course->course_name }}
                                            </span>
                                        </div>
                                        <div class="stat-text">Dr.{{ $course->professor->user->first_name }}
                                            {{ $course->professor->user->last_name }}</div>
                                        <div class="stat-text">{{ $course->course_code }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach



    </div> <!-- .content -->
@endsection
