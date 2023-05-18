@extends('layouts.adminLayout')

@section('content')
    <form id="AddStudentForm" method="POST" action="/admin/student/{{$user->id}}/edit" class="form">
        @csrf

        <h3 style="text-align: center">Update Student</h3>

        <div class="flex">
            <label>
                <input name="first_name" for="first_name" value="{{$user->first_name}}" required="" type="text" class="input">
                <span>First name</span>
            </label>

            <label>
                <input name="last_name" for="last_name" value="{{$user->last_name}}" required="" placeholder="" type="text" class="input">
                <span>Last name</span>
            </label>
        </div>

        <label>
            <input name="username" for="username" value="{{$user->username}}" required="" type="text" placeholder="" class="input">
            <span>User name</span>
        </label>

        <label>
            <input name="email" for="email" value="{{$user->email}}" required="" placeholder="" type="email" class="input">
            <span>Email</span>
        </label>

        <label>
            <input name="password" for="password" type="password" placeholder="" class="input">
            <span>Password</span>
        </label>

        <label>
            <input name="phone_number" for="phone_number" value="{{$user->phone_number}}" required="" type="tel" placeholder="" class="input">
            <span>Phone number</span>
        </label>

        <button type="submit" class="fancy" >Add student</button>
    </form>
@endsection
