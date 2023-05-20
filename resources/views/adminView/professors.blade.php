@extends('layouts.adminLayout')

@section('page title')
    Professors
@endsection

@section('content')
    <div class="col-sm-7">
        <a href="/admin/add-professor">Add Professor</a>
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
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $c = 1;
                                    ?>
                                    @foreach ($professors as $prof)
                                        <tr>
                                            <td>{{ $c++ }}</td>
                                            <td>Dr.{{ $prof->first_name }} {{ $prof->last_name }}</td>
                                            <td>{{ $prof->email }}</td>
                                            <td>{{ $prof->username }}</td>
                                            <td>{{ $prof->phone_number }}</td>

                                            <td>
                                                <a class="text text-info"
                                                    href="/admin/professor/{{ $prof->id }}/edit">Edit</a>
                                                    |
                                                <a onclick="return confirm('Are you sure to delete Dr.{{ $prof->first_name }}  {{ $prof->last_name }}')"
                                                    class="text text-danger"
                                                    href="/admin/delete-professor/{{ $prof->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection
