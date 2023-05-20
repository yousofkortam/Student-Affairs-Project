@extends('layouts.adminLayout')

@section('page title')
    Add Department
@endsection

@section('content')
    <form method="POST" action="{{ url('/admin/add-dept') }}" class="form">

        <h3 style="text-align: center">Add Department</h3>

        <div class="flex">
            <label>
                <input name="department_name" required="" type="text" class="input">
                <span>Name</span>
            </label>

            <label>
                <input name="department_code" required="" placeholder="" type="text" class="input">
                <span>Code</span>
            </label>
        </div>



        <button type="submit" class="fancy" href="#">ِAdd dpet</button>
    </form>
@endsection
