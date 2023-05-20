@extends('layouts.studentLayout')

@section('page title')
    Student Dashboard
@endsection


@section('content')
    <div class="content mt-3">


        @if (count($courses) > 0)
            @foreach ($courses as $course)
                <div class="col-lg-3 col-md-6">
                    <a href="/courses/{{ $course->id }}" style="color: black">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-four">
                                    <div class="stat-icon dib">
                                        <i class="ti-server text-muted"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">{{ $course->course_name }}</div>
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
        @else
            <div class="container">
                <div class="card">
                    <h1 class="text-center">Currently, there are no courses available</h1>
                    <p style="text-align: center">Thank you for your interest. If course registrations become available in the future, I encourage you to stay updated with the appropriate channels, such as the educational institution's official website or communication channels. By regularly checking those sources, you will be notified when registration opens and have the opportunity to enroll in courses of your choice.</p>
                </div>
            </div>
        @endif

    </div> <!-- .content -->
@endsection
