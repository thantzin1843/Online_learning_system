@extends('layouts.main')

@section('content')

<div class="row mt-5 bg-white p-3">
    <div class="col-5">
        @if($student[0]->image == null)
        <img src='{{asset('img/default_user.png')}}' class='' style='width:100%;height:300px;'/>
        @else
        <img src='{{asset('storage/'.$student[0]->image)}}' class='' style='width:100%;height:300px;'/>
        @endif
        {{-- popup --}}
        <!-- Button trigger modal -->
<button type="button" class="btn btn-success mt-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Update student Info
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update student Info</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post" action='{{route('update#student')}}'>
                @csrf
                <input type="text" name="id" value='{{$student[0]->id}}'>
                <div>
                    <label class='form-label mt-2'>student's Name</label>
                <input type="text" name="name" value='{{$student[0]->name}}' class="form-control" placeholder="Enter student's name">
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>student's Email</label>
                <input type="email" name="email" value='{{$student[0]->email}}' class="form-control" placeholder="Enter student's email">
                @error('email')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>student's Password</label>
                <input type="text" name="password" value='{{$student[0]->recover_password}}' class="form-control" placeholder="Enter student's password">
                @error('password')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>student's Phone Number(09xxx)</label>
                <input type="number" name="phone" value='{{$student[0]->phone}}' class="form-control" placeholder="Enter student's phone number">
                @error('phone')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>

                <div>
                    <label class='form-label mt-2'>student's Grade</label>
                <select name="grade_id" id="" class='form-select'>
                    @foreach ($grades as $grade)
                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                    @endforeach
                </select>
                </div>
                <div>
                    <label class='form-label mt-2'>student's Address</label>
                <textarea name="address" cols="35" rows="3">{{$student[0]->address}}</textarea>
                @error('address')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>student's Gender</label>
                <select name="gender"  class='form-control'>
                    <option value="male" @if($student[0]->gender=='male') selected @endif>Male</option>
                    <option value="female" @if($student[0]->gender=='female') selected @endif>Female</option>
                </select>
                @error('gender')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>student's Nrc</label>
                <input type="text" name="nrc" value='{{$student[0]->nrc}}' class="form-control" placeholder="Enter student's nrc">
                @error('nrc')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Role</label>
                <select name="role"  class='form-control'>
                    <option value="student">student</option>
                </select>
                </div>
                {{-- <input type="text" name="role" value='{{$student[0]->}}' class="form-control" value='student' disabled> --}}
                <button type='submit' class='btn btn-success mt-3'>Update student</button>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

  {{-- popup --}}
    </div>
    <div class="col-7">
        <table class='col-12 text-dark'>
            <tr class='bg-dark text-white p-2'>
                <td>Name</td>
                <td class='col-6 p-2    '>{{$student[0]->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td class='col-6 p-2    '>{{$student[0]->email}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Password</td>
                <td class='col-6 p-2    '>{{$student[0]->recover_password}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td class='col-6 p-2    '>{{$student[0]->phone}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Address</td>
                <td class='col-6 p-2    '>{{$student[0]->address}}</td>
            </tr>
            <tr>
                <td>NRC</td>
                <td class='col-6 p-2    '>{{$student[0]->nrc}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Gender</td>
                <td class='col-6 p-2    '>{{$student[0]->gender}}</td>
            </tr>
            <tr class=' text-dark p-2'>
                <td>Role</td>
                <td class='col-6 p-2    '>{{$student[0]->role}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Grade</td>
                <td class='col-6 p-2    '>{{$student[0]->grade_name}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2" href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>



<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection
