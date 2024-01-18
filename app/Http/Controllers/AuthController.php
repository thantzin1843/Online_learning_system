<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#home');

        }elseif(Auth::user()->role == 'teacher'){
            // return view('teacher.home');
            return redirect()->route('teacher#home');
        }else{
            // return view('student.home');
            return redirect()->route('student#home');
        }
    }
}
