@extends('layouts.adminLayout')

@section('content')
<div class="col-sm-7">
    <a href="/admin/add-department">Add Department</a>
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                @foreach ($departments as $dept)
                                    <tr>
                                        <td> {{ $dept->id }}</td>
                                        <td> {{ $dept->department_name }} </td>
                                        <td> {{ $dept->department_code }} </td>
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