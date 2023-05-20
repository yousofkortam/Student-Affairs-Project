@extends('layouts.profLayout')

@section('page title')
    Professor Dashboard
@endsection

@section('content')
    <div class="content mt-3">




        @foreach ($courses as $course)
            <a href="/courses/{{$course->id}}">
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-white bg-flat-color-1">
                        <div class="card-body pb-0">
                            <h4 class="mb-0">
                                <span>{{ $course->course_name }} - {{ $course->course_code }}</span>
                            </h4>
                            <p class="text-light">{{ $course->department->department_name }}</p>
    
                            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach







    </div>
@endsection
