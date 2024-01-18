<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use App\Models\ViewedMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Expr\FuncCall;

class MessageController extends Controller
{
    public function saveMessage(Request $request){
        Validator::make($request->all(),[
            'subject'=>'required',
            'detail'=>'required',
        ])->validate();

        $data = [
            'subject' => $request->subject,
            'detail'=>$request->detail,
            'place'=>$request->place,
            'date'=>$request->date,
            'To'=>$request->to,
            'from'=>Auth::user()->name,
        ];
        if($request->hasFile('image')){
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        Message::create($data);
        return back();

    }

    // teacher inbox
    public function inbox(){
        $allMessages = Message::
                    orwhere('To','teacher')->orwhere('To','Both')
                    ->get();

        return view('teacher.message.Inbox',compact('allMessages'));
    }

    // group chat
    public function groupChat(){
        return view('teacher.message.group_chat');
    }

    // message detail
    public function messageDetail($id){
        $message = Message::where('id',$id)->get();
        $user = User::where('name',$message[0]->from)->get();
        return view('teacher.message.detail',compact('message','user'));
    }

    // mark read
    public function addViewMessage(Request $request){
        ViewedMessage::create([
            'user_id' => $request->user_id,
            'message_id'=>$request->message_id,
            'view'=> true,
        ]);
        return back();

    }

    // student ---------------------------------------------

    // teacher inbox
    public function student_inbox(){
        $allMessages = Message::
        orwhere('To','teacher')->orwhere('To','Both')
        ->get();
        // dd($allMessages->toArray());
        return view('student.message.Inbox',compact('allMessages'));
    }

    // group chat
    public function student_groupChat(){
        return view('student.message.group_chat');
    }

    // message detail
    public function student_messageDetail($id){
        $message = Message::where('id',$id)->get();
        $user = User::where('name',$message[0]->from)->get();
        return view('student.message.detail',compact('message','user'));
    }

    // mark read

    public function listMessage(){
        $messages = Message::get();
        return view('admin.message.message_list',compact('messages'));
    }

    public function readMessage($id){
        $message = Message::where('id',$id)->get();
        // dd($message->toArray());
        return view('admin.message.messages_detail',compact('message'));
    }

    public function deleteMessage($id){
        Message::where('id',$id)->delete();
        return back();
    }
}
