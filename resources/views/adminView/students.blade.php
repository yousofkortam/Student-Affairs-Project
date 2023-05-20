@extends('layouts.adminLayout')

@section('page title')
    Students
@endsection

@section('content')
    <div class="col-sm-7">
        <a href="/admin/add-student">Add Student</a>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>

                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Phone number</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 100;
                                    ?>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>200{{ $c++ }}</td>
                                            <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->username }}</td>
                                            <td>{{ $student->phone_number }}</td>
                                            <td>
                                                <a class="text text-info" href="/admin/student/{{$student->id}}/edit" >Edit</a>
                                                |
                                                <a onclick="return confirm('Are you sure to delete {{ $student->first_name }} {{ $student->last_name }}')" class="text text-danger" href="/admin/delete-student/{{ $student->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
