
@extends('layouts.studentLayout')

@section('styles')
<link rel="stylesheet" href="/lec.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection

@section('content')
<div class="container">
    @foreach ($lectures as $lecture)
    <a href="/lectures/{{$lecture->file_path}}" class="card-link" target="_blank">
        <div class="card">
          <div class="card-icon">
            <i class="fas fa-file-pdf"></i>
          </div>
          <div class="card-body">
            <h5 class="card-title">{{$lecture->title}}</h5>
            <p class="card-text">{{$lecture->description}}</p>
          </div>
        </div>
      </a>
    @endforeach
  </div>
@endsection