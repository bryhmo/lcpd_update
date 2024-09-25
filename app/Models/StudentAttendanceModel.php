<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentAttendanceModel extends Model
{
    use HasFactory;

    protected $table = 'student_attendance';

    static public function CheckAlreadyAttendance($student_id,$attendance_date,$class_id){
        return StudentAttendanceModel::where('student_id', '=',$student_id)
        ->where('attendance_date','=',$attendance_date)
        ->where('class_id','=',$class_id)
        ->first();
    }

   static public function getRecord(){
    $return = StudentAttendanceModel::select('student_attendance.*','class.name as class_name','student.name as student_name','student.last_name as student_last_name', 'student.admission_number as student_admission_number','createdby.name as created_name')
        ->join('class','class.id','=','student_attendance.class_id')
        ->join('users as student','student.id','=','student_attendance.student_id')
        ->join('users as createdby','createdby.id','=','student_attendance.created_by');

        if(!empty(Request::get('student_id'))){
            $return = $return->where('student_attendance.student_id','=',Request::get('student_id'));
        }

        if(!empty(Request::get('student_name'))){
            $return = $return->where('student.name','like','%'.Request::get('student_name').'%');
        }
        // last_name is the next
        if(!empty(Request::get('student_last_name'))){
            $return = $return->where('student.last_name','like','%'.Request::get('student_last_name').'%');
        }


        if(!empty(Request::get('student_name'))){
            $return = $return->where('student.name','like','%'.Request::get('student_name').'%');
        }
        if(!empty(Request::get('class_id'))){
            $return = $return->where('student_attendance.class_id','=',Request::get('class_id'));
        }
        if(!empty(Request::get('attendance_date'))){
            $return = $return->where('student_attendance.attendance_date','=',Request::get('attendance_date'));
        }
        // attendance_type is the next
        if(!empty(Request::get('attendance_type'))){
            $return = $return->where('student_attendance.attendance_type','=',Request::get('attendance_type'));
        }

       $return = $return->orderBy('student_attendance.id','desc')
        ->paginate(40);

        return  $return ;

   }


}
