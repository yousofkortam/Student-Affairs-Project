@extends('layouts.profLayout')

@section('page title')
    Courses
@endsection

@section('content')
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
                                        <div class="stat-text">
                                            @if (Auth::user()->professor->id == $course->professor_id)
                                                Professor : You
                                            @endif
                                        </div>
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
