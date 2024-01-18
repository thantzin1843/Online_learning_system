@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2 active" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection


@section("content")





<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>
{{$assignment_name}}
</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
  <div class="d-flex">
    <div class='col-12 '>
        <table class='col-12'>
            <tr style='border-top:5px solid #3f3b3b'>
                <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>Student Name </td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>Created Date</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>View</td>
                <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'>Mark</td>
            </tr>


            @foreach ($assignments as $assignment)
            <tr style='border-top:5px solid #3f3b3b'>
                <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>{{$assignment->name}}</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>{{$assignment->created_at}}</td>
                <td class='bg-dark mt-1' style='padding:5px 20px'><a href="{{route('view#student#assignment',$assignment->assignment_file)}}">View</a></td>
                <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'>
                    @if($assignment->mark == null)
                        <form action="{{route('add#mark')}}" method='post' >
                            @csrf
                            <input type="hidden" name="student_id" value="{{$assignment->student_id}}">
                            <input type="hidden" name="assignment_id" value="{{$assignment->assignment_id}}">
                            <input type="number" name="mark" class=''> <button type='submit' class='btn btn-success btn-sm'>Submit</button>
                        </form>
                    @else
                    {{$assignment->mark}}
                    @endif
                </td>
            </tr>
         @endforeach
        </table>


    </div>
  </div>
</div>

@endsection

