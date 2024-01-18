<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\StudentAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\Assign;
use PhpParser\Node\Expr\FuncCall;

class AssignmentController extends Controller
{
    public function addAssignmentPage(){
        return view('teacher.assignment.add_assignment');
    }

    public function addAssignment(Request $request){
        $this->validateData($request);
        $assignment = new Assignment();
        $assignment->teacher_id = $request->teacherId;
        $assignment->grade_id = $request->gradeId;
        $assignment->subject = $request->subject;
        $assignment->assignment_name = $request->name;
        $assignment->assignment_text = $request->assignmentText;
        $assignment->due_date = $request->date;

        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move('assignments',$fileName);
        $assignment->assignment_file = $fileName;

        $assignment->save();
        return back();
    }
    // show assignment
    public function show($grade_id){
        $assignments = Assignment::where('grade_id',$grade_id)->get();
        return view('student.assignment.show_assignment',compact('assignments'));
    }

    private function validateData($request){
        Validator::make($request->all(),[
            'name'=>['required'],
        ])->validate();
    }
    // detail assign page
    public function assignDetailPage($id){
        $check = StudentAssignment::where('assignment_id',$id)->where('student_id',Auth::user()->id)->get();
        $assignment = Assignment::where('id',$id)->get();
        return view('student.assignment.assign_detail_page',compact('assignment','check'));
    }

    public function downloadAssign($file){
        return response()->download(public_path('assignments/'.$file));
    }

    public function assignmentListPage(){
        $assignments = Assignment::where('teacher_id',Auth::user()->id)->get();
        return view('teacher.assignment.assignment_list',compact('assignments'));
    }
    // delete assignment
    public function deleteAssign($id){
        Assignment::where('id',$id)->delete();
        return back();
    }
    // view assignment
    public function viewAssign($id){
        $assignment = Assignment::where('id',$id)->get();
        return view('teacher.assignment.view',compact('assignment'));
    }
    // upload assignment
    public function uploadAssignment(Request $request){
        Validator::make($request->all(),[
            'assignment'=>'required',
        ])->validate();
        $fileName = uniqid().$request->file('assignment')->getClientOriginalName();
        $request->file('assignment')->storeAs('public',$fileName);
        $data = [
            'assignment_file' => $fileName,
            'assignment_id'=>$request->assignment_id,
            'student_id'=>Auth::user()->id,
        ];
        StudentAssignment::create($data);
        // $check = StudentAssignment::where('assignment_id',$request->assignment_id)->where('student_id',Auth::user()->id)->get();
        return back()->with(['uploadSuccess'=>'Assignment is uploaded successfully']);
    }

    // teacher check student assign
    public function checkAssignment($id,$name){
        $assignments = StudentAssignment::join('users','users.id','student_assignments.student_id')->where('assignment_id',$id)->get();
        // dd($assignments->toArray());
        $assignment_name = $name;
        return view('teacher.assignment.check_assignment_page',compact('assignments','assignment_name'));
    }
    //
    public function viewStudentAssignment($file){
        return response()->download(public_path('storage/'.$file));
    }

    // add mark
    public function addMark(Request $request){
        Validator::make($request->all(),[
            'mark'=>'required'
        ])->validate();
        StudentAssignment::where('student_id',$request->student_id)->where('assignment_id',$request->assignment_id)->update([
            'mark' => $request->mark
        ]);
        return back();
    }
}

