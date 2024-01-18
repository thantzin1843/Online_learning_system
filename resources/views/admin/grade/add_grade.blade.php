@extends('layouts.main')

@section('link')
<a class="linkCSS p-2 active" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2" href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>


<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection

@section("content")





<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
  <div class="d-flex">
    <div class='col-8 '>
        <table class='col-12'>
            <tr style='border-top:5px solid #3f3b3b'>
                <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>Name </td>
                <td class='bg-dark mt-1' style='padding:5px 20px'>Created Date</td>
                <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'>Operation</td>
            </tr>
            @foreach ($grades as $grade)
        <tr style='border-top:5px solid #3f3b3b'>
            <td class='bg-dark mt-1' style='border-radius:5px 0px 0px 5px;padding:5px 20px'>{{$grade->grade_name}} </td>
            <td class='bg-dark mt-1' style='padding:5px 20px'>{{$grade->created_at->format('d/m/Y')}}</td>
            <td class='bg-dark mt-1' style='border-radius:0px 5px 5px 0px;padding:5px 20px'><a class='text-danger offset-3' href='{{route('delete#grade',$grade->id)}}'>Delete</a></td>
        </tr>
        @endforeach
        </table>


    </div>
    <div class='col-4 p-2'>
        <form action="{{route('grade#add')}}" method='post'>
            @csrf
            <input type="text" name="grade" class="form-control" placeholder="Enter grade name">
            @error('grade')
                <span class='text-danger'>{{$message}}</span>
            @enderror
            <button class='btn btn-white mt-3' type='submit'>Add Grade</button>
        </form>
    </div>
  </div>
</div>

@endsection

@section('link')
<a class="linkCSS p-2 active" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>

@endsection

    {{-- <div class='bg-dark p-1 col-12 m-3'></div>
    <div class='text-dark'>
        <h3 class='text-center m-3' style='font-weight:bold;'>Grades List</h3>
        @foreach ($grades as $grade)
        <a href='{{route('grade#detail',$grade->id)}}' class='text-white col-12 text-center btn mt-3 p-3' style='background-color:#9c1de7'>
            {{$grade->grade_name}}
        </a>
        @endforeach
    </div> --}}



