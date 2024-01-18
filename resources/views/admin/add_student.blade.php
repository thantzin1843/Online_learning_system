@extends('layouts.main')

@section('content')
    <div class='row' style='background-color:#ffffffad; border-radius:10px;padding-bottom:10px;background:url("{{asset('img/one.jpg')}}");background-size:cover;'>
        <div class='col-6' style='background-color:#ffffff55;'>

        </div>
        <div class='col-5'>
            <div class='text-dark text-center mt-2' style='font-size:25px; margin-bottom:10px;'>Student's Registeration Form</div>
            <form method="post" action='{{route('add#student')}}'>
                @csrf
                <div>
                    <label class='form-label mt-2'>Student's Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter student's name">
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Enter student's email">
                @error('email')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter student's password">
                @error('password')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Phone Number(09xxx)</label>
                <input type="number" name="phone" id="" class="form-control" placeholder="Enter student's phone number">
                @error('phone')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Grade</label>
                <select name="grade_id" id="" class='form-select'>
                @foreach ($grades as $grade)
                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>
                @endforeach
                </select>
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Address</label>
                <textarea name="address" id="" cols="35" rows="3"></textarea>
                @error('address')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Gender</label>
                <select name="gender" id="" class='form-control'>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Student's Nrc</label>
                <input type="text" name="nrc" id="" class="form-control" placeholder="Enter student's nrc">
                @error('nrc')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <label class='form-label mt-2'>Role</label>
                <select name="role" id="" class='form-control'>
                    <option value="student">Student</option>
                </select>
                {{-- <input type="text" name="role" id="" class="form-control" value='student' disabled> --}}
                <button type='submit' class='btn btn-success mt-3'>Register Student</button>
            </form>
        </div>
    </div>
@endsection



@section('link')
<a class="linkCSS p-2" href="{{route('add#grade')}}"  ><i class="fa-solid fa-school"></i>&nbsp;&nbsp;Grade</a>
<a class="linkCSS p-2" href="{{route('add#subject')}}"  ><i class="fa-solid fa-book"></i>&nbsp;&nbsp;Add Subject</a>


<a class="linkCSS p-2 active" href="{{route('admin#add_student')}}"  ><i class="fa-solid fa-graduation-cap"></i>&nbsp;&nbsp;Add Students</a>
<a class="linkCSS p-2" href="{{route('admin#student_list')}}"  ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Students List</a>


<a class="linkCSS p-2"  href="{{route('addPage#teacher')}}" ><i class="fa-solid fa-chalkboard-user"></i>&nbsp;&nbsp;Add Teachers</a>
<a class="linkCSS p-2"  href="{{route('teacher#listPage')}}" ><i class="fa-sharp fa-solid fa-list"></i>&nbsp;&nbsp;Teachers List</a>


<a class="linkCSS p-2"  href="{{route('send#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Send Message</a>
<a class="linkCSS p-2"  href="{{route('list#message')}}" ><i class="fa-solid fa-paper-plane"></i>&nbsp;&nbsp;Messages</a>
@endsection
