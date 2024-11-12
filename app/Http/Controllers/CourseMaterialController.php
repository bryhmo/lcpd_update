<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\CourseMaterialModel;
use Illuminate\Support\Facades\Auth;
use App\Models\AssignClassLecturerModel;

class CourseMaterialController extends Controller
{
    //

    public function CourseMaterial(){
        $data['getRecord'] = CourseMaterialModel::getRecord();
        $data['header_title'] = "Course Material";
        return view('admin.course_material.list',$data);
    }


    public function add(){
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New Course Material";
        return view('admin.course_material.add',$data);
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

    public function insert(Request $request){
        // dd($request->all());
        $course_material = new CourseMaterialModel();
        $course_material->class_id = trim($request->class_id)  ;
        $course_material->subject_id = trim($request->subject_id)  ;
        // $homework->homework_date = trim($request->homework_date)  ;
        // $homework->submission_date = trim($request->submission_date)  ;
        $course_material->description = trim($request->description)  ;
        $course_material->created_by = Auth::user()->id;

        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/course_material/',$filename);

            $course_material->document_file = $filename;
        }


        $course_material->save();

        return redirect('admin/course_material/course_material')->with('success','Course Material added successfully');
    }



    public function edit($id){
        $getRecord = CourseMaterialModel::getSingle($id);
        $data['getRecord'] =$getRecord;
        $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Edit Course Material";
        return view('admin.course_material.edit',$data);
    }



    public function update(Request $request ,$id)
    {
        $course_material = CourseMaterialModel::getSingle($id);
        $course_material->class_id = trim($request->class_id)  ;
        $course_material->subject_id = trim($request->subject_id)  ;
        $course_material->description = trim($request->description)  ;


        if(!empty($request->file('document_file')))
        {
            $ext =  $request->file('document_file')->getClientOriginalExtension();
            $file = $request->file('document_file');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/course_material/',$filename);

            $course_material->document_file = $filename;
        }


        $course_material->save();

        return redirect('admin/course_material/course_material')->with('success','Course Materia Updated successfully');

    }


    public function delete($id){
        $course_material = CourseMaterialModel::getSingle($id);
        $course_material->is_delete = 1;
        $course_material->save();
        return redirect()->back()->with('success','Course Material Deleted successfully');

    }



    //lecturers side of the Course Materials
//in this section module of the code here

   // lecturers side of the  homework
   public function CourseMaterialLecturer(){
    $class_ids = [];
    $getClass = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
    foreach ($getClass as $class) {
        $class_ids[] = $class->class_id;
    }
    $data['getRecord'] = CourseMaterialModel::getRecordLecturer($class_ids);
    $data['header_title'] = "Course Material";
    return view('lecturer.course_material.list',$data);
}

public function addLecturer(){

    $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
    $data['header_title'] = "Add New Course Material";
    return view('lecturer.course_material.add',$data);
}

public function insertLecturer(Request $request){
    $course_material = new CourseMaterialModel();
    $course_material->class_id = trim($request->class_id)  ;
    $course_material->subject_id = trim($request->subject_id)  ;
    $course_material->description = trim($request->description)  ;
    $course_material->created_by = Auth::user()->id;


    if(!empty($request->file('document_file')))
    {
        $ext =  $request->file('document_file')->getClientOriginalExtension();
        $file = $request->file('document_file');
        $randomstr = Str::random(20);
        $filename = strtolower($randomstr) .'.'.$ext;
        $file->move('upload/course_material/',$filename);

        $course_material->document_file = $filename;
    }


    $course_material->save();

    return redirect('lecturer/course_material/course_material')->with('success','Course Material added successfully');



}



public function editLecturer($id){
    $getRecord = CourseMaterialModel::getSingle($id);
    $data['getRecord'] =$getRecord;
    $data['getSubject'] = ClassSubjectModel::MySubject($getRecord->class_id);
    $data['getClass'] = AssignClassLecturerModel::getMyClassSubjectGroup(Auth::user()->id);
    $data['header_title'] = "Edit Course Material";
    return view('lecturer.course_material.edit',$data);
}



public function updateLecturer(Request $request ,$id)
{
    $course_material= CourseMaterialModel::getSingle($id);
    $course_material->class_id = trim($request->class_id)  ;
    $course_material->subject_id = trim($request->subject_id)  ;
    $course_material->description = trim($request->description)  ;


    if(!empty($request->file('document_file')))
    {
        $ext =  $request->file('document_file')->getClientOriginalExtension();
        $file = $request->file('document_file');
        $randomstr = Str::random(20);
        $filename = strtolower($randomstr) .'.'.$ext;
        $file->move('upload/course_material/',$filename);

        $course_material->document_file = $filename;
    }


    $course_material->save();

    return redirect('lecturer/course_material/course_material')->with('success','Course Material Updated successfully');

}




}
