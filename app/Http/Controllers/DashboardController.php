<?php

namespace App\Http\Controllers;

use App\Models\AssignClassLecturerModel;
use App\Models\ClassModel;
use App\Models\StudentAddFeesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\ExamModel;
use App\Models\NoticeBoardModel;
use App\Models\SubjectModel;

class DashboardController extends Controller
{
    public function dashboard() {

        $data['header_title'] = 'Dashboard';
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type==1)
            {
                $data['getTotalFees'] = StudentAddFeesModel::getTotalFees();
                $data['getTotalTodayFees'] = StudentAddFeesModel::getTotalTodayFees();
                $data['TotalStudent'] = User::getTotalUser(3);
                $data['TotalLecturer'] = User::getTotalUser(2);
                $data['TotalAdmin'] = User::getTotalUser(1);
                $data['TotalExam'] = ExamModel::getTotalExam();
                $data['TotalClass'] = ClassModel::getTotalClass();
                $data['TotalSubject'] = SubjectModel::getTotalSubject();
                return view('admin.dashboard',$data);
            }
            else if(Auth::user()->user_type==2)
            {
                $data['TotalStudent'] = User::getLecturerStudentCount(Auth::user()->id);
                $data['TotalClass'] = AssignClassLecturerModel::getMyClassSubjectGroupCount(Auth::user()->id);
                $data['TotalSubject'] = AssignClassLecturerModel::getMyClassSubjectCount(Auth::user()->id);
                $data['TotalNoticeBoard'] = NoticeBoardModel::getRecordUserCount(Auth::user()->user_type);
                return view('lecturer.dashboard',$data);
            }
            else if(Auth::user()->user_type==3)
            {
                return view('student.dashboard',$data);
            }   
        }
    }
}
