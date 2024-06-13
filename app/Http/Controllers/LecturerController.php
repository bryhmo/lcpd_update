<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\ClassModel;

class LecturerController extends Controller
{
    public function List()
    {
        $data['getRecord'] = User::getLecturer();
        $data['header_title'] = "Lecturer List";
        return view('admin.lecturer.list',$data);

    }

    public function add()
    {
        // $data['getClass'] = ClassModel::getClass();
        $data['header_title'] = " Add New Lecturer ";
        return view('admin.lecturer.add',$data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());

        request()->validate([
            'email'=>'required|email|unique:users',
            'mobile_number'=> 'max:15|min:8',   
            'marital_status'=> 'max:50',   
        ]);
        
        $lecturer = new User;
        $lecturer->name = trim($request->name);
        $lecturer->last_name = trim($request->last_name);
        $lecturer->email = trim($request->email);
        $lecturer->gender= trim($request->gender);


        if(!empty($request->date_of_birth))
        {
             $lecturer->date_of_birth = trim($request->date_of_birth);
        }


        if(!empty($request->admission_date))
        {
            $lecturer->admission_date = trim($request->admission_date);
        }


        if(!empty($request->file('profile_pic')))
        {
            $ext =  $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/profile/',$filename);

            $lecturer->profile_pic = $filename;
        }

        
        $lecturer->mobile_number = trim($request->mobile_number);
        $lecturer->marital_status = trim($request->marital_status);
        $lecturer->address = trim($request->address);
        $lecturer->permanent_address = trim($request->permanent_address);
        $lecturer->qualification = trim($request->qualification);
        $lecturer->work_experience = trim($request->work_experience);
        $lecturer->note = trim($request->note);
        $lecturer->status = trim($request->status);
        $lecturer->password = trim($request->password);
        $lecturer->user_type = 2;
        $lecturer->save();

        return redirect('admin/lecturer/list')->with('success','lecturer successfully created');


    }

    public function edit($id)
    {
        $data['getRecord'] = User::getSingle($id);
        if(!empty($data['getRecord']))
        {
            $data['getClass'] = ClassModel::getClass();
            $data['header_title'] = " Edit lecturer ";
            return view('admin.lecturer.edit',$data);
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
            'mobile_number'=> 'max:15|min:8',   
            'marital_status'=> 'max:50',   
        ]);
        
        $lecturer = User::getSingle($id);
        $lecturer->name = trim($request->name);
        $lecturer->last_name = trim($request->last_name);
        $lecturer->email = trim($request->email);
        $lecturer->gender= trim($request->gender);


        if(!empty($request->date_of_birth))
        {
             $lecturer->date_of_birth = trim($request->date_of_birth);
        }


        if(!empty($request->admission_date))
        {
            $lecturer->admission_date = trim($request->admission_date);
        }


        if(!empty($request->file('profile_pic')))
        {
            $ext =  $request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic');
            $randomstr = Str::random(20);
            $filename = strtolower($randomstr) .'.'.$ext;
            $file->move('upload/profile/',$filename);

            $lecturer->profile_pic = $filename;
        }

        
        $lecturer->mobile_number = trim($request->mobile_number);
        $lecturer->marital_status = trim($request->marital_status);
        $lecturer->address = trim($request->address);
        $lecturer->permanent_address = trim($request->permanent_address);
        $lecturer->qualification = trim($request->qualification);
        $lecturer->work_experience = trim($request->work_experience);
        $lecturer->note = trim($request->note);
        $lecturer->status = trim($request->status);
        $lecturer->password = trim($request->password);
        $lecturer->save();

        return redirect('admin/lecturer/list')->with('success','lecturer successfully updated');

    }
   
    public function delete($id)
    {
        $getRecord = User::getSingle($id);
        if(!empty($getRecord))
        {
            $getRecord->is_delete = 1;
            $getRecord->save();
            return redirect()->back()->with('success','lecturer Record deleted Successfully');
        }
        else
        {
            abort(404);
        }
}
}