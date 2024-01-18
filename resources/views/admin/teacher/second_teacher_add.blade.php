@extends('layouts.main')

@section('content')
    <div class='row' style='background-color:#ffffffad; border-radius:10px;padding-bottom:10px;background:url("{{asset('img/two.jpg')}}");background-size:cover'>
        <div class='col-6'>

        </div>
        <div class='col-5' style='background-color:#ffffffbb'>
            <div class='text-dark text-center mt-2' style='font-size:25px; margin-bottom:10px;'>Teacher's Registeration Form</div>
            <form method="post" action='{{route('add#teacher')}}'>
                @csrf
                <div>
                    <label class='form-label mt-2'>Teacher's Name</label>
                <input type="text" name="name" id="" class="form-control" placeholder="Enter teacher's name">
                @error('name')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Email</label>
                <input type="email" name="email" id="" class="form-control" placeholder="Enter teacher's email">
                @error('email')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Password</label>
                <input type="password" name="password" id="" class="form-control" placeholder="Enter teacher's password">
                @error('password')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Phone Number(09xxx)</label>
                <input type="number" name="phone" id="" class="form-control" placeholder="Enter teacher's phone number">
                @error('phone')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>

                <div>
                    <label for="">Grade</label>
                    <select name="grade_id" id="grade" class='form-control'>
                       <option value="{{$grade[0]->id}}">{{$grade[0]->grade_name}}</option>

                    </select>
                </div>


                <div>
                    <label for="">Subject</label>
                    <select name="subject" id="subject" class='form-select'>
                        @foreach ($subjects as $subject)
                            <option value="{{$subject->subject_name}}">{{$subject->subject_name}}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class='form-label mt-2'>Teacher's Position</label>
                    <select name="position" class="form-control">
                        <option value="Pro rector">Pro rector</option>
                        <option value="Department Head">Department Head</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Tutor">Tutor</option>
                    </select>
                @error('position')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Address</label>
                <textarea name="address" id="" cols="35" rows="3"></textarea>
                @error('address')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Gender</label>
                <select name="gender" id="" class='form-control'>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                @error('gender')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <div>
                    <label class='form-label mt-2'>Teacher's Nrc</label>
                <input type="text" name="nrc" id="" class="form-control" placeholder="Enter teacher's nrc">
                @error('nrc')
                    <small class='text-danger'>{{$message}}</small>
                @enderror
                </div>
                <label class='form-label mt-2'>Role</label>
                <select name="role" id="" class='form-control'>
                    <option value="teacher">Teacher</option>
                </select>

                                {{-- <input type="text" name="role" id="" class="form-control" value='teacher' disabled> --}}
                                <button type='submit' class='btn btn-success mt-3'>Add Teacher </button>
                 </form>

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

@section('js')
<script>
    // $(document).ready(function(){
    //    $('#grade').change(function(){
    //     $grade = $(this).val();
    //     console.log($grade);
    //     $data = {
    //            "grade":$grade,
    //         }
    //     $.ajax({
    //         type:'get',
    //         url:'http://localhost:8000/admin/ajax/subject',
    //         dataType:'json',
    //         data:$data,
    //         success:function(response){
    //             console.log("helo");
    //             $subjs = ``;
    //             response.forEach(element => {
    //                 $subjs += `
    //                 <option>${element}</option>
    //                 `;
    //             });
    //             $('#subject').html($subjs);
    //         }
    //     })

    //    })
    // })
</script>
@endsection
