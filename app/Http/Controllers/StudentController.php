<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comment;
use App\Models\Lecture;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function home(){
        return view('student.home');
    }
    // lecture page
    public function lecturePage($id){
        $subjects = Subject::where('grade_id',$id)->get();
        $images = [
            'https://images.unsplash.com/photo-1618588507085-c79565432917?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXRpZnVsJTIwbmF0dXJlfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'https://i.pinimg.com/474x/9c/b0/70/9cb070d62dc738a0c3a1a408d68e4af5--tunnels-solitude.jpg',
            'https://wallpaperaccess.com/full/393735.jpg',
            'https://c4.wallpaperflare.com/wallpaper/431/451/684/the-most-beautiful-picture-of-nature-wallpaper-preview.jpg',
            'https://wallpaperaccess.com/full/1131206.jpg',
            'https://wallpapercave.com/wp/mxgrnMc.jpg',
            'https://media.istockphoto.com/id/610041376/photo/beautiful-sunrise-over-the-sea.jpg?s=612x612&w=0&k=20&c=R3Tcc6HKc1ixPrBc7qXvXFCicm8jLMMlT99MfmchLNA=',
            'https://assets.hongkiat.com/uploads/100-absolutely-beautiful-nature-wallpapers-for-your-desktop/blue-sea-sunset.jpg',
            'https://images.unsplash.com/photo-1618588507085-c79565432917?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXRpZnVsJTIwbmF0dXJlfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'https://i.pinimg.com/474x/9c/b0/70/9cb070d62dc738a0c3a1a408d68e4af5--tunnels-solitude.jpg',
            'https://wallpaperaccess.com/full/393735.jpg',
            'https://c4.wallpaperflare.com/wallpaper/431/451/684/the-most-beautiful-picture-of-nature-wallpaper-preview.jpg',
            'https://wallpaperaccess.com/full/1131206.jpg',
            'https://wallpapercave.com/wp/mxgrnMc.jpg',
            'https://media.istockphoto.com/id/610041376/photo/beautiful-sunrise-over-the-sea.jpg?s=612x612&w=0&k=20&c=R3Tcc6HKc1ixPrBc7qXvXFCicm8jLMMlT99MfmchLNA=',
            'https://assets.hongkiat.com/uploads/100-absolutely-beautiful-nature-wallpapers-for-your-desktop/blue-sea-sunset.jpg',
        ];
        return view('student.lecture.lecturePage',compact('subjects','images'));
    }

    // show lecture
    public function showLecture($subName,$id){
        $teacher = User::select('id','grade_id')->where('subject',$subName)->where('grade_id',$id)->get();
        $subject = $subName;
        if(count($teacher)!= 0){
            $lectures = Lecture::where('teacher_id',$teacher[0]->id)->get();
        }else{
            $lectures = [];
        }
        return view('student.lecture.showLectureList',compact('lectures','subject'));
    }

    // lecture detail
    public function lectureDetail($id){
        $lecture = Lecture::where('id',$id)->get();
        $comments = Comment::join('users','users.id','comments.user_id')->get();

        return view('student.lecture.lecture_detail',compact('lecture','comments'));
    }

    //back
    public function downloadVideo($video){
        return response()->download(public_path('videos/'.$video));
    }
    public function downloadImage($image){
        return response()->download(public_path('images/'.$image));
    }
    public function downloadDocument($document){
        return response()->download(public_path('documents/'.$document));
    }

    public function back($teacher_id){
        $grade_id = User::where('id',$teacher_id)->get();
        $grade_id = $grade_id[0]->grade_id;
        $subjects = Subject::where('grade_id',$grade_id)->get();
        $images = [
            'https://images.unsplash.com/photo-1618588507085-c79565432917?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXRpZnVsJTIwbmF0dXJlfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'https://i.pinimg.com/474x/9c/b0/70/9cb070d62dc738a0c3a1a408d68e4af5--tunnels-solitude.jpg',
            'https://wallpaperaccess.com/full/393735.jpg',
            'https://c4.wallpaperflare.com/wallpaper/431/451/684/the-most-beautiful-picture-of-nature-wallpaper-preview.jpg',
            'https://wallpaperaccess.com/full/1131206.jpg',
            'https://wallpapercave.com/wp/mxgrnMc.jpg',
            'https://media.istockphoto.com/id/610041376/photo/beautiful-sunrise-over-the-sea.jpg?s=612x612&w=0&k=20&c=R3Tcc6HKc1ixPrBc7qXvXFCicm8jLMMlT99MfmchLNA=',
            'https://assets.hongkiat.com/uploads/100-absolutely-beautiful-nature-wallpapers-for-your-desktop/blue-sea-sunset.jpg',
            'https://images.unsplash.com/photo-1618588507085-c79565432917?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8YmVhdXRpZnVsJTIwbmF0dXJlfGVufDB8fDB8fA%3D%3D&w=1000&q=80',
            'https://i.pinimg.com/474x/9c/b0/70/9cb070d62dc738a0c3a1a408d68e4af5--tunnels-solitude.jpg',
            'https://wallpaperaccess.com/full/393735.jpg',
            'https://c4.wallpaperflare.com/wallpaper/431/451/684/the-most-beautiful-picture-of-nature-wallpaper-preview.jpg',
            'https://wallpaperaccess.com/full/1131206.jpg',
            'https://wallpapercave.com/wp/mxgrnMc.jpg',
            'https://media.istockphoto.com/id/610041376/photo/beautiful-sunrise-over-the-sea.jpg?s=612x612&w=0&k=20&c=R3Tcc6HKc1ixPrBc7qXvXFCicm8jLMMlT99MfmchLNA=',
            'https://assets.hongkiat.com/uploads/100-absolutely-beautiful-nature-wallpapers-for-your-desktop/blue-sea-sunset.jpg',
        ];
        return view('student.lecture.lecturePage',compact('subjects','images'));
    }

    // profile page
    public function profilePage(){
        $grade = User::join('grades','users.grade_id','grades.id')->where('users.id',Auth::user()->id)->get();
        return view('student.profile.profile_page',compact('grade'));
    }

    public function changePasswordPage(){
        return view('student.profile.change_pass_page');
    }

    public function changePassword(Request $request){
        Validator::make($request->all(),[
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6',
            'confirmPassword' => 'required|same:newPassword|min:6',
        ])->validate();
        if($request->oldPass == $request->oldPassword){
            User::where('id',$request->id)->update([
                'recover_password'=>$request->newPassword,
                'password'=>Hash::make($request->newPassword),
            ]);
            return back();
        }else{
            return back()->with(['notFound'=>'Old Password must be same with DB password!']);
        }

    }

    public function postComment(Request $request){
        Comment::create([
            'lecture_id'=>$request->lectureId,
            'comment'=>$request->comment,
            'user_id'=>Auth::user()->id
        ]);
        return back();
    }

}
