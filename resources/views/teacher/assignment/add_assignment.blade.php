@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2 active" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection

@extends('layouts.main')
@section('content')

<div class='col-6 offset-3 mt-5 p-3' style='color:#492540;background-color:#ffffff55'>
    <fieldset>
        <legend>Add Assignment</legend>
    </fieldset>
    <form action="{{route('add#assignment')}}" method='post' enctype="multipart/form-data">

    @csrf
    <input type="hidden" name='teacherId' value='{{Auth::user()->id}}'>
    <input type="hidden" name='gradeId' value='{{Auth::user()->grade_id}}'>
    <input type="hidden" name='subject' value='{{Auth::user()->subject}}'>
    <div class='mt-3'>
        <label for="">Assignment Name</label>
        <input type="text" name='name' class='form-control' placeholder="Enter assignment name">
    </div>
    <div class='mt-3'>
        <div><label for="">Assignment</label></div>
        <textarea name="assignmentText" id="" cols="43" rows="10"></textarea>
    </div>
    <div class='mt-3'>
        <label for="">Assignment File (optional)</label>
        <input type="file" name='file' class='form-control' placeholder="Enter assignment name">
    </div>
    <div class='mt-3'>
        <label for="">Due Date</label>
        <input type="date" name='date' class='form-control date' placeholder="Enter assignment name">
    </div>
    <div>
        <button class='btn btn-danger mt-3 addAssignment' type='submit' disabled>Add Assignment</button>
    </div>
    </form>
</div>

@endsection

@section('js')
    <script>
        let addAssignment = document.getElementsByClassName('addAssignment')[0];
        let date = document.getElementsByClassName('date')[0];
        date.addEventListener('change',function(){
            let dueDate = new Date(date.value);
            let dueDateTime = dueDate.getTime();
            let currentDate = new Date();
            let currentTime = currentDate.getTime();
            if(currentTime < dueDateTime){
                    addAssignment.removeAttribute('disabled')
            }else{
                addAssignment.removeAttribute('disabled');
                addAssignment.setAttribute('disabled',true);
            }

        })
    </script>
@endsection
