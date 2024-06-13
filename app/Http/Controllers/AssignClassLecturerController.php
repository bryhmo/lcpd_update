<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\AssignClassLecturerModel;
use Illuminate\Support\Facades\Auth;

class AssignClassLecturerController extends Controller
{
    public function list()
    {
        $data['getRecord'] = AssignClassLecturerModel::getRecord();
        $data['header_title'] = " Assign Class Lecturer";
        return view('admin.assign_class_lecturer.list' , $data);
    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getLecturer'] = User::getLecturerClass();
        $data['header_title'] = " Add Assign Class Lecturer";
        return view('admin.assign_class_lecturer.add' , $data);
    }

    public function insert(Request $request)
    {
        if(!empty($request->lecturer_id))
        {
            foreach ($request->lecturer_id as $lecturer_id)
            {
                $getAlreadyFirst = AssignClassLecturerModel::getAlreadyFirst($request->class_id,$lecturer_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new AssignClassLecturerModel;
                    $save->class_id = $request->class_id;
                    $save->lecturer_id = $lecturer_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
                
               
               
            }
            return redirect('admin/assign_class_lecturer/list')->with('success'," Assign Class to Lecturer Successfully");
        }
        else
        {
            return redirect()->back()->with('error', 'Due to some error plesase try again');
        }
        


    }

    public function edit($id)
    {
        $getRecord = AssignClassLecturerModel::getsingle($id);

        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getAssignLecturerID'] =  AssignClassLecturerModel::getAssignLecturerID($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getLecturer'] = User::getLecturerClass();
            $data['header_title'] = "Edit Assign Class Lecturer";
            return view('admin.assign_class_lecturer.edit' , $data);
        }
        else
        { 
            abort(404);
        }
        
    }

    public function update( $id, Request $request)
    {
        // dd($request->all());
        AssignClassLecturerModel::deleteLecturer($request->class_id);


        if(!empty($request->lecturer_id))
        {
            foreach ($request->lecturer_id as $lecturer_id)
            {
                $getAlreadyFirst = AssignClassLecturerModel::getAlreadyFirst($request->class_id,$lecturer_id);
                if(!empty($getAlreadyFirst))
                {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                }
                else
                {
                    $save = new AssignClassLecturerModel;
                    $save->class_id = $request->class_id;
                    $save->lecturer_id = $lecturer_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
      
        return redirect('admin/assign_class_lecturer/list')->with('success'," Assign Class to Lecturer Successfully Updated");
         
    }
    

    public function edit_single($id){


        $getRecord = AssignClassLecturerModel::getsingle($id);

        if(!empty($getRecord))
        {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getLecturer'] = User::getLecturerClass();
            $data['header_title'] = "Edit Assign Class Lecturer";
            return view('admin.assign_class_lecturer.edit_single' , $data);
        }
        else
        { 
            abort(404);
        }
        
    }


    public function update_single($id,Request $request)
    {
       
        $getAlreadyFirst = AssignClassLecturerModel::getAlreadyFirst($request->class_id, $request->lecturer_id);
        if(!empty($getAlreadyFirst))
        {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();

            return redirect('admin/assign_class_lecturer/list')->with('success',"subject Successfully Updated");

        }
        else
        {
            $save =  AssignClassLecturerModel::getsingle($id);
            $save->class_id = $request->class_id;
            $save->lecturer_id = $request->lecturer_id;
            $save->status = $request->status;
            $save->save();

            return redirect('admin/assign_class_lecturer/list')->with('success'," Assign Class to Lecturer Successfully Updated");

        }
            

    }

    public function delete($id)
    {
        $save =  AssignClassLecturerModel::getsingle($id);
        $save->delete();
        return redirect()->back()->with('success'," Assign Class to Lecturer Successfully Deleted");
    }


    //lecturer side work

    public function MyClassSubject(){
        $data['getRecord'] = AssignClassLecturerModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = 'My Class & Subject';
        return view('lecturer.my_class_subject',$data);
    }
}

