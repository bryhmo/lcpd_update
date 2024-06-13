<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\SubjectModel;
use App\Models\WeekModel;
use Illuminate\Support\Facades\Auth;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        if(!empty($request->class_id))
        {
             $data['getSubject'] = ClassSubjectModel::MySubject($request->class_id);

        }

        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $value){

            $dataW = array();
            $dataW['week_id'] = $value->id;
            $dataW['week_name'] = $value->name;

            if(!empty($request->class_id) && !empty($request->subject_id))
            {
              $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);
                if(!empty($ClassSubject))
                {
                     $dataW['start_time'] = $ClassSubject->start_time;
                     $dataW['end_time'] = $ClassSubject->end_time;
                     $dataW['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataW['start_time'] = '';
                    $dataW['end_time'] = '';
                    $dataW['room_number'] = '';

                }
            }
            else
            {
                $dataW['start_time'] = '';
                $dataW['end_time'] = '';
                $dataW['room_number'] = '';
            }

            $week[] = $dataW;

        }
        
        
        
        $data['week'] = $week;

        $data['header_title'] = "Class Timetable";
        return view('admin.class_timetable.list' , $data);
    }

    public function get_subject(Request $request){

       $getSubject = ClassSubjectModel::MySubject($request->class_id);

       $html ="<option value=''>select</option>";

       foreach($getSubject as $value)
       {
        $html .= "<option  value='".$value->subject_id. "'>".$value->subject_name."</option>";
       }


       $json['html'] = $html;
       echo json_encode($json);
       
    }

    public function insert_update(Request $request)
    {
        // dd($request->all());

        ClassSubjectTimetableModel::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)->delete();

        foreach($request->timetable as $timetable)
        {
            if(!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time'])  && !empty($timetable['room_number']))
            {
                $save = new ClassSubjectTimetableModel;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->start_time = $timetable['start_time'];
                $save->end_time = $timetable['end_time'];
                $save->room_number = $timetable['room_number'];
                $save->save();
            }
        }
        return redirect()->back()->with('success','Class Timetable Successfully Saved');
    }


    // ** SYUDENT SIDE OF THE SUBJECT *** //


    public function MyTimetable(){

        $result = array();
        $getRecord = ClassSubjectModel::MySubject(Auth::user()->class_id);
        // dd($getRecord);
        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;
            $getweek = WeekModel::getRecord();
            $week = array();
            foreach($getweek as $valueW)
            {
                $dataW = array();
                // $dataW['week_id'] = $valueW->id;
                $dataW['week_name'] = $valueW->name;

                $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if(!empty($ClassSubject))
                {
                     $dataw['start_time'] = $ClassSubject->start_time;
                     $dataw['end_time'] = $ClassSubject->end_time;
                     $dataw['room_number'] = $ClassSubject->room_number;
                }
                else
                {
                    $dataw['start_time'] = '';
                    $dataw['end_time'] = '';
                    $dataw['room_number'] = '';

                }

                $week[] = $dataW;
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }

        // dd($result);
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('student.my_timetable' , $data);

    }


    //Lecturers Side 
    public function MyTimetableLecturer($class_id,$subject_id)
    {
        $data['getClass'] = ClassModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);

        $getweek = WeekModel::getRecord();
        $week = array();
        foreach($getweek as $valueW)
        {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;

            $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($class_id, $subject_id, $valueW->id);
            if(!empty($ClassSubject))
            {
                    $dataw['start_time'] = $ClassSubject->start_time;
                    $dataw['end_time'] = $ClassSubject->end_time;
                    $dataw['room_number'] = $ClassSubject->room_number;
            }
            else
            {
                $dataw['start_time'] = '';
                $dataw['end_time'] = '';
                $dataw['room_number'] = '';

            }

            $result[] = $dataW;
        }
        
    

        // dd($result);
        $data['getRecord'] = $result;

        $data['header_title'] = "My Timetable";
        return view('lecturer.my_timetable' , $data);
    }
}
