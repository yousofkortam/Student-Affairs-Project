@extends('layouts.adminLayout')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                        <button class="btn btn-primary">Add admin</button>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td> {{ $admin->first_name }} {{ $admin->last_name }} </td>
                                        <td> {{ $admin->email }} </td>
                                        <td> {{ $admin->phone_number }} </td>
                                        <td>
                                            <a href="" class="text text-info">Edit</a> |
                                            <a href="" class="text text-danger" onclick="return confirm('Are you sure to delete {{ $admin->first_name }} {{ $admin->last_name }}')"> Delete</a>
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