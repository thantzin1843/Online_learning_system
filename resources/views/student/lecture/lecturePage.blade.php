@extends('layouts.main')
@section('link')
<a class="linkCSS p-2 active" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection

@section('content')
    <div class="container d-flex mt-5" style='flex-wrap:wrap;'>
        @for ($i=0;$i<count($subjects);$i++)
        <div class='col-5 offset-1 mt-3' style='background-color:black;border-radius:6px;'>
            <img src="{{asset('storage/'.$subjects[$i]->subject_image)}}" alt="" style='width:100%;height:300px;border:2px solid white;border-radius:6px 6px 0px 0px' class='subjectBg'>
            <div class='text-center m-3 text-white'>
                <a href="{{route('show#lectures',['subName'=>$subjects[$i]->subject_name,'id'=>Auth::user()->grade_id])}}" class='text-white' style='font-weight:bold;'>{{$subjects[$i]->subject_name}}</a>
            </div>
        </div>
        @endfor



    </div>
@endsection


