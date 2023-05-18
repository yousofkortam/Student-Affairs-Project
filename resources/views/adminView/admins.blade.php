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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($admins as $admin)
                                        <tr>
                                            <td> {{ $admin->first_name }} {{ $admin->last_name }} </td>
                                            <td> {{ $admin->email }} </td>
                                            <td> {{ $admin->phone_number }} </td>
                                            <td>
                                                @if ($admin->id != Auth::user()->id)
                                                    <a onclick="return confirm('Are you sure to delete {{ $admin->first_name }} {{ $admin->last_name }}')"
                                                        class="text text-danger"
                                                        href="/admin/delete-admin/{{ $admin->id }}">Delete</a>
                                                @endif
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
