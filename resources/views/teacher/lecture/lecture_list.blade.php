@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2 active" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection


@section("content")





<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
  <div class="d-flex">
    <div class='col-12 '>
        <table class='col-12'>
            <tr style='border-top:5px solid #3f3b3b'>
                <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>Name </td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>Created Date</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>View </td>
                <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'>Operation</td>
            </tr>


            @foreach ($lectures as $lecture)
            <tr style='border-top:5px solid #3f3b3b'>
                <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>{{$lecture->title}}</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>{{$lecture->created_at}}</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'><a href="{{route('lecture#view',$lecture->id)}}">View</a></td>
                <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'><a href="{{route('lecture#delete',$lecture->id)}}" class='text-danger'>Delete</a></td>
            </tr>
         @endforeach
        </table>


    </div>
  </div>
</div>

@endsection
