@extends('layouts.studentLayout')

@section('page title')
@if (count($lectures) > 0)
{{ $lectures[0]->course->course_name }} |
@endif
Lectures
@endsection

@section('styles')
<link rel="stylesheet" href="/lec.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
@endsection

@section('content')
<div class="container">
    @foreach ($lectures as $lecture)
    <a href="/lectures/{{ $lecture->file_path }}" class="card-link" target="_blank">
        <div class="card">
            <div class="card-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <div class="card-body">
                <div style="display: flex; justify-content:space-between;">
                    <div>
                        <h5 class="card-title">{{ $lecture->title }}</h5>
                        <p class="card-text">{{ $lecture->description }}</p>
                    </div>
                    <button onclick="alert('Done download')" type="button" class="btn btn-primary">
                        <div class="download-icon">
                            <i class="fas fa-download"></i>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </a>
    @endforeach
</div>
@endsection