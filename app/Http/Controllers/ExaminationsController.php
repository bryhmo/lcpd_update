<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ExamModel;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\ExamScheduleModel;
use App\Models\MarksRegisterModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
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


    public function marks_register(Request $request){
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
            // dd($data['getStudentClass']);
        }
        $data['header_title'] = 'Marks Register';
        return view('admin.examinations.marks_register',$data);
    }

    public function marks_register_lecturer(Request $request){
        // dd(Auth::user()->id);
        $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['getExam'] = ExamScheduleModel::getExamLecturer(Auth::user()->id);
        // dd($data['getExam']);
        // $data['getExam'] = ExamModel::getExam();

        if(!empty($request->get('exam_id')) && !empty($request->get('class_id')))
        {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'),$request->get('class_id'));
            $data['getStudent'] = User::getStudentClass($request->get('class_id'));
            // dd($data['getStudentClass']);
        }
        $data['header_title'] = 'Marks Register';
        return view('lecturer.marks_register',$data);

    }

//submission of the marks of various courses and saving them into the database
public function submit_marks_register(Request $request) {
    $request->validate([
        'mark' => 'required|array',
        'mark.*.id' => 'required|integer',
        'mark.*.classwork_score' => 'nullable|numeric|min:0',
        'mark.*.assignment_score' => 'nullable|numeric|min:0',
        'mark.*.project_score' => 'nullable|numeric|min:0',
        'mark.*.test_score' => 'nullable|numeric|min:0',
        'mark.*.exam_score' => 'nullable|numeric|min:0',
        'student_id' => 'required|integer',
        'exam_id' => 'required|integer',
        'class_id' => 'required|integer',
        'mark.*.subject_id' => 'required|integer',
    ]);

    $validation = 0;

    DB::beginTransaction(); // Start the transaction

    try {
        foreach ($request->mark as $mark) {
            $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
            $full_marks = $getExamSchedule->full_marks;

            $classwork_score = $mark['classwork_score'] ?? 0;
            $assignment_score = $mark['assignment_score'] ?? 0;
            $project_score = $mark['project_score'] ?? 0;
            $test_score = $mark['test_score'] ?? 0;
            $exam_score = $mark['exam_score'] ?? 0;

            $total_mark = $classwork_score + $assignment_score + $project_score + $test_score + $exam_score;

            if ($full_marks >= $total_mark) {
                $getMark = MarksRegisterModel::CheckAlreadyMark(
                    $request->student_id,
                    $request->exam_id,
                    $request->class_id,
                    $mark['subject_id']
                );

                if (!empty($getMark)) {
                    $save = $getMark;
                } else {
                    $save = new MarksRegisterModel;
                    $save->created_by = Auth::user()->id;
                }

                $save->student_id = $request->student_id;
                $save->class_id = $request->class_id;
                $save->exam_id = $request->exam_id;
                $save->subject_id = $mark['subject_id'];
                $save->classwork_score = $classwork_score;
                $save->assignment_score = $assignment_score;
                $save->project_score = $project_score;
                $save->test_score = $test_score;
                $save->exam_score = $exam_score;
                $save->save();
            } else {
                $validation = 1;
            }
        }

        DB::commit(); // Commit the transaction

        if ($validation == 0) {
            return response()->json(['message' => 'Marks Register Successfully Saved'], 200);
        } else {
            return response()->json(['message' => 'Marks Register Successfully Saved but some Marks are greater than full mark'], 200);
        }
    } catch (\Exception $e) {
        DB::rollBack(); // Rollback the transaction on error
        // Log the error
        Log::error('Failed to save marks register: ' . $e->getMessage());
        return response()->json(['message' => 'Failed to save marks register', 'error' => $e->getMessage()], 500);
    }
}


    public function single_submit_marks_register(Request $request)
    {
        $id = $request->id;

        $getExamSchedule = ExamScheduleModel::getSingle($id);
        $full_marks = $getExamSchedule->full_marks;

        $classwork_score = !empty($request->classwork_score) ? $request->classwork_score : 0;
        $assignment_score = !empty($request->assignment_score) ? $request->assignment_score : 0;
        $project_score = !empty($request->project_score) ? $request->project_score : 0;
        $test_score = !empty($request->test_score) ? $request->test_score : 0;
        $exam_score = !empty($request->exam_score) ? $request->exam_score : 0;


        $total_mark = $classwork_score + $assignment_score + $project_score + $test_score + $exam_score;

        if($full_marks >= $total_mark)
        {

        $getMark = MarksRegisterModel::CheckAlreadyMark(
            $request->student_id,
            $request->exam_id,
            $request->class_id,
            $request->subject_id    );
            if(!empty($getMark)){
                $save = $getMark;
            }
            else{
                $save = new MarksRegisterModel;
                $save->created_by = Auth::user()->id;
            }

            $save->student_id = $request->student_id;
            $save->class_id = $request->class_id;
            $save->exam_id = $request->exam_id;
            $save->subject_id = $request->subject_id;
            $save->classwork_score = $classwork_score;
            $save->assignment_score = $assignment_score;
            $save->project_score = $project_score;
            $save->test_score = $test_score;
            $save->exam_score = $exam_score;
            $save->save();

            $json['message'] = "Marks Register Successfully Saved";

        }

        else{

            $json['message'] = "Error! Your Total mark is greater than the Full mark Awarded";
        }

            echo json_encode($json);



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
