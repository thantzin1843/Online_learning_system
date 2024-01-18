
@extends('layouts.main')
@section('link')
<a class="linkCSS p-2" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>
@endsection

@section('content')
<div class='text-center' style='font-size:75px;'>Student's Panel</div>
@endsection
