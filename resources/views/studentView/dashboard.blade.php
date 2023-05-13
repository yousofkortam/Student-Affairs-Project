@extends('layouts.studentLayout')

@section('content')
<div class="content mt-3">


    @foreach ($courses as $course)
    <div class="col-lg-3 col-md-6">
        <a href="/courses/{{$course->id}}" style="color: black">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-four">
                        <div class="stat-icon dib">
                            <i class="ti-server text-muted"></i>
                        </div>
                        <div class="stat-content">
                            <div class="text-left dib">
                                <div class="stat-heading">{{ $course->course_name }}</div>
                                <div class="stat-text">Dr.{{ $course->professor->user->first_name }} {{ $course->professor->user->last_name }}</div>
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