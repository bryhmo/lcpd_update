<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class ApplyController extends Controller
{

    public function add()
    {
        $data['header_title'] = "Student Register ";
        return view('student.register',$data);
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
            'address'=>'required|max:200'
            
        ]);
        
        $student = new User;
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
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
        $student->email = trim($request->email);
        $student->password = trim($request->password);
        $student->marital_status = trim($request->marital_status);
        $student->address = trim($request->address);
        $student->permanent_address = trim($request->permanent_address);
        $student->qualification = trim($request->qualification);
        $student->work_experience = trim($request->work_experience);
        $student->note = trim($request->note);
        $student->user_type = 3;
        $student->save();

        return redirect('admin/student/list')->with('success','student added successfully');


    }


        






        
    

}
