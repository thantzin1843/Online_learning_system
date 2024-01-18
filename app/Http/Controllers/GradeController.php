<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\User;
use App\Models\Grade;
use App\Models\StudentAssignment;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeController extends Controller
{
    public function addGradePage(){
        $grades = Grade::get();
        return view('admin.grade.add_grade',compact('grades'));
    }

    public function addSubjectPage(){
        $grades = Grade::get();
        $subjects = Subject::select('subjects.*','grades.id as grade_id','grades.grade_name')->join('grades','grades.id','subjects.grade_id')->orderBy('grade_name')->get();
        return view('admin.grade.add_subject',compact('grades','subjects'));
    }

    public function deleteSubject($subject_id,$grade_id,$subj_name){
        Subject::where('id',$subject_id)->delete();
        $user = User::where('subject',$subj_name)->where('grade_id',$grade_id)->where('role','teacher')->delete();
        Assignment::where('subject',$subj_name)->delete();
        return back();
    }
    public function addGrade(Request $request){
        $desc = 'first';
        $this->validateData($request,$desc);
        Grade::create(['grade_name'=>$request->grade]);
        return back();
    }

    // delete grade
    public function deleteGrade($id){
        StudentAssignment::join('users','users.id','student_assignments.student_id')->where('grade_id',$id)->delete();


        Grade::where('id',$id)->delete();
        User::where('grade_id',$id)->delete();



        Assignment::where('grade_id',$id)->delete();
        return back();
    }
    //
    public function addSubject(Request $request){
        $this->validateData($request,'second');
        $fileName = uniqid().$request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public',$fileName);
        Subject::create([
            'subject_name'=>$request->grade_id.'_'.$request->subject,
            'grade_id'=>$request->grade_id,
            'subject_image'=>$fileName
        ]);
        return back();
    }
    // grade detail
    public function gradeDetail($id){
        $students = User::where('grade_id',$id)
                    ->where('role','student')->get();
        $teachers = User::where('grade_id',$id)
                    ->where('role','teacher')->get();
        $subjects = Subject::where('grade_id',$id)->get();
        $grade = Grade::where('id',$id)->get();
        // dd($grade[0]->id);

        $reqSubjects = Subject::select('subjects.grade_id','subjects.subject_name')->leftJoin('users','subjects.subject_name','users.subject')
        ->where('name',null)
        ->where('subjects.grade_id',$grade[0]->id)
        ->get();
        // dd($reqSubjects->toArray());
        return view('admin.grade.detail',compact('students','teachers','subjects','grade','reqSubjects'));
    }
    // validate data
    private function validateData($request,$a){
        if($a=='first'){
            Validator::make($request->all(),[
                'grade'=>['required'],
            ])->validate();
        }elseif($a == 'second'){
            Validator::make($request->all(),[
                'subject'=>'required',
                'image' => 'required',
            ])->validate();
        }
    }
}
