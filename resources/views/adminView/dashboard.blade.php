@extends('layouts.adminLayout')

@section('page title')
    Admin Dashboard
@endsection

@section('content')
<div class="content mt-3">


    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">{{count($data['courses'])}}</span>
                </h4>
                <p class="text-light">Number of courses</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                
                <h4 class="mb-0">
                    <span class="count">{{count($data['professors'])}}</span>
                </h4>
                <p class="text-light">Number of professors</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                
                <h4 class="mb-0">
                    <span class="count">{{count($data['students'])}}</span>
                </h4>
                <p class="text-light">Number of students</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                
                <h4 class="mb-0">
                    <span class="count">{{count($data['roles'])}}</span>
                </h4>
                <p class="text-light">Number of roles</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>

    <a href="https://www.facebook.com/profile.php?id=100063596096736" target="_blank">
        <div class="col-lg-3 col-md-6">
            <div class="social-box facebook">
                <i class="fa fa-facebook"></i>
                <ul>
                    <li>
                        <span class="count">4.9</span> k
                        <span>friends</span>
                    </li>
                    <li>
                        <span class="count">450</span>
                        <span>feeds</span>
                    </li>
                </ul>
            </div>
        </div>
    </a>


    <a href="">
        <div class="col-lg-3 col-md-6">
            <div class="social-box twitter">
                <i class="fa fa-twitter"></i>
                <ul>
                    <li>
                        <span class="count">30</span> k
                        <span>friends</span>
                    </li>
                    <li>
                        <span class="count">450</span>
                        <span>tweets</span>
                    </li>
                </ul>
            </div>
        </div>
    </a>

    <a href="">
        <div class="col-lg-3 col-md-6">
            <div class="social-box instagram">
                <i class="fa fa-instagram"></i>
                <ul>
                    <li>
                        <span class="count">10</span> k
                        <span>friends</span>
                    </li>
                    <li>
                        <span class="count">450</span>
                        <span>tweets</span>
                    </li>
                </ul>
            </div>
        </div>
    </a>


    <a href="">
        <div class="col-lg-3 col-md-6">
            <div class="social-box linkedin">
                <i class="fa fa-linkedin"></i>
                <ul>
                    <li>
                        <span class="count">40</span> +
                        <span>contacts</span>
                    </li>
                    <li>
                        <span class="count">250</span>
                        <span>feeds</span>
                    </li>
                </ul>
            </div>
        </div>
    </a>


    

    


</div>
@endsection