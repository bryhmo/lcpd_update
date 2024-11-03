<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\HomeworkSubmitModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HomeworkModel;
use App\Models\ClassSubjectModel;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignClassLecturerModel;

class HomeworkController extends Controller
{
    public function homework(){
        $data['getRecord'] = HomeworkModel::getRecord();
        $data['header_title'] = "Homework";
        return view('admin.homework.list',$data);
    }

    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Homework";
        return view('admin.homework.add',$data);

    }


    public function insert(Request $request){
        // dd($request->all());
        $homework = new HomeworkModel();
        $homework->class_id = trim($request->class_id)  ;
        $homework->subject_id = trim($request->subject_id)  ;
        $homework->homework_date = trim($request->homework_date)  ;
        $homework->submission_date = trim($request->submission_date)  ;
        $homework->description = trim($request->description)  ;
        $homework->created_by = Auth::user()->id;



        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }


        $homework->save();

        return redirect('admin/homework/homework')->with('success','Homework added successfully');
    }


    public function ajax_get_subject(Request $request){
        $class_id = $request->class_id;
        $getSubject = ClassSubjectModel::MySubject($class_id);
        $html = "";
        $html .= '<option value="">Select Subject</option>';
        foreach($getSubject as $value){
         $html .= '<option value="'.$value->subject_id.'">'.$value->subject_name.'</option>';
        }
        $json['success'] = $html;
        echo json_encode($json);
    }
    public function edit($id){
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] =$getRecord;
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Edit Homework";
        return view('admin.homework.edit',$data);
    }



    public function update(Request $request ,$id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->class_id = trim($request->class_id)  ;
        $homework->subject_id = trim($request->subject_id)  ;
        $homework->homework_date = trim($request->homework_date)  ;
        $homework->submission_date = trim($request->submission_date)  ;
        $homework->description = trim($request->description)  ;


        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }


        $homework->save();

        return redirect('admin/homework/homework')->with('success','Homework Updated successfully');

    }


    public function delete($id){
        $homework = HomeworkModel::getSingle($id);
        $homework->is_delete = 1;
        $homework->save();
        return redirect()->back()->with('success','Homework Deleted successfully');

    }

// this function is the function that return the submitted homework to the admin side
    public function SubmittedHomework($homework_id){
        $homework = HomeworkModel::getSingle($homework_id);
        if(!empty($homework)){
            $data['homework_id'] = $homework_id;
            $data['getRecord'] = HomeworkSubmitModel::getRecord($homework_id);
            $data['header_title'] = "Submitted Homework";
            return view('admin.homework.submitted',$data);

        }
        else{
            abort(404);
        }

    }


    // lecturers side of the  homework
    public function homeworkLecturer(){
        $class_ids = [];
        $getClass = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        foreach ($getClass as $class) {
            $class_ids[] = $class->class_id;
        }
        $data['getRecord'] = HomeworkModel::getRecordLecturer($class_ids);
        $data['header_title'] = "Homework";
        return view('lecturer.homework.list',$data);
    }

    public function addLecturer(){

        $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['header_title'] = "Add New Homework";
        return view('lecturer.homework.add',$data);
    }

    public function insertLecturer(Request $request){
        $homework = new HomeworkModel();
        $homework->class_id = trim($request->class_id)  ;
        $homework->subject_id = trim($request->subject_id)  ;
        $homework->homework_date = trim($request->homework_date)  ;
        $homework->submission_date = trim($request->submission_date)  ;
        $homework->description = trim($request->description)  ;
        $homework->created_by = Auth::user()->id;



        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }


        $homework->save();

        return redirect('lecturer/homework/homework')->with('success','Homework added successfully');



    }



    public function editLecturer($id){
        $getRecord = HomeworkModel::getSingle($id);
        $data['getRecord'] =$getRecord;
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
        $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
        $data['header_title'] = "Edit Homework";
        return view('lecturer.homework.edit',$data);
    }



    public function updateLecturer(Request $request ,$id)
    {
        $homework = HomeworkModel::getSingle($id);
        $homework->class_id = trim($request->class_id)  ;
        $homework->subject_id = trim($request->subject_id)  ;
        $homework->homework_date = trim($request->homework_date)  ;
        $homework->submission_date = trim($request->submission_date)  ;
        $homework->description = trim($request->description)  ;


        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }


        $homework->save();

        return redirect('lecturer/homework/homework')->with('success','Homework Updated successfully');

    }

    public function  SubmittedHomeworkLecturer($homework_id){
        $homework = HomeworkModel::getSingle($homework_id);
        if(!empty($homework)){
            $data['homework_id'] = $homework_id;
            $data['getRecord'] = HomeworkSubmitModel::getRecord($homework_id);
            $data['header_title'] = "Submitted Homework";
            return view('lecturer.homework.submitted',$data);

        }
        else{
            abort(404);
        }

    }


    /* THIS IS THE STUDENT PART OF THE HOMEWORK MODULE */


    public function homeworkStudent(){
        $data['getRecord'] = HomeworkModel::getRecordStudent(Auth::user()->class_id,Auth::user()->id);
        $data['header_title'] = "My Homework";
        return view('student.homework.list',$data);
    }

    public function SubmitHomework($homework_id){
        $data['getRecord'] = HomeworkModel::getSingle($homework_id);
        $data['header_title'] = "Submit My Homework";
        return view('student.homework.submit',$data);
    }


    public function SubmitHomeworkInsert($homework_id, Request $request){
        $homework = new HomeworkSubmitModel;
        $homework->homework_id = $homework_id;
        $homework->student_id = Auth::user()->id;
        $homework->description = trim($request->description)  ;

        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/homework/',$filename);

            $homework->document_file = $filename;
        }


        $homework->save();

        return redirect('student/my_homework')->with('success','Homework Submitted successfully');

    }


// this is the function that is incharge of the homework that is submitted by the student
    public function homeworkStudentSubmitted(){
        $data['getRecord'] = HomeworkSubmitModel::getRecordStudent(Auth::user()->id);
        $data['header_title'] = "My Submitted Homework";
        return view('student.homework.submittedlist',$data);
    }

}
