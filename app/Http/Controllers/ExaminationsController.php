<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;
use App\Models\ExamModel;
use App\Models\ExamScheduleModel;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignClassLecturerModel;

class ExaminationsController extends Controller
{
    public function exam_list()
    {
        $data['getRecord'] = ExamModel::getRecord();
        $data['header_title']= 'Exam List';
        return view('admin.examinations.exam.list',$data);
    }

    public function exam_add()
    {
        $data['header_title']= ' Add New Exam';
        return view('admin.examinations.exam.add',$data);
    }

    public function exam_insert(Request $request){
        // dd($request->all());

        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success','Exam Successfully Created');
    }


    public function exam_edit($id){
        $data['getRecord'] = ExamModel::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['header_title'] = 'Edit Exam';
            return view('admin.examinations.exam.edit',$data);
        }
        else
        {
            abort(404);
        }
       
    }

    public function exam_update($id,Request $request) 
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();


        return redirect('admin/examinations/exam/list')->with('success','Exam Successfully Updated');
    }

    public function exam_delete($id)
    {
            $getRecord = ExamModel::getSingle($id);
            if(!empty($getRecord))
            {
                $getRecord->is_delete = 1;
                $getRecord->save();

                return redirect()->back()->with('success','Exam Successfully Deleted');
            }
            else
            {
                abort(404);
            }
           
    }

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        $result = array();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            // dd($getSubject);
            foreach($getSubject as $value)
            {
                $dataS = array();
                $dataS['subject_id'] = $value->subject_id;
                $dataS['class_id'] = $value->class_id;
                $dataS['subject_name'] = $value->subject_name;
                $dataS['subject_type'] = $value->subject_type;
                $dataS['subject_code'] = $value->subject_code;
                $dataS['subject_unit'] = $value->subject_unit;

                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'),$request->get('class_id'),$value->subject_id);
                if(!empty($ExamSchedule))
                {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_marks'] = $ExamSchedule->passing_marks;
                }
                else
                {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_marks'] = '';
                }

                $result[] = $dataS;
            }
        }
        //  dd($result);

        $data['getRecord'] = $result;


        $data['header_title'] = 'Exam Schedule';
        return view('admin.examinations.exam_schedule',$data);
    }

    public function exam_schedule_insert(Request $request)
    {
        // dd($request->all());
        ExamScheduleModel::deleteRecord($request->exam_id,$request->class_id);
        if(!empty($request->schedule))
        {
            foreach($request->schedule as $schedule)
            {
                if(!empty($schedule['subject_id']) && !empty($schedule['subject_type']) && !empty($schedule['subject_code']) && !empty($schedule['subject_unit']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time']) && !empty($schedule['room_number']) && !empty($schedule['full_marks']) && !empty($schedule['full_marks']))
                {
                    $exam = new ExamScheduleModel;
                    $exam->exam_id = $request->exam_id;
                    $exam->class_id = $request->class_id;
                    $exam->subject_id= $schedule['subject_id'];
                    $exam->subject_type= $schedule['subject_type'];
                    $exam->subject_code = $schedule['subject_code'];
                    $exam->subject_unit = $schedule['subject_unit'];
                    $exam->exam_date = $schedule['exam_date'];
                    $exam->start_time = $schedule['start_time'];
                    $exam->end_time = $schedule['end_time'];
                    $exam->room_number = $schedule['room_number'];
                    $exam->full_marks = $schedule['full_marks'];
                    $exam->passing_marks= $schedule['passing_marks'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save(); 
                }
         
            }
        }
        return redirect()->back()->with('success','Exam Schedule Successfully Saved');
    }

    /*** 
    STUDENT SIDE OF THE EXAMINATIONATION TIMETABLE
    
    */

    public function MyExamTimetable(Request $request)
    {
        $class_id = Auth::user()->class_id;
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
        // dd($result);
        $data['getRecord'] = $result;
        $data['header_title'] = 'My Exam TimeTable';
        return view('student.my_exam_timetable',$data);
    }


    public function MyExamTimetableLecturer()
    {
        $result = array();
        $getClass = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach($getClass as $class)
        {
            $dataC = array();
            $dataC['class_name'] =$class->class_name;
            $getExam = ExamScheduleModel::getExam($class->class_id);
            $examArray = array();
            foreach($getExam as $exam)
            {
                $dataE = array();
                $dataE['exam_name'] = $exam->exam_name;
                $getExamTimetable = ExamScheduleModel::getExamTimetable($exam->exam_id,$class->class_id);
                $subjectArray = array();
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
                    $dataS['full_marks'] = $valueS->full_marks;
                    $dataS['passing_marks'] = $valueS->passing_marks;
                    $dataS['subject_unit'] = $valueS->subject_unit;
    
                    $subjectArray[] = $dataS;
                }
                $dataE['subject'] = $subjectArray;
                $examArray[] = $dataE;
            }
            $dataC['exam'] = $examArray;

            


            $result[] = $dataC;
        }
        $data['getRecord'] = $result;
        $data['header_title'] = 'My Exam TimeTable';
        return view('lecturer.my_exam_timetable',$data);
    }


    public function MyExamResult(){
        return view('student.my_exam_result');
    }
}