
@extends('layouts.main')
@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection


@section("content")





<div class='col-12 p-3 text-white' style='border-left:2px solid white;font-size:25px;font-weight:bold;border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>
{{$lecture[0]->title}}
</div>
<div class="col-12" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
  <div class="d-flex">
    <div class='col-6 '>
        <div>
            <img src="{{asset('images/'.$lecture[0]->image)}}" alt="" class='w-100'>
        </div>
        <div class='mt-3'>
            <video src="{{asset('videos/'.$lecture[0]->video)}}" controls class='w-100'></video>
        </div>
    </div>
    <div class="col-6 p-3" style='background-color:#3f3b3b;margin-left:10px;box-shadow:2px 2px 2px black;'>
        {{$lecture[0]->description}}

        <div class='mb-5'>
            <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Show All Comments
              </button>
              <div class="collapse mt-3" id="collapseExample">
                @foreach ($comments as $comment)
                <div style='border-bottom:1px solid white'>
                    @if ($comment->image == null)
                    <img src="{{asset('img/default_user.png')}}" style='width:50px;height:50px;border-radius:50%;border:2px solid white' alt="">
                    @else
                    <img src="{{asset('storage/'.$comment->image)}}" style='width:50px;height:50px;border-radius:50%;border:2px solid white' alt="">
                    @endif
                    <span class='ms-3'>{{$comment->name}}</span>
                    <div class='ps-5'>
                        {{$comment->comment}}
                    </div>
                </div>
                @endforeach
              </div>
        </div>
    </div>
  </div>
</div>

@endsection
