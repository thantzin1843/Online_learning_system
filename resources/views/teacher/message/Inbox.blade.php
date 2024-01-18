@extends('layouts.main')

@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>
<a class="linkCSS p-2 active" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection


@section("content")





<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;height:50px;'>

</div>
<div class="col-12 text-white" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 30px 20px 10px;'>
<table class='col-12'>
    <tr style='border-bottom:1px solid black'>
        <td class='pb-3 col-3'>From</td>
        <td class='pb-3 col-3'>Subject</td>
        <td class='pb-3 col-3'>Date</td>
        <td></td>
    </tr>
    @foreach ($allMessages as $message)
    <tr style='border-bottom:1px solid black;'>
        <td class='pt-1'>{{$message->from}}&nbsp;&nbsp;&nbsp;</td>
        <td class='pt-1'>{{$message->subject}}</td>
        <td class='pt-1'>{{$message->date}}</td>
        <td class='trash'><a href="{{route('message#detail',$message->id)}}" class=' btn btn-white btn-sm'><i class="fa-solid fa-circle-info"></i></a></td>
    </tr>
    @endforeach

</table>
</div>

@endsection

{{-- @section('js')
<script>
    let message = document.getElementsByClassName('message');
    let trash = document.getElementsByClassName('trash');
    console.log(message.length)
    message.addEventListener('mouseover',function(){
        trash.style.display = 'inline';
    })
    message.addEventListener('mouseout',function(){
        trash.style.display = 'none';
    })
</script>
@endsection --}}
