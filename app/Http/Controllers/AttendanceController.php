<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentAttendanceModel;
use App\Models\AssignClassLecturerModel;

class AttendanceController extends Controller
{

    //admin side of the  student attendance
    public function AttendanceStudent(Request $request){
        $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id') && !empty($request->get('attendance_date')))){
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "Student Attendance";
        return view('admin/attendance/student',$data);
    }
    //student side of the attendance
    public function MyAttendanceStudent(){
        return view('student.my_attendance');
    }

    public function AttendanceStudentSubmit(Request $request){
        $check_attendance = StudentAttendanceModel::CheckAlreadyAttendance($request->student_id,$request->attendance_date,$request->class_id);
        // dd($check_attendance);
        if(!empty($check_attendance)){
            $attendance = $check_attendance;
        }else{
            $attendance = new StudentAttendanceModel;
            $attendance->student_id = $request->student_id;
            $attendance->attendance_date = $request->attendance_date;
            $attendance->class_id = $request->class_id;
            $attendance->created_by = Auth::user()->id;
        }

        $attendance->attendance_type = $request->attendance_type;
        $attendance->save();

        $json['message'] = "Attendance Saved Successfully";
        echo json_encode($json);

    }

    public function AttendanceReport(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getRecord'] = StudentAttendanceModel::getRecord();

        $data['header_title'] = 'Attendance Report';
        return view('admin.attendance.report',$data);

    }


    //lecturer side

    public function AttendanceStudentLectuter(Request $request){

        $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        // $data['getClass'] = ClassModel::getClass();

        if(!empty($request->get('class_id') && !empty($request->get('attendance_date')))){
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));

        }
        $data['header_title'] = "Student Attendance";
        return view('lecturer/attendance/student',$data);

    }
}
