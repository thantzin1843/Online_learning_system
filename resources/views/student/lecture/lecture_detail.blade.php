<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lecture Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body{
            background-color:#5d5d5a;
            color:#00fff0;
        }
        .sideMenu{
            padding:5px 30px;
            border-radius:0px 20px 20px 0px;
            background-color:black;
            width:auto;
            display:inline;
        }
        a{
            text-decoration: none;
            color:inherit;
        }
        a:hover{
            color:black;
            background-color:#00fff0;
        }
        .sideContainer{
            position: sticky;
            top:200px;
        }
        .videoContainer{
            background: black;
        }
    </style>
</head>
<body>
<div class=' sideContainer'>
    <div class='mt-3'><a href="{{route('back',$lecture[0]->teacher_id)}}" class='sideMenu'>Back</a></div>
    <div class='mt-3' ><a class='sideMenu video' href="{{route('download#video',$lecture[0]->video)}}">Download Video</a></div>
    <div class='mt-3' ><a class='sideMenu image' href="{{route('download#image',$lecture[0]->image)}}">Download Image</a></div>
    <div class='mt-3' ><a class='sideMenu document' href="{{route('download#document',$lecture[0]->document)}}">Download Document</a></div>
</div>
<div class='videoContainer  mt-2 col-8 offset-3' style=''>
<video src="{{asset('videos/'.$lecture[0]->video)}}" controls style='width:100%;height:100vh;border:3px solid #00fff0'></video>
</div>
<div class='imgContainer mt-3 col-9 offset-3' style=''>
    <img src="{{asset('images/'.$lecture[0]->image)}}" alt="" style='width:90%;border:3px solid #00fff0'>
</div>

<div class='descContainer mt-3 col-8 offset-3' style='padding:30px; border:2px solid #00fff0'>
    <p class='text-center'>{{$lecture[0]->description}}</p>
</div>

<div class='mt-3 col-8 offset-3'>
    <form action="{{route('post#comment')}}" method='post'>
        @csrf
        <input type="hidden" value="{{$lecture[0]->id}}" name='lectureId'>
        <textarea name="comment" id="" cols="30" rows="3" class='form-control mb-3'>

        </textarea>
        <button class='btn btn-warning'>Post Comment</button>
    </form>

    <div class='mb-5'>
        <button class="btn btn-primary mt-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Show All Comments
          </button>
          <div class="collapse mt-3" id="collapseExample">
            @foreach ($comments as $comment)
            <div style='border-bottom:1px solid white'>
                @if ($comment->image == null)
                <img src="{{asset('img/default_user.png')}}" style='width:50px;height:50px;border-radius:50%;' alt="">
                @else
                <img src="{{asset('storage/'.$comment->image)}}" style='width:50px;height:50px;border-radius:50%;' alt="">
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
</body>

{{-- <script>
    let video = document.getElementsByClassName('video')[0];
    let image = document.getElementsByClassName('image')[0];
    let description = document.getElementsByClassName('description')[0];
    let videoContainer = document.getElementsByClassName('videoContainer')[0];
    let imgContainer = document.getElementsByClassName('imgContainer')[0];
    let descContainer = document.getElementsByClassName('descContainer')[0];
    video.addEventListener('click',function(e){
        e.preventDefault();
        imgContainer.style.display = 'none';
        descContainer.style.display = 'none';
        videoContainer.style.display = 'block';
    })

    image.addEventListener('click',function(e){
        e.preventDefault();
        imgContainer.style.display = 'block';
        descContainer.style.display = 'none';
        videoContainer.style.display = 'none';
    })


</script> --}}
</html>
