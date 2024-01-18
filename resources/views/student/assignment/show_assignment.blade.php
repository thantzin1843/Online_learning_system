@extends('layouts.main')

@section('content')

<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 10px 20px 10px;'>
    <div class='col-12' style=''>
        <table class='col-12'>
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style=''>Name</td>
                <td class='p-2 ' style=''>Subject</td>
                <td class='p-2 ' style=''>Due Date</td>
                <td class='p-2 ' style=''>Upload</td>
            </tr>
            @foreach ($assignments as $assignment)
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style=''>{{$assignment->assignment_name}}</td>
                <td class='p-2 ' style=''>{{$assignment->subject}}</td>
                <td class='p-2 ' style=''>{{$assignment->due_date}}</td>
                <td class='p-2 '><a href="{{route('assignment#detailPage',$assignment->id)}}" style='color:white'>More</a></td>
            </tr>
            @endforeach

        </table>

    </div>
</div>
@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2 active" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection
