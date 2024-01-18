@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2 " href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>



<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection

@section("content")

<div class='text-black text-center' style='font-size:25px;'>{{$grade[0]->grade_name}}</div>
<div class='card col-4 offset-4 mt-2 bg-dark'>
    @foreach ($reqSubjects as $reqS)
        <div class='text-danger text-center p-1'>!! {{$reqS->subject_name}}'s Teacher is needed !!</div>
    @endforeach
</div>
<div class="btn-group col-6 offset-3 mt-3 mb-3" role="group" aria-label="Basic example">
    <a type="button" href='{{route('add#subject')}}' class="btn btn-primary">Add Subject</a>
    <a type="button" href='{{route('admin#add_student')}}' class="btn btn-primary">Add Student</a>
    <a type="button" href='{{route('addPage#teacher')}}' class="btn btn-primary">Add Teacher</a>
</div>


<div class='d-flex'>
    <div class='col-3 offset-1' style=''>
        <div style='font-weight:bold;font-size:25px;background-color:#581b98;padding:10px 30px;border-radius:5px 5px 0px 0px;color:white'>Subjects</div>

       @foreach ($subjects as $subject)
       <li style='background-color:#581b98aa;color:white;padding:5px 20px;'>{{$subject->subject_name}}</li>
       @endforeach

        <div style='padding:10px;border-radius:0px 0px 5px 5px;background-color:#581b98'></div>
    </div>

    <div class='col-3 offset-1' style=''>
        <div style='font-weight:bold;font-size:25px;background-color:#581b98;padding:10px 30px;border-radius:5px 5px 0px 0px;color:white'>Students</div>

       @foreach ($students as $student)
       <li style='background-color:#581b98aa;color:white;padding:5px 20px;'>

          <!-- Buttons trigger collapse -->
        <a class="text-white studentCollapse" data-mdb-toggle="collapse" href="" role="button" aria-expanded="false" aria-controls="">
            {{$student->name}}
        </a>


<!-- Collapsed content -->
        <div class="studentCollapseContent mt-3 content" id="" style='display:none'>
            <div class='p-2 bg-dark text-white'>{{$student->email}}</div>
            <div class='p-2 bg-dark text-white'>{{$student->phone}}</div>
            <div class='p-2 bg-dark text-white'>{{$student->address}}</div>
            <div class='p-2 bg-dark text-white'>{{$student->nrc}}</div>
            <div class='p-2 bg-dark text-white'>
                <div class="btn-group bg-dark" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" href='{{route('student#editPage',$student->id)}}'>Edit</a>
                    <a type="button" class="btn btn-primary" href='{{route('delete#student',$student->id)}}'>Delete</a>
                  </div>
            </div>
        </div>
    </li>
       @endforeach

        <div style='padding:10px;border-radius:0px 0px 5px 5px;background-color:#581b98'></div>
    </div>

    <div class='col-3 offset-1' style=''>
        <div style='font-weight:bold;font-size:25px;background-color:#581b98;padding:10px 30px;border-radius:5px 5px 0px 0px;color:white'>Teachers</div>

       @foreach ($teachers as $teacher)
       <li style='background-color:#581b98aa;color:white;padding:5px 20px;'>

          <!-- Buttons trigger collapse -->
        <a class="text-white teacherCollapse" data-mdb-toggle="collapse"  href="" role="button" aria-expanded="false" >
            {{$teacher->name}}
        </a>


<!-- Collapsed content -->
        <div class="teacherCollapseContent mt-3" id="" style='display:none'>
            <div class='p-2 bg-dark text-white'>{{$teacher->email}}</div>
            <div class='p-2 bg-dark text-white'>{{$teacher->phone}}</div>
            <div class='p-2 bg-dark text-white'>{{$teacher->address}}</div>
            <div class='p-2 bg-dark text-white'>{{$teacher->nrc}}</div>
            <div class='p-2 bg-dark text-white'>{{$teacher->subject}}</div>
            <div class='p-2 bg-dark text-white'>{{$teacher->position}}</div>
            <div class='p-2 bg-dark text-white'>
                <div class="btn-group bg-dark" role="group" aria-label="Basic example">
                    <a type="button" class="btn btn-primary" href='{{route('teacher#detail',$teacher->id)}}'>Edit</a>
                    <a type="button" class="btn btn-primary" href='{{route('delete#student',$teacher->id)}}'>Delete</a>
                  </div>
            </div>
        </div>
    </li>
       @endforeach

        <div style='padding:10px;border-radius:0px 0px 5px 5px;background-color:#581b98'></div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $count =0;
    $('.studentCollapse').click(function(){
        if($count<2){
            $count+=1;
            $(this).parent('li').find('.studentCollapseContent').css('display','none')
        }
        else{
            $(this).parent('li').find('.studentCollapseContent').css('display','block')
            if($count==2){
                $count = 0;
            }
        }
    })

    $tcount =0;
    $('.teacherCollapse').click(function(){
        if($tcount<2){
            $tcount+=1;
            $(this).parent('li').find('.teacherCollapseContent').css('display','none')
        }
        else{
            $(this).parent('li').find('.teacherCollapseContent').css('display','block')
            if($tcount==2){
                $tcount = 0;
            }
        }
    })
    })
</script>
@endsection
