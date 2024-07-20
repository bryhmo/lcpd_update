<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignClassLecturerModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\ExamScheduleModel;


class CalendarController extends Controller
{
    public function MyCalendar()
    {
        //timetable

        $result = [];
        $getRecord = ClassSubjectModel::MySubject(Auth::user()->class_id);
        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;
            $getweek = WeekModel::getRecord();
            $week = [];
            foreach($getweek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;

                $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if(!empty($ClassSubject))
                {
                     $dataW['start_time'] = $ClassSubject->start_time;
                     $dataW['end_time'] = $ClassSubject->end_time;
                     $dataW['room_number'] = $ClassSubject->room_number;
                     $week[] = $dataW;
                }
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }

        // dd($result);
        // $data['gettable'] = $result;
        // $data['gettable'] = $this->getTimetable();

        $data['header_title'] ='My Calendar';
        // return view('student.my_calendar');

        return view('student.my_calendar')->with([
            'result' => $this->getTimetable(Auth::user()->class_id),
            'getExamTimetable' => $this->getExamTimetable(Auth::user()->class_id)

        ]);



    }

    public function getExamTimetable($class_id)
    {
        $getExam = ExamScheduleModel::getExam($class_id);
        $result = array();
        foreach($getExam as $value)
        {
            $dataE = array();
            $dataE['name'] = $value->exam_name;
            $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id,$class_id);

            $resultS = array();
            foreach($getExamTimetable as $valueS)
            {
                $dataS = array();
                $dataS['subject_name'] = $valueS->subject_name;
                $dataS['subject_type'] = $valueS->subject_type;
                $dataS['subject_code'] = $valueS->subject_code;
                $dataS['subject_unit'] = $valueS->subject_unit;
                $dataS['exam_date'] = $valueS->exam_date;
                $dataS['start_time'] = $valueS->start_time;
                $dataS['end_time'] = $valueS->end_time;
                $dataS['room_number'] = $valueS->room_number;
                $dataS['passing_marks'] = $valueS->passing_marks;
                $dataS['subject_unit'] = $valueS->subject_unit;

                $resultS[] = $dataS;
            }
            $dataE['exam'] = $resultS;
            $result[] = $dataE;
        }
        return $result;
    }


    public function getTimetable($class_id)
    {
        $result = array();
        $getRecord = ClassSubjectModel::MySubject($class_id);
        foreach($getRecord as $value)
        {
            $dataS['name'] = $value->subject_name;
            $getweek = WeekModel::getRecord();
            $week = array();
            foreach($getweek as $valueW)
            {
                $dataW = array();
                $dataW['week_name'] = $valueW->name;
                $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;

                $ClassSubject =  ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
                if(!empty($ClassSubject))
                {
                     $dataW['start_time'] = $ClassSubject->start_time;
                     $dataW['end_time'] = $ClassSubject->end_time;
                     $dataW['room_number'] = $ClassSubject->room_number;
                     $week[] = $dataW;
                }
            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }
        return $result;
    }


    public function MyCalendarLecturer()
    {
        // die;
        $lecturer_id = Auth::user()->id;
        $classTimetable = AssignClassLecturerModel::getCalendarLecturer($lecturer_id);
        $examTimetable = ExamScheduleModel::getExamTimetableLecturer($lecturer_id);
        $data = [
            'getClassTimetable' => $classTimetable,
            'getExamTimetable' => $examTimetable,
            'header_title' => 'My Calendar'
        ];
        return view('lecturer.my_calendar', $data);
    }
}
