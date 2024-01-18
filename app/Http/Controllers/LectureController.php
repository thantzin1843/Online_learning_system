<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Lecture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LectureController extends Controller
{
    public function addLecturePage(){
        return view('teacher.addLecture');
    }
    // post lecture
    public function postLecture(Request $request){
        $this->validateData($request);
        $data =new Lecture();
        $data->title = $request->title;
        $data->teacher_id = $request->teacherId;
        $data->description = $request->description;
        //image
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('images',$imageName);
        $data->image = $imageName;
        // video
        $videoName = time().'.'.$request->video->getClientOriginalExtension();
        $request->video->move('videos',$videoName);
        $data->video = $videoName;
        // document
        $documentName = time().'.'.$request->document->getClientOriginalExtension();
        $request->document->move('documents',$documentName);
        $data->document = $documentName;
        $data->save();
        return back();
    }

    // lecture list page
    public function lectureListPage(){
        $lectures = Lecture::where('teacher_id',Auth::user()->id )->get();
        return view('teacher.lecture.lecture_list',compact('lectures'));
    }

    // delete lecture
    public function deleteLecture($id){
        Lecture::where('id',$id)->delete();
        return back();
    }
    // view lecture
    public function viewLecture($id){
        $lecture = Lecture::where('id',$id)->get();
        $comments = Comment::join('users','users.id','comments.user_id')->get();
        return view('teacher.lecture.detail',compact('lecture','comments'));
    }
    // validate data
     private function validateData($request){
        Validator::make($request->all(),[
            'title'=>['required'],
            'description'=>['required'],
            'image'=>['required'],
            'video'=>['required']
        ])->validate();
     }

}
