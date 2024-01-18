@extends('layouts.main')

@section('content')
@if (session('uploadSuccess'))
<div class='text-success col-6 bg-dark p-3 mb-2'>{{session('uploadSuccess')}}</div>
@endif
<div class='col-12 p-3 d-flex align-items-center' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>
    <div class='uploadError text-danger col-5'></div>
    <form action="{{route('upload#assignment')}}" method='post' enctype="multipart/form-data" class='me-2 offset-1 d-flex'>
        @csrf
        <div>
            <input type="file" name="assignment" id="" class='form-control'>
            <input type="hidden" name="assignment_id" value="{{$assignment[0]->id}}" class='form-control'>
        </div>
    <div>
        @if (count($check) > 0)
        <button class='btn btn-primary ms-2 upload' type='submit' disabled>Upload</button>
        @else
        <button class='btn btn-primary ms-2 upload' type='submit'>Upload</button>
        @endif
       </div>
    </form>

</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 10px 20px 10px;'>
    <div style='box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 36px -18px inset;' class='col-12 p-2 bg-white text-dark'>
        <div style='font-weight:bold;font-size:25px;' class='mt-3'>{{$assignment[0]->assignment_name}}</div>
        <div class='mt-3'>{{$assignment[0]->assignment_text}}</div>
        <div class='mt-3'>
            <a href="{{route('download#assignment',$assignment[0]->assignment_file)}}" class='btn btn-success btn-sm'>Download Assignment Question</a>
        </div>
        <div class='mt-3'>
            <span>This assignment will due in <strong class='text-danger due_date'>{{$assignment[0]->due_date}}</strong></span>
        </div>
        <div class='mt-3 bg-dark p-3 text-white'>
            <span class='me-3'>Mark&nbsp;&nbsp;-</span>
            @if (count($check) != 0)
            <strong class='text-danger due_date'>
                @if ($check[0]->mark == null)
                    Not Graded Yet
                @else
                    {{$check[0]->mark}}
                @endif
                </strong>
            @endif
        </span>
        </div>
    </div>
</div>

@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection

@section('js')
<script>
    let today = new Date();
    let todayTime = today.getTime();
    let dueDate = document.getElementsByClassName('due_date')[0].innerHTML;
    dueDate = new Date(dueDate);
    let dueDateTime = dueDate.getTime();
    let uploadBtn = document.getElementsByClassName('upload')[0];
    let uploadError = document.getElementsByClassName('uploadError')[0];
    if(dueDateTime > todayTime){


    }else{

        uploadBtn.setAttribute('disabled',true);
        uploadError.innerHTML = "This assignment is due!"
    }

</script>
@endsection
