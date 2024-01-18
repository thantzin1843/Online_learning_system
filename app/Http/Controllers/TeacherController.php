<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function home(){
        return view('teacher.home');
    }
    // profile
    public function profilePage(){
        $grade = User::join('grades','users.grade_id','grades.id')->where('users.id',Auth::user()->id)->get();
        return view('teacher.profile.profilePage',compact('grade'));
    }
    //
    public function changePassPage(){
        return view('teacher.profile.changePasswordPage');
    }
}
