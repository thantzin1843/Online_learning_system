@extends('layouts.main')
@section('link')
<a class="linkCSS p-2" href="{{route('student#lecturePage',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Lecture</a>
<a class="linkCSS p-2" href="{{route('assignment#page',Auth::user()->grade_id)}}" >&nbsp;&nbsp;Assignment</a>
<a class="linkCSS p-2" href="{{route('student#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

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
            @if ($user[0]->image == null)
            <img src="{{asset('img/default_user.png')}}" style='width:50px;height:50px;border-radius:50%;'>
            @else
            <img src="{{asset('storage/'.$user[0]->image)}}" style='width:50px;height:50px;border-radius:50%;'>
            @endif
            {{$message[0]->from}} // <span style='font-size:13px;color:black'>{{$user[0]->email}}</span></div>
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


@section('js')
<script>
    let createdDate = document.getElementsByClassName('createdDate')[0];
    let ago = document.getElementsByClassName('ago')[0];
    let createdD = new Date(createdDate.textContent);
    let now = new Date();
    if(((now - createdD)/86400000) > 1){
        ago.textContent =Math.floor((now - createdD)/86400000) + "days ago" ;
    }

    // $(document).ready(function(){
    //     $('#readCheck').change(function(){
    //         console.log('ieo')
    //         $user_id = $('#user_id').val();
    //         $message_id = $('#message_id').val();
    //         $view = true;

    //         $data = {
    //             'user_id' : $user_id,
    //             'message_id' : $message_id,
    //             'view' : $view,
    //         }
    //         console.log($data);

    //         $.ajax({
    //             type : 'get',
    //             url :'http://127.0.0.1:8000/admin/view/message',
    //             data : $data,
    //             dataType : 'json',
    //             success : function(){

    //             }
    //         })
    //     })



    // })
</script>
@endsection
