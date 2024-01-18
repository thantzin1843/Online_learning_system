@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2" href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>


<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2 active"  href="{{route('list#message')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Messages</a>
@endsection

@section('content')

<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 10px 20px 10px;'>
    <div class='col-12' style=''>
        <table class='col-12'>
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style='color:white;font-size:20px;'>Subject</td>
                <td class='p-2 ' style='color:white;font-size:20px;'>To</td>
                <td class='p-2 ' style='color:white;font-size:20px;'>created_at</td>
                <td class='p-2 ' style='color:white;font-size:20px;'></td>
            </tr>
            @foreach ($messages as $message)
            <tr style='border-bottom:1px solid black'>
                <td class='p-2 ' style=''>{{$message->subject}}</td>
                <td class='p-2 ' style=''>{{$message->To}}</td>
                <td class='p-2 ' style=''>{{$message->created_at}}</td>
                <td class='p-2 '><a href="{{route('adminmessage#detail',$message->id)}}" class='btn btn-sm btn-success'>Read More</a><a href="{{route('delete#message',$message->id)}}" class='text-danger ms-2'>Delete</a></td>

            </tr>
            @endforeach

        </table>

    </div>
</div>


@endsection
