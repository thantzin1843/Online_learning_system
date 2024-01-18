@extends('layouts.main')

@section('content')
<div class='mb-2'>
    <form action="{{route('admin#student_list')}}" method='get' class='d-flex offset-7'>
        <input type="text" name="searchKey" class='form-control ' style='width:300px;'>
        <button type='submit' class='btn btn-success'>Search</button>
    </form>
</div>

    <table class='col-12 text-white'>
        <tr class='bg-dark' style='border-bottom:5px solid #d39dea'>
            <th class='p-3'>Name</th>
            <th class='p-3'>Email</th>
            <th class='p-3'>Grade</th>
            <th class='p-3'>Subject</th>
            <th class='p-3 col-3'>Operation</th>
        </tr>
        @foreach ($teachers as $teacher)

        @if(($teacher->id%2) == 0)
            <tr class='text-dark' style='background-color:#ffffff6a' >
                <th class='p-2'>{{$teacher->name}}</th>
                <th class='p-2'>{{$teacher->email}}</th>
                <th class='p-2'>{{$teacher->grade_name}}</th>
                <th class='p-2'>{{$teacher->subject}}</th>
                <th class='p-2'>
                    <a href='{{route('teacher#detail',$teacher->id)}}' class='btn btn-white' data-mdb-toggle="tooltip" title="Detail"><i class="fa-solid fa-circle-info" style='font-size:16px; color:purple'></i></a>
                    <a href='{{route('delete#student',$teacher->id)}}' class='btn btn-white' data-mdb-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash" style='font-size:16px; color:purple'></i></a>
                    <button type="button" class="btn btn-success mt-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Change Role
                      </button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method='post' action='{{route('change#role')}}'>
                                    @csrf
                                    <input type="hidden" name="teacherId" value='{{$teacher->id}}'>
                                    <select name="role" class="form-select mb-3">
                                        <option value="teacher">Teacher</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                    <button type='submit' class='btn btn-primary'>Change Role</button>
                                </form>


                            </div>

                          </div>
                        </div>
                      </div>
                </th>
            </tr>
            @else
            <tr class='' style='background-color:#0000006a'>
                <th class='p-2'>{{$teacher->name}}</th>
                <th class='p-2'>{{$teacher->email}}</th>
                <th class='p-2'>{{$teacher->grade_name}}</th>
                <th class='p-2'>{{$teacher->subject}}</th>
                <th class='p-2'>
                    <a href='{{route('teacher#detail',$teacher->id)}}' class='btn btn-white' data-mdb-toggle="tooltip" title="Detail"><i class="fa-solid fa-circle-info" style='font-size:16px; color:purple'></i></a>
                    <a href='{{route('delete#student',$teacher->id)}}' class='btn btn-white' data-mdb-toggle="tooltip" title="Delete"><i class="fa-solid fa-trash" style='font-size:16px; color:purple'></i></a>
                    <button type="button" class="btn btn-success mt-3" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                        Change Role
                      </button>
                      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method='post' action='{{route('change#role')}}'>
                                    @csrf
                                    <input type="hidden" name="teacherId" value='{{$teacher->id}}'>
                                    <select name="role" class="form-select mb-3">
                                        <option value="teacher">Teacher</option>
                                        <option value="admin">Admin</option>
                                        <option value="student">Student</option>
                                    </select>
                                    <button type='submit' class='btn btn-primary'>Change Role</button>
                                </form>


                            </div>

                          </div>
                        </div>
                      </div>
                </th>
            </tr>
        @endif

        @endforeach
    </table>
{{$teachers->links()}}
@endsection

@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2 " href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2 active"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>



<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection
