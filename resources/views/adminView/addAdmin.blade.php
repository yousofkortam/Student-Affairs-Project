@extends('layouts.adminLayout')

@section('page title')
    Add Administrator
@endsection

@section('content')
    <form id="AddStudentForm" method="POST" action="{{ url('/admin/add-new-admin') }}" class="form">
        @csrf

        <h3 style="text-align: center">Add Administrator</h3>

        <div class="flex">
            <label>
                <input name="first_name" value="{{ old('first_name') }}" required="" type="text" class="input">
                <span>First name</span>
                @error('first_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror

            </label>

            <label>
                <input name="last_name" value="{{ old('last_name') }}" required="" placeholder="" type="text"
                    class="input">
                <span>Last name</span>
                @error('last_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <label>
            <input name="username" value="{{ old('username') }}" required="" type="text" placeholder=""
                class="input">
            <span>User name</span>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="email" value="{{ old('email') }}" required="" placeholder="" type="email" class="input">
            <span>Email</span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="password" required="" type="password" placeholder="" class="input">
            <span>Password</span>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="phone_number" value="{{ old('phone_number') }}" required="" type="tel" placeholder=""
                class="input">
            <span>Phone number</span>
            @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <button type="submit" class="fancy" href="#">Add Admin</button>
    </form>
@endsection
