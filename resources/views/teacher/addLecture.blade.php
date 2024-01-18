@section('link')
<a class="linkCSS p-2 active" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>
@endsection

@extends('layouts.main')
@section('content')

<div class='row text-white' style='background-color:#3f3b3b55; border-radius:10px;padding-bottom:10px' id='lecture_container'>
    <div class='col-10 offset-1'>
        <div class='text-dark text-center mt-2 text-white' style='font-size:25px; margin-bottom:10px;'>Post Lecture</div>
        <form method="post" action='{{route('post#lecture')}}' enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="teacherId" value='{{Auth::user()->id}}'>
            <div>
                <label class='form-label mt-2 text-white'>Lecture Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter lecture's title">
            @error('title')
                <small class='text-danger'>{{$message}}</small>
            @enderror
            </div>

            <div>
                <label class='form-label mt-2 text-white'>Lecture image</label>
            <input type="file" name="image" id="lecture_image" class="form-control" placeholder="Enter lecture's image">
            @error('image')
                <small class='text-danger'>{{$message}}</small>
            @enderror
            </div>

            <div>
                <label class='form-label mt-2 text-white'>Lecture video</label>
            <input type="file" name="video" id="lecture_video" class="form-control" placeholder="Enter lecture's video">
            @error('video')
                <small class='text-danger'>{{$message}}</small>
            @enderror
            </div>

            <div>
                <label class='form-label mt-2 text-white'>Lecture Description</label>
            <textarea name="description" class='form-control'  id='lecture_description' cols="30" rows="10"></textarea>
            @error('description')
                <small class='text-danger'>{{$message}}</small>
            @enderror
            </div>

            <div>
            <label class='form-label mt-2 text-white'>Lecture File</label>
            <input type="file" name="document" id="" class='form-control'>
            </div>
            <!-- Button trigger modal -->
            <button type="button" id='preview_lecture text-white' class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                <i class="fa-solid fa-eye"></i>&nbsp;&nbsp;Preview Button
            </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <div class='p-3'>
                <video src="" controls class='col-12' id='lecVedio'></video>
                <img src='' style='width:100%' id='lecImg'/>
                <div class='col-12 bg-dark mt-3 p-3' >
                    <h3>Lecture's Description</h3>
                    <p id='lecDesc' class='p-3'></p>
                </div>
                <div class="text-center text-secondary mt-3">{{Auth::user()->name}}</div>
                <div class="text-center text-secondary">{{Auth::user()->department}} Department</div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

        <button type='submit' class='btn btn-success mt-3'>Post Lecture</button>
        </form>
    </div>

</div>

@endsection

