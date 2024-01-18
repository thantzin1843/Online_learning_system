@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>
<a class="linkCSS p-2" href="{{route('student#groupchat')}}"  ><i class="fa-solid fa-comment"></i>&nbsp;&nbsp;Group Chat</a>
@endsection

@section("content")





<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>

</div>

@endsection
