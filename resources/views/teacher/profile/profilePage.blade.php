@extends('layouts.main')

@section('content')

<div class='col-12 p-3' style='border-radius:5px 5px 0 0;background-color:#3f3b3b;'>
    <div class='d-flex justify-content-between'>
        <div>
            @if (Auth::user()->image == null)
            <img src="{{asset('img/one.jpg')}}" style='width:70px;height:70px;margin-right:50px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;' >
            @else
            <img src="{{asset('storage/'.Auth::user()->image)}}" style='width:70px;height:70px;margin-right:50px;box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;' >

            @endif
            <strong>{{Auth::user()->name}}</strong>
        </div>
        <div>
            <button type="button" class="btn btn-dark" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                View Profile Image
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        @if(Auth::user()->image == null)
                        <img src="{{asset('img/default_user.jpg')}}" alt="" class='w-100'>
                        @else
                        <img src="{{asset('storage/'.Auth::user()->image)}}" alt="" class='w-100 ' style='height:400px;'>
                        @endif

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                      {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

</div>
<div class="col-12 d-flex justify-content-between" style='border-radius:0px 0 5px 5px;background-color:#3f3b3bcc;padding:20px 100px 20px 10px;'>
    <div class='col-8' style=''>
        <table class='col-12'>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Name</td>
                <td class='p-2 ' style='background-color:#3f3b3b'>{{Auth::user()->name}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Email</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{Auth::user()->email}}</td>
            </tr>
            {{-- <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Recover Password</td>
                <td class='p-2 ' style='background-color:#3f3b3b'>{{Auth::user()->recover_password}}</td>
            </tr> --}}
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Address</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{Auth::user()->address}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Gender</td>
                <td class='p-2 ' style='background-color:#3f3b3b'>{{Auth::user()->gender}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>NRC</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{Auth::user()->nrc}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Phone</td>
                <td class='p-2 ' style='background-color:#3f3b3b'>{{Auth::user()->phone}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Role</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{Auth::user()->role}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Subject</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{Auth::user()->subject}}</td>
            </tr>
            <tr>
                <td class='p-2 ' style='background-color:#3f3b3b'>Grade</td>
                <td class='p-2 ' style='background-color:#3f3b3b;border-bottom:7px solid #5d5d5a'>{{$grade[0]->grade_name}}</td>
            </tr>
        </table>
    </div>
    <div class='col-4' style='padding:10px'>
        <form action="{{route('update#profile#teacher')}}" method='post' enctype="multipart/form-data">
           @csrf
            <div class='col-12 '>
                <label for="" class='form-label text-white'>Profile Image</label>
                <input type="file" name='image' style='background-color:#575151;color:white' class='form-control mb-3'>
                @error('file')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <div class='col-12 '>
                <input type="text" name='name' value='{{Auth::user()->name}}' style='background-color:#575151;color:white' class='form-control'>
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <div class='col-12 mt-3'>
                <input type="text" name='email' value='{{Auth::user()->email}}' style='background-color:#575151;color:white' class='form-control'>
                @error('email')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <div class='col-12 mt-3'>
                <input type="text" name='recover_password' value='{{Auth::user()->recover_password}}' style='background-color:#575151;color:white' class='form-control'>
                @error('recover_password')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <div class='col-12 mt-3'>
                <input type="text" name='address' value='{{Auth::user()->address}}' style='background-color:#575151;color:white' class='form-control'>
                @error('address')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <div class='col-12 mt-3'>
                <input type="text" name='phone' value='{{Auth::user()->phone}}' style='background-color:#575151;color:white' class='form-control'>
                @error('phone')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
            </div>

            <input type="hidden" name="nrc" value='{{Auth::user()->nrc}}'>
            <input type="hidden" name="gender" value="{{Auth::user()->gender}}">
            <input type="hidden" name="role" value={{Auth::user()->role}}>
            <input type="hidden" name="password" value={{Auth::user()->recover_password}}>
            <input type="hidden" name='grade_id' value={{Auth::user()->grade_id}}>
            <input type="hidden" name='id' value={{Auth::user()->id}}>
            <input type="hidden" name='subject' value={{Auth::user()->subject}}>
            <input type="hidden" name='position' value={{Auth::user()->position}}>
            <div class='col-12 mt-3'>
                <button class='btn text-white' style='background-color:#278ea5'>Update User Profile</button>
            </div>

        </form>

    </div>
</div>

@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('teacher#addLecturePage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Lecture</a>
<a class="linkCSS p-2" href="{{route('teacher#lecture#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Lecture List</a>
<a class="linkCSS p-2" href="{{route('add#assignmentPage')}}"  ><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;Add Assignment</a>

<a class="linkCSS p-2" href="{{route('teacher#assignment#list')}}"  ><i class="fa-solid fa-list"></i>&nbsp;&nbsp;Assignment List</a>

<a class="linkCSS p-2" href="{{route('teacher#inbox')}}"  ><i class="fa-solid fa-inbox"></i>&nbsp;&nbsp;Inbox</a>

@endsection
