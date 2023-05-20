@extends('layouts.adminLayout')

@section('page title')
    Update professor
@endsection

@section('content')
    <form method="post" action="/admin/professor/{{$user->id}}/edit" class="form">
        @csrf
        <h3 style="text-align: center">Update Professor</h3>
        <div class="flex">
            <label>
                <input name="first_name" value="{{$user->first_name}}" required="" type="text" class="input">
                <span>First name</span>
                @error('first_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <input name="last_name" value="{{$user->last_name}}" required="" placeholder="" type="text" class="input">
                <span>Last name</span>
                @error('last_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <label>
            <input name="username" value="{{$user->username}}" required="" type="text" placeholder="" class="input">
            <span>User name</span>
            @error('username')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="email" value="{{$user->email}}" required="" placeholder="" type="email" class="input">
            <span>Email</span>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>

        <label>
            <input name="password" type="password" placeholder="" class="input">
            <span>Password</span>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>
        <div class="flex">
            <label>
                <input name="phone_number" value="{{$user->phone_number}}" required="" type="tel" placeholder="" class="input">
                <span>Phone number</span>
                @error('phone_number')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
            <label>
                <select class="form-select input" type="number" name="department_id">
                    @foreach ($departments as $dept)
                        @if ($user->professor->department->department_name == $dept->department_name)
                            <option value="{{$dept->id}}" selected>{{$dept->department_name}} {{$dept->department_code}} </option>
                        @else
                            <option value="{{$dept->id}}">{{$dept->department_name}} {{$dept->department_code}} </option>
                        @endif
                    @endforeach
                </select>
                <span>Department</span>
            </label>
        </div>
        <button type="submit" class="fancy" href="">Add doctor</button>
    </form>
@endsection


