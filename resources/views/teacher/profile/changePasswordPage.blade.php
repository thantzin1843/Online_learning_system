@extends('layouts.main')

@section('content')
<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;'>
    <div class='d-flex justify-content-between'>

      <div>Old Password</div>
      <div>-</div>
      <div>{{Auth::user()->recover_password}}</div>
    </div>
</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 100px 20px 10px;'>
   <form action="{{route('change#passwordInDB#teacher')}}" method='post' class='d-flex'>
    @csrf
    <div class="col-6">
        <input type="hidden" name="oldPass" value='{{Auth::user()->recover_password}}'>
        <input type="hidden" name="id" value='{{Auth::user()->id}}'>
        @if(session('notFound'))
        <small class="text-danger">{{session('notFound')}}</small>
        @endif
        <div>
            <label for="">Old Password</label>
            <input type="password" name="oldPassword" id="" class="form-control bg-dark">
            @error('oldPassword')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">New Password</label>
            <input type="password" name="newPassword" id="" class="form-control bg-dark">
            @error('newPassword')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div>
            <label for="">Confirm Password</label>
            <input type="password" name="confirmPassword" id="" class="form-control bg-dark">
            @error('confirmPassword')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-5 offset-1">
        <button class='btn btn-dark' style='margin-top:220px;'>Change Password</button>
    </div>
   </form>
</div>

@endsection


@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>
@endsection
