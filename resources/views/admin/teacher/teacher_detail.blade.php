@extends('layouts.main')

@section('content')

<div class="row mt-5 bg-white p-3">
    <div class="col-5">
       @if($teacher->image == null)
       <img src='{{asset('img/default_user.png')}}' class='' style='width:100%;height:350px;'/>
       @else
       <img src='{{asset('storage/'.$teacher->image)}}' class='' style='width:100%;height:350px;'/>
       @endif
        {{-- popup --}}
        <!-- Button trigger modal -->
<button type="button" class="btn btn-success mt-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
    Update Teacher Info
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Teacher Info</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form method="post" action='{{route('update#teacher')}}'>
                @csrf
                <input type="hidden" name="id" value='{{$teacher->id}}'>
                <div>
                    <label class='form-label mt-2'>Teacher's Name</label>
                <input type="text" name="name" value='{{$teacher->name}}' class="form-control" placeholder="Enter teacher's name">
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Email</label>
                <input type="email" name="email" value='{{$teacher->email}}' class="form-control" placeholder="Enter teacher's email">
                @error('email')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Password</label>
                <input type="password" name="password" value='{{$teacher->recover_password}}' class="form-control" placeholder="Enter teacher's password">
                @error('password')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Phone Number(09xxx)</label>
                <input type="number" name="phone" value='{{$teacher->phone}}' class="form-control" placeholder="Enter teacher's phone number">
                @error('phone')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>

                <div>
                    <label class='form-label mt-2'>Teacher's Grade</label>
                    <select name="grade" class="form-control">
                        @foreach ($grades as $grade)
                            <option value="{{$grade->id}}" @if($grade->id == $teacher->grade_id) selected @endif>{{$grade->grade_name}}</option>
                        @endforeach
                    </select>
                @error('grade')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>

                <div>
                    <label class='form-label mt-2'>Teacher's Subject</label>
                    <select name="subject" class="form-control">
                        @foreach ($subjects as $subject)
                            <option value="{{$subject->subject_name}}" @if($subject->subject_name == "$teacher->subject") selected @endif>{{$subject->subject_name}}</option>
                        @endforeach
                    </select>
                @error('subject')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Position</label>
                    <select name="position" class="form-control">
                        <option value="Pro rector" @if($teacher->position == "Pro rector") selected @endif>Pro rector</option>
                        <option value="Department Head" @if($teacher->position == "Department Head") selected @endif>Department Head</option>
                        <option value="Lecturer" @if($teacher->position == "Lecturer") selected @endif>Lecturer</option>
                        <option value="Tutor" @if($teacher->position == "Tutor") selected @endif>Tutor</option>
                    </select>
                @error('position')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Address</label>
                <textarea name="address" cols="35" rows="3">{{$teacher->address}}</textarea>
                @error('address')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Gender</label>
                <select name="gender"  class='form-control'>
                    <option value="male" @if($teacher->gender=='male') selected @endif>Male</option>
                    <option value="female" @if($teacher->gender=='female') selected @endif>Female</option>
                </select>
                @error('gender')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Nrc</label>
                <input type="text" name="nrc" value='{{$teacher->nrc}}' class="form-control" placeholder="Enter teacher's nrc">
                @error('nrc')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <label class='form-label mt-2'>Role</label>
                <select name="role"  class='form-control'>
                    <option value="teacher">Teacher</option>
                </select>
                {{-- <input type="text" name="role" value='{{$teacher->}}' class="form-control" value='teacher' disabled> --}}
                <button type='submit' class='btn btn-success mt-3'>Update Teacher</button>
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
                <td class='col-6 p-2    '>{{$teacher->name}}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td class='col-6 p-2    '>{{$teacher->email}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Password</td>
                <td class='col-6 p-2    '>{{$teacher->recover_password}}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td class='col-6 p-2    '>{{$teacher->phone}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Address</td>
                <td class='col-6 p-2    '>{{$teacher->address}}</td>
            </tr>
            <tr>
                <td>NRC</td>
                <td class='col-6 p-2    '>{{$teacher->nrc}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Gender</td>
                <td class='col-6 p-2    '>{{$teacher->gender}}</td>
            </tr>
            <tr>
                <td>Grade</td>
                <td class='col-6 p-2    '>{{$teacher->grade_name}}</td>
            </tr>
            <tr class='bg-dark text-white p-2'>
                <td>Subject</td>
                <td class='col-6 p-2    '>{{$teacher->subject}}</td>
            </tr>
            <tr>
                <td>Position</td>
                <td class='col-6 p-2    '>{{$teacher->position}}</td>
            </tr>
        </table>
    </div>
</div>

@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2 " href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>


<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection
