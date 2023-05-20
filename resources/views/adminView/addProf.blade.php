@extends('layouts.adminLayout')

@section('page title')
    Add Professor
@endsection

@section('content')
    <form method="post" action="{{ url('/admin/add-new-doctor') }}" class="form">
        <h3 style="text-align: center">Add Professor</h3>
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
            <input name="email" required="" value="{{ old('email') }}" placeholder="" type="email" class="input">
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
        <div class="flex">
            <label>
                <input name="phone_number" value="{{ old('phone_number') }}" required="" type="tel" placeholder=""
                    class="input">
                <span>Phone number</span>
                @error('phone_number')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
            <label>
                <select class="form-select input" type="number" name="department_id">
                    @foreach ($departments as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->department_name }} {{ $dept->department_code }}
                        </option>
                    @endforeach
                </select>
                {{-- <input name="department-id" required="" type="number" placeholder="" class="input"> --}}
                <span>Department</span>
            </label>
        </div>
        <button type="submit" class="fancy" href="">Add doctor</button>
    </form>
@endsection
