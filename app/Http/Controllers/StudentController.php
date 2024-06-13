<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function List()
    {
        $data['getRecord'] = User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list',$data);

    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = " Add Student ";
        return view('admin.student.add',$data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        request()->validate([
            'email'=>'required|email|unique:users',
            'weight'=> 'max:10',
            'blood_group' =>'max:10',
            'mobile_number' =>'max:15|min:8',
            'admission_number' =>'max:50',
            'role_number'=>'max:50',
            'nationality' => 'max:50',
            'religion'=>'max:50',
            'height'=>'max:10',
            'profile_pic'=>'image',
            
        ]);
        
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->role_number= trim($request->role_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
             $student->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic')))
        {
            $ext =  $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/profile/',$filename);

            $student->profile_pic = $filename;
        }

        $student->nationality = trim($request->nationality);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }
        $student->blood_group = trim($request->blood_group);
        $student->states = trim($request->states);
        $student->lgas = trim($request->lgas);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        $student->password = trim($request->password);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success','student added successfully');


    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = " Edit Student ";
            return view('admin.student.edit',$data);
        }

        else
        {
            abort(404);
        }
    }
     
    public function update($id, Request $request)
    {
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id,
            'weight'=> 'max:10',
            'blood_group' =>'max:10',
            'mobile_number' =>'max:15|min:8',
            'admission_number' =>'max:50',
            'role_number'=>'max:50',
            'nationality' => 'max:50',
            'religion'=>'max:50',
            'height'=>'max:10',
            'profile_pic'=>'image',
            
        ]);
        
        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
        $student->role_number= trim($request->role_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        if(!empty($request->date_of_birth))
        {
             $student->date_of_birth = trim($request->date_of_birth);
        }
        if(!empty($request->file('profile_pic')))
        {
            if(!empty($student->getProfile()))
            {
                unlink('upload/profile/'.$student->profile_pic);
            }
            $ext =  $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/profile/',$filename);

            $student->profile_pic = $filename;
        }

        $student->nationality = trim($request->nationality);
        $student->religion = trim($request->religion);
        $student->mobile_number = trim($request->mobile_number);

        if(!empty($request->admission_date))
        {
            $student->admission_date = trim($request->admission_date);
        }
        $student->blood_group = trim($request->blood_group);
        $student->states = trim($request->states);
        $student->lgas = trim($request->lgas);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);

        if(!empty($request->password)){
            
            $student->password = trim($request->password);
        }
       
        
        $student->save();

        return redirect('admin/student/list')->with('success','student Record Updated Successfully');

    }
   
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success','student Record deleted Successfully');
        }
        else
        {
            abort(404);
        }
    }


    //lecturer side works

    public function MyStudent()
    {
        $data['getRecord'] = User::getLecturerStudent(Auth::user()->id);
        $data['header_title'] = "My Student List";
        return view('lecturer.my_student',$data);
    }


}
