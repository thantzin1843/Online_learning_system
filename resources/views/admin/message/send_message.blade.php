@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2" href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>


<a class="linkCSS p-2 active"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection

@section("content")




<form action="{{route('save#message')}}" method='post' enctype="multipart/form-data">
    @csrf
<div class='col-12 p-3 text-white d-flex' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:70px;'>
    <div>To</div>
    <div class='ms-3'>
        <select class='form-select col-4 ' name='to'>
            <option value="teacher" selected>Teacher</option>
            <option value="student">Student</option>
            <option value="both">Both</option>
        </select>
    </div>
</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
<div class="d-flex">
    <div class='col-8 '>
       Subject : <input type="text" name="subject" id="" class='form-control bg-dark text-white  mb-3'>
                @error('subject')
                    <div class='text-danger'>{{$message}}</div>
                @enderror
       Details : <textarea name="detail" id="" cols="30" rows="10" class='form-control bg-dark text-white  mb-3'></textarea>
       @error('detail')
       <small class='text-danger'>{{$message}}</small>
   @enderror
    </div>
    <div class='col-4 p-2'>
        Image :<input type='file' name='image' class='form-control bg-dark text-white  mb-3'/>
        Place : <input type="text" name="place" id="" class="form-control bg-dark text-white  mb-3">
        Date : <input type="date" name="date" id="" class="form-control bg-dark text-white  mb-3">
        <button type='submit' class='btn btn-primary mt-3'>Send</button>
    </div>
  </div>
</form>
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



