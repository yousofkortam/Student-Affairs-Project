@extends('layouts.adminLayout')

@section('content')
<form method="post" action="{{url('/admin/add-new-doctor')}}" class="form">
    <h3 style="text-align: center">Add Professor</h3>
    <div class="flex">
        <label>
            <input name="first_name" required="" type="text" class="input">
            <span>First name</span>
        </label>

        <label>
            <input name="last_name" required="" placeholder="" type="text" class="input">
            <span>Last name</span>
        </label>
    </div>  
          
    <label>
        <input name="username" required="" type="text" placeholder="" class="input">
        <span>User name</span>
    </label>

    <label>
        <input name="email" required="" placeholder="" type="email" class="input">
        <span>Email</span>
    </label> 
    
    <label>
        <input name="password" required="" type="password" placeholder="" class="input">
        <span>Password</span>
    </label>
    <div class="flex">
        <label>
            <input name="phone_number" required="" type="tel" placeholder="" class="input">
            <span>Phone number</span>
        </label>
        <label>
            <select class="form-select input" type="number" name="department_id">
                @foreach ($departments as $dept)
                    <option value="{{$dept->id}}">{{$dept->department_name}} {{$dept->department_code}} </option>
                @endforeach
              </select>
            {{-- <input name="department-id" required="" type="number" placeholder="" class="input"> --}}
            <span>Department</span>
        </label>
    </div>
     <button type="submit" class="fancy" href="">Add doctor</button>
</form>
@endsection