@extends('layouts.studentLayout')

@section('page title')
    Add Lecture
@endsection

@section('content')
    <form method="post" action="/courses/{{$courseId}}/add-lecture" class="form" enctype="multipart/form-data">
        @csrf
        <h3 style="text-align: center">Add Lecutre</h3>
        <div class="flex">
            <label>
                <input name="title" value="{{ old('title') }}" required="" type="text" class="input">
                <span>Title</span>
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <input name="description" value="{{ old('description') }}" required="" placeholder="" type="text"
                    class="input">
                <span>Description</span>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </label>
        </div>

        <label>
            <input name="file_path" required="" type="file" placeholder="" class="input">
            {{-- <span>Lecture file</span> --}}
            @error('file_path')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </label>


        <button type="submit" class="fancy" href="">Add Lecture</button>
    </form>
@endsection
