@extends('layouts.main')
@section('link')
<a class="linkCSS p-2 active" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection

@section('content')

<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>
    {{$subject}}'s Lectures
</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 10px 20px 10px;'>
    <div class='col-12' style=''>
        <table class='col-12'>
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style=''>Title</td>
                <td class='p-2 ' style=''>Created at</td>
                <td class='p-2 ' style=''>Subject</td>
                <td class='p-2 ' style=''></td>
            </tr>
            @foreach ($lectures as $lecture)
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style=''>{{$lecture->title}}</td>
                <td class='p-2 ' style=''>{{$lecture->created_at}}</td>
                <td class='p-2 ' style=''>{{$subject}}</td>
                <td class='p-2 '><a href="{{route('lecture#detail',$lecture->id)}}" class='btn btn-sm btn-success'>Let's Get Study</a></td>
            </tr>
            @endforeach

        </table>

    </div>
</div>

{{--
    <div class="container d-flex mt-5">
        @if (count($lectures) != 0)
        <table class='col-12'>
            <tr class='col-12 text-center m-1 text-white d-flex align-items-center justify-content-between' style='background-color:#574b90;border-radius:6px;'>
                <td style='font-size:20px;' class='text-center ms-2'>Title</td>
                <td style='font-size:20px;' class='text-center ms-2'>Subject</td>
                <td  class='text-center  '>Created Date</td>
                <td class='me-2 text-center'>Operation</td>
            </tr>
        @for ($i=0;$i<count($lectures);$i++)
        {{-- <div class='col-12  d-flex' style='background-color:#574b90;border-radius:6px;'> --}}
            {{-- <img src="{{asset('images/'.$lectures[$i]->image)}}" alt="" style='height:100px;border:2px solid white;' class='col-2 subjectBg'> --}}
            {{-- <tr class='col-12 text-center m-1 text-white d-flex align-items-center justify-content-between' style='background-color:#574b90;border-radius:6px;'>
                <td style='font-size:20px;' class='text-center ms-2'>{{$lectures[$i]->title}}</td>
                <td style='font-size:20px;' class='text-center ms-2'>{{$subject}}</td>
                <td  class='text-center  '>{{$lectures[$i]->created_at}}</td>
                <td class='me-2 text-center'><a href="{{route('lecture#detail',$lectures[$i]->id)}}" class='btn btn-sm btn-success'>Let's Get Study</a></td>
            </tr>
        @endfor
    </table>
        @else
        <div class='container text-center text-dark' style='margin-top:200px 0px;font-size:30px;background-color:#ffffffcc;border-radius:20px;'>
           <strong>{{$subject}}</strong> <small>Lectures are not uploaded yet!</small>
        </div>
        @endif
    </div> --}} --}}


@endsection


