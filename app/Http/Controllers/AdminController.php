<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function home(){
        $grades = Grade::get();
        return view('admin.home',compact('grades'));
    }
    // add student
    public function addStudent(){
        $grades = Grade::get();
        return view('admin.add_student',compact('grades'));
    }
    // student list
    public function studentList(){
        $students = User::when(request('searchKey'),function($query){
            return $query->orwhere('name','like','%'.request('searchKey').'%')
            ->orwhere('email','like','%'.request('searchKey').'%')
            ->orwhere('address','like','%'.request('searchKey').'%')
            ->orwhere('gender','like','%'.request('searchKey').'%')
            ->orwhere('nrc','like','%'.request('searchKey').'%')
            ->orwhere('role','like','%'.request('searchKey').'%');
        })->where('role','student')
        ->paginate(7);
                    // dd($students[0]->grade_name);
        // $students->append(request()->all());
        // dd($students->toArray());
        return view('admin.student_list',compact('students'));
    }
    // add student to db
    public function add_student(Request $request){
        $this->validateData($request);
        $data = $this->getDataInArray($request);
        User::create($data);
        return back();
    }
    // delete student
    public function deleteStudent($id){
        User::where('id',$id)->delete();
        return back();
    }
    // change role
    public function changeRole(Request $request){
        User::where('id',$request->teacherId)->update([
            'role' => $request->role
        ]);
        return back();
    }
    // to editPage student
    public function editPage($id){
        $student = User::where('users.id',$id)->select('users.*','grades.grade_name','grades.id as grade_id')
                ->join('grades','users.grade_id','grades.id')
                ->get();
        $grades = Grade::get();
        return view('admin.student_detailPage',compact('student','grades'));
    }
    // update student
    public function updateStudent(Request $request){
        $this->validateData($request);
        $data = $this->getDataInArray($request);
        User::where('id',$request->id)->update($data);
        return redirect()->route('admin#student_list');
    }

    // teacher section
    // teacher add page
    public function teacher_addPage(){
        $grades = Grade::get();
        return view('admin.teacher.add_teacher',compact('grades'));
    }
    // add teacehr
    public function add_teacher(Request $request){
        $this->validateData($request);
        $data = $this->getDataInArray($request);
        User::create($data);
        return redirect()->route('addPage#teacher');
    }
    public function secondTeacherAddPage($id){
        $grade = Grade::where('id',$id)->get();
        $subjects = Subject::where('grade_id',$id)->get();
        // dd($grade->toArray(),$subjects->toArray());
        return view('admin.teacher.second_teacher_add',compact('grade','subjects'));
    }
    // list page teacher
    public function teacherListPage(){
        $teachers = User::select('users.*','grades.grade_name','grades.id as grade_id')->join('grades','users.grade_id','grades.id')->where('role','teacher')->paginate(7);
        $teachers->append(request()->all());
        return view('admin.teacher.teacher_list',compact('teachers'));
    }
    // teacher detail
    public function teacherDetail($id){
        $teacher = User::select('users.*','grades.grade_name','grades.id->grade_id')->where('users.id',$id)
        ->join('grades','grades.id','users.grade_id')
        ->first();
        $grades = Grade::get();
        $subjects = Subject::where('grade_id',$teacher->grade_id);
        return view('admin.teacher.teacher_detail',compact('teacher','grades','subjects'));
    }
    // update teacher
    public function teacher_update(Request $request){
        $this->validateData($request);
        // dd($request->toArray());
        User::where('id',$request->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'address'=>$request->address,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'recover_password'=>$request->password,
            'nrc'=>$request->nrc,
            'gender'=>$request->gender,
            'position'=>$request->position,
            'subject'=>$request->subject,
            'grade_id'=>$request->grade,
        ]);
        return redirect()->route('teacher#listPage');
    }

    // profile
    public function profilePage(){

        return view('admin.account.profilePage');
    }
    // change password
    public function changePasswordPage(){

        return view('admin.account.change_password');
    }
    // update profile
    public function updateProfile(Request $request){
        $this->validateData($request);
        $data = $this->getDataInArray($request);
       if($request->hasFile('image')){
        $image = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$image);
        $data['image'] = $image;
       }
        User::where('id',$request->id)->update($data);
        return back();
        // if($request->role == 'admin'){
        //     return redirect()->route('profile');
        // }elseif($request->role == 'teacher'){
        //     return redirect()->route('teacher#profile');
        // }elseif($request->role == 'student'){
        //     return redirect()->route('student#profile');
        // }
    }

    // send message page
    public function sendMessagePage(){
        return view('admin.message.send_message');
    }
    // validate
    private function validateData($request){
        Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$request->id,
            'password'=>'required',
            'address'=>'required',
            'phone'=>'required|unique:users,phone,'.$request->id,
            'nrc'=>'required|unique:users,nrc,'.$request->id,
        ])->validate();
    }
    // get array data
    private function getDataInArray($request){
        return [
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'address'=>$request->address,
            'phone'=>$request->phone,
            'role'=>$request->role,
            'recover_password'=>$request->password,
            'nrc'=>$request->nrc,
            'gender'=>$request->gender,
            'subject'=>$request->subject,
            'position'=>$request->position,
            'grade_id'=> $request->grade_id,
        ];
    }

}
