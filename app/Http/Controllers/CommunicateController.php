<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NoticeBoardModel;
use App\Models\NoticeBoardMessageModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\sendEmailUserMail;
use Illuminate\Support\Facades\Mail;



class CommunicateController extends Controller
{
    //SENDING EMAILS 
    public function SendEmail(){
        $headerTitle = 'Send Email';
        return view('admin.communicate.send_email', compact('headerTitle'));
    }


    public function sendEmailUser(Request $request){
        if(!empty($request->user_id))
        {
            $user = User::getSingle($request->user_id);
            if($user){
                $user->send_message = $request->message;
                $user->send_subject = $request->subject;
                Mail::to($user->email)->send(new sendEmailUserMail($user));
            }
        }
    
        if(!empty($request->message_to)){
            foreach($request->message_to as $user_type)
            {
                $users = User::getUser($user_type);
                if($users->isNotEmpty()){
                    foreach($users as $user)
                    {
                        $user->send_message = $request->message;
                        $user->send_subject = $request->subject;
                        Mail::to($user->email)->send(new sendEmailUserMail($user));
                    }
                }
            }
        }
        return redirect()->back()->with('success','Mail Successfully Send');
    }


    public function searchUser(Request $request) {
    $json = [];

    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $users = User::search($searchTerm)->limit(10)->get();

        foreach ($users as $user) {
            $type = '';
            if ($user->user_type == 1) {
                $type = 'Admin';
            } elseif ($user->user_type == 2) {
                $type = 'Lecturer';
            } elseif ($user->user_type == 3) {
                $type = 'Student';
            }
            
            $fullName = $user->name . ' ' . $user->last_name.' - '.$type;
            $json[] = ['id' => $user->id, 'text' => $fullName, 'type' => $type];
        }
    }

    return response()->json($json);
}

    public function NoticeBoard(){
        $getRecord = NoticeBoardModel::getRecord();
        $headerTitle = 'Notice Board';
        return view('admin.communicate.noticeboard.list', compact('getRecord', 'headerTitle'));
    }


    public function AddNoticeBoard(){
        $data['header_title'] = 'Add New Notice Board';
        return view('admin.communicate.noticeboard.add');
    }

    public function InsertNoticeBoard(Request $request){
        // dd($request->all());
        $save = new NoticeBoardModel;
        $save->title = $request->title;
        $save->notice_date = $request->notice_date;
        $save->publish_date= $request->publish_date;
        $save->message = $request->message;
        $save->created_by = Auth::user()->id;
        $save->save();

        if(!empty($request->message_to))
        {
            foreach ($request->message_to as $message_to)
            {
                $message = new NoticeBoardMessageModel;
                $message->notice_board_id = $save->id;
                $message->message_to = $message_to;
                $message->save();
    
            }
        }
       


        return redirect('admin/communicate/notice_board')->with('success',"Notice Board Successfully Created");
    }

    public function EditNoticeBoard($id)
    {
        $getRecord = NoticeBoardModel::getSingle($id);
        $headerTitle = 'Edit Notice Board';
        return view('admin.communicate.noticeboard.edit', compact('getRecord', 'headerTitle'));
    }


    public function UpdateNoticeBoard($id,Request $request){
           // dd($request->all());
           $save =  NoticeBoardModel::getSingle($id);
           $save->title = $request->title;
           $save->notice_date = $request->notice_date;
           $save->publish_date= $request->publish_date;
           $save->message = $request->message;
           $save->save();
   
           NoticeBoardMessageModel::DeleteRecord($id);
           if(!empty($request->message_to))
           {
               foreach ($request->message_to as $message_to)
               {
                   $message = new NoticeBoardMessageModel;
                   $message->notice_board_id = $save->id;
                   $message->message_to = $message_to;
                   $message->save();
       
               }
           }

        return redirect('admin/communicate/notice_board')->with('success',"Notice Board  Successfully  Updated");

           
    }

    public function DeleteNoticeBoard($id){
        $save =  NoticeBoardModel::getSingle($id);
        $save->delete();

        NoticeBoardMessageModel::DeleteRecord($id);

        return redirect()->back()->with('success',"Notice Board  Successfully  Deleted");


    }

/* STUDENT SIDE WORK */
    public function MyNoticeBoardStudent(){
        $getRecord = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $headerTitle = 'My Notice Board';
        return view('student.my_notice_board', compact('getRecord', 'headerTitle'));
        
    }

    //Lecturer side work
    public function MyNoticeBoardLecturer(){
        $getRecord = NoticeBoardModel::getRecordUser(Auth::user()->user_type);
        $headerTitle = 'My Notice Board';
        return view('lecturer.my_notice_board', compact('getRecord', 'headerTitle'));
        
    }



    
}