@extends('layouts.adminLayout')

@section('content')
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
                                    <th>Position</th>
                                    <th>Office</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professors as $prof)
                                    <tr>
                                        <td>Dr.{{ $prof->first_name }}  {{ $prof->last_name }} </td>
                                        <td> {{ $prof->email }} </td>
                                        <td> {{ $prof->phone_number }} </td>
                                        <td>
                                            <a href="" class="text text-info">Edit</a> |
                                            <a href="" class="text text-danger" onclick="return confirm('Are you sure to delete {{ $prof->first_name }} {{ $prof->last_name }}')"> Delete</a>
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