@extends('layouts.studentLayout')


@section('content')

    <embed
    src="/lectures/{{$lec_name}}",
    type="application/pdf",
    width="100%",
    height="800"
    >
@endsection