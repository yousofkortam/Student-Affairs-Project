@extends('layouts.adminLayout')

@section('page title')
    Add Student
@endsection

@section('content')
    <form id="AddStudentForm" method="POST" action="{{ url('/admin/add-new-student') }}" class="form">
        @csrf

        <h3 style="text-align: center">Add Student</h3>

        <div class="flex">
            <label>
                <input name="first_name" for="first_name" value="{{ old('first_name') }}" required="" type="text"
                    class="input">
                <span>First name</span>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <input name="last_name" for="last_name" required="" value="{{ old('last_name') }}" placeholder=""
                    type="text" class="input">
                <span>Last name</span>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <label>
            <input name="username" for="username" required="" value="{{ old('username') }}" type="text" placeholder=""
                class="input">
            <span>User name</span>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="email" for="email" required="" placeholder="" value="{{ old('email') }}" type="email"
                class="input">
            <span>Email</span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="password" for="password" required="" type="password" placeholder="" class="input">
            <span>Password</span>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="phone_number" for="phone_number" value="{{ old('phone_number') }}" required="" type="tel"
                placeholder="" class="input">
            <span>Phone number</span>
            @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <button type="submit" class="fancy">Add student</button>
    </form>
@endsection
