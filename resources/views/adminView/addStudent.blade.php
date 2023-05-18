@extends('layouts.adminLayout')

@section('content')
    <form id="AddStudentForm" method="POST" action="{{ url('/admin/add-new-student') }}" class="form">
        @csrf

        <h3 style="text-align: center">Add Student</h3>

        <div class="flex">
            <label>
                <input name="first_name" for="first_name" required="" type="text" class="input">
                <span>First name</span>
            </label>

            <label>
                <input name="last_name" for="last_name" required="" placeholder="" type="text" class="input">
                <span>Last name</span>
            </label>
        </div>

        <label>
            <input name="username" for="username" required="" type="text" placeholder="" class="input">
            <span>User name</span>
        </label>

        <label>
            <input name="email" for="email" required="" placeholder="" type="email" class="input">
            <span>Email</span>
        </label>

        <label>
            <input name="password" for="password" required="" type="password" placeholder="" class="input">
            <span>Password</span>
        </label>

        <label>
            <input name="phone_number" for="phone_number" required="" type="tel" placeholder="" class="input">
            <span>Phone number</span>
        </label>

        <button type="submit" class="fancy" href="#">Add student</button>
    </form>
@endsection
