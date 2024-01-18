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
    {{-- <form action="{{route('student#add#messageView')}}" method='post'>
        @csrf
        <input type="hidden" name="user_id" value='{{Auth::user()->id}}'>
        <input type="hidden" name="message_id" value='{{$message[0]->id}}'>
        <button type='submit' class='btn'>Mark As Read</button>
    </form> --}}
    </div>
    <div class="col-12 text-white" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
    <div class='col-10 offset-1'>
        <div class='mb-3' style='font-size:30px;text-decoration:underline'>
            {{$message[0]->subject}}
        </div>
        <div class='d-flex justify-content-between' style=''>

            <div>

                {{$message[0]->from}} // <span style='font-size:13px;color:black'></span></div>
            <div class='createdDate'>{{$message[0]->created_at}}&nbsp;&nbsp;&nbsp;&nbsp;<span class='ago'></span></div>
        </div>

        <div class='mt-3 p-3' style='background-color:#3f3b3b77'>
        <div>{{$message[0]->detail}}</div>
        <div><img src='{{asset('storage/'.$message[0]->image)}}' style='width:100%'/></div>
        <div class='mt-3'>
            {{-- <div>Location : {{$message[0]->place}}</div>
            <div>Date : {{$message[0]->date}}</div> --}}
            <table>
                <tr>
                    <td class='p-3'>Location</td>
                    <td>-</td>
                    <td class='p-3'>{{$message[0]->place}}</td>
                </tr>
                <tr>
                    <td class='p-3'>Date</td>
                    <td>-</td>
                    <td class='p-3'>{{$message[0]->date}}</td>
                </tr>
            </table>
        </div>
        </div>
    </div>
    </div>




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



