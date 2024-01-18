@extends('layouts.main')

@section('content')

<div class='col-12 p-3 d-flex align-items-center' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>
    <div class='me-1 offset-6'>
    <a href="{{route('check#assignment',['id'=>$assignment[0]->id,'name'=>$assignment[0]->assignment_name])}}" class='btn btn-dark'>Check Students' Assignment</a>

    </div>
</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 10px 20px 10px;'>
    <div style='box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;' class='col-12 p-2 bg-white text-dark'>
        <div style='font-weight:bold;font-size:25px;' class='mt-3'>{{$assignment[0]->assignment_name}}</div>
        <div class='mt-3'>{{$assignment[0]->assignment_text}}</div>
        <div class='mt-3'>
            <a href="{{route('teacher#download#assignment',$assignment[0]->assignment_file)}}" class='btn btn-success btn-sm'>Download Assignment Question</a>
        </div>
        <div class='mt-3'>
            <span>This assignment will due in <strong class='text-danger'>{{$assignment[0]->due_date}} .</strong></span>
        </div>
    </div>
</div>
@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2 active" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>
@endsection
