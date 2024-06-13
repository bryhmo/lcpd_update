<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class AssignClassLecturerModel extends Model
{
    use HasFactory;

    protected $table = 'assign_class_lecturer';



    static public function getSingle($id){
        return self::find($id);

    }


    static public function getAlreadyFirst($class_id,$lecturer_id)
    {
        return self::where('class_id', '=' , $class_id)
                ->where('lecturer_id', '=' ,$lecturer_id)
                ->first();
    }


    static  public function getRecord()
    {
        $return = self::select('assign_class_lecturer.*','class.name as class_name','lecturer.name as lecturer_name','users.name as created_by_name')
                        ->join('users as lecturer','lecturer.id', '=', 'assign_class_lecturer.lecturer_id')
                        ->join('class', 'class.id', '=' , 'assign_class_lecturer.class_id')
                        ->join('users', 'users.id', '=' , 'assign_class_lecturer.created_by')
                        ->where('assign_class_lecturer.is_delete', '=', 0);


                        if(!empty(Request::get('class_name')))
                        {
                            $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
                        }


                        if(!empty(Request::get('lecturer_name')))
                        {
                            $return = $return->where('lecturer.name','like','%'.Request::get('lecturer_name').'%');
                        }


                        if(!empty(Request::get('status')))
                        {
                            $status = (Request::get('status') == 100)? 0 : 1;
                            $return = $return->where('assign_class_lecturer.status','=', $status);
                        }

                        if(!empty(Request::get('date')))
                        {
                            $return = $return->whereDate('assign_class_lecturer.created_at','=', Request::get('date'));
                        }

            $return  =  $return->orderBy('assign_class_lecturer.id','desc')
                        ->paginate(20);

            return $return;
    }

    static public function getMyClassSubjectCount($lecturer_id)
    {
        return self::select('assign_class_lecturer.id')
                    ->join('class', 'class.id', '=' , 'assign_class_lecturer.class_id')
                    ->join('class_subject', 'class_subject.class_id', '=' , 'class.id')
                    ->join('subject', 'subject.id', '=' , 'class_subject.subject_id')
                    ->where('assign_class_lecturer.is_delete', '=', 0)
                    ->where('assign_class_lecturer.status', '=', 0)
                    ->where('subject.status', '=', 0)
                    ->where('subject.is_delete', '=', 0)
                    ->where('class_subject.status', '=', 0)
                    ->where('class_subject.is_delete', '=', 0)
                    ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                    ->count();
    }

    static public function getMyClassSubjectGroupCount($lecturer_id)
    {
        return self::select('assign_class_lecturer.id')
                    ->join('class', 'class.id', '=' , 'assign_class_lecturer.class_id')
                    ->where('assign_class_lecturer.is_delete', '=', 0)
                    ->where('assign_class_lecturer.status', '=', 0)
                    ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                    ->groupBy('assign_class_lecturer.class_id')
                    ->count();
    }
    

    static public function getMyClassSubject($lecturer_id)
    {
        return self::select('assign_class_lecturer.*','class.name as class_name','subject.name as subject_name','subject.type as subject_type','subject.code as subject_code','subject.unit as subject_unit','class.id as class_id','subject.id as subject_id')
                    ->join('class', 'class.id', '=' , 'assign_class_lecturer.class_id')
                    ->join('class_subject', 'class_subject.class_id', '=' , 'class.id')
                    ->join('subject', 'subject.id', '=' , 'class_subject.subject_id')
                    ->where('assign_class_lecturer.is_delete', '=', 0)
                    ->where('assign_class_lecturer.status', '=', 0)
                    ->where('subject.status', '=', 0)
                    ->where('subject.is_delete', '=', 0)
                    ->where('class_subject.status', '=', 0)
                    ->where('class_subject.is_delete', '=', 0)
                    ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                    ->get();
    }
    
    static public function getMyClassSubjectGroup($lecturer_id)
    {
        return self::select('assign_class_lecturer.*','class.name as class_name','class.id as class_id')
                    ->join('class', 'class.id', '=' , 'assign_class_lecturer.class_id')
                    ->where('assign_class_lecturer.is_delete', '=', 0)
                    ->where('assign_class_lecturer.status', '=', 0)
                    ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                    ->groupBy('assign_class_lecturer.class_id')
                    ->get();
    }
    


    static public function getCalendarLecturer($lecturer_id)
    {
        return AssignClassLecturerModel::select('class_subject_timetable.*','class.name as class_name','subject.name as subject_name','week.name as week_name','week.fullcalendar_day')
        ->join('class','class.id', '=', 'assign_class_lecturer.class_id')
        ->join('class_subject','class_subject.class_id', '=', 'class.id')
        ->join('class_subject_timetable','class_subject_timetable.subject_id', '=', 'class_subject.subject_id')
        ->join('subject','subject.id', '=', 'class_subject_timetable.subject_id')
        ->join('week','week.id', '=', 'class_subject_timetable.week_id')
        
        ->where('assign_class_lecturer.lecturer_id', '=',$lecturer_id)
        ->where('assign_class_lecturer.status', '=',0)
        ->where('assign_class_lecturer.is_delete', '=',0)
        ->get();
    }

    static public function getAssignLecturerID($class_id)
    {
        return self::where('class_id','=',$class_id)->where('is_delete','=',0)->get();
    }
    

    static public function deleteLecturer($class_id)
    {
        return self::where('class_id', '=',$class_id)->delete();
    }


    static public function getMyTimetable($class_id,$subject_id){
        // return date('l'); ... this function is for the displaying of date
        
        $getWeek = WeekModel::getWeekUsingName(date('l'));
        
        return ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $getWeek->id);
                
    }

    

}
