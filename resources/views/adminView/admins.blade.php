@extends('layouts.adminLayout')

@section('content')
    <div class="col-sm-7">
        <a href="/admin/add-admin">Add Administrator</a>
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
                                    $c = 1;
                                    ?>
                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td>{{ $c++ }}</td>
                                            <td>{{ $admin->first_name }} {{ $admin->first_name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td>{{ $admin->username }}</td>
                                            <td>{{ $admin->phone_number }}</td>
                                            <td>
                                                @if (Auth::user()->id != $admin->id)
                                                    <a onclick="return confirm('Are you sure to delete Dr.{{ $admin->first_name }}  {{ $admin->last_name }}')"
                                                        class="text text-danger"
                                                        href="/admin/delete-admin/{{ $admin->id }}">Delete</a>
                                                @endif
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
