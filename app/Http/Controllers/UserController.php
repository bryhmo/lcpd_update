<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\SettingModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function Setting(){
        $getRecord = SettingModel::getSingle();
        $data['header_title'] = "Setting";
        return view('admin.setting',['getRecord'=>$getRecord],$data);
    }

    public function UpdateSetting(Request $request){
        $setting = SettingModel::getSingle();
        $setting->paypal_email = trim($request->paypal_email);
        $setting->stripe_key = trim($request->stripe_key);
        $setting->stripe_secret = trim($request->stripe_secret);
        $setting->save();

        return redirect()->back()->with('success','Setting successfully updated');

    }

    public function MyAccount()
    {
        $data['getRecord'] = User::getSingle(Auth::user()->id);
        $data['header_title'] ='My Account';

        if(Auth::user()->user_type == 1)
        {
             return view('admin.my_account', $data);

        }

        else if(Auth::user()->user_type == 2)
        {
             return view('lecturer.my_account', $data);

        }
        else if(Auth::user()->user_type == 3)
        {
            return view('student.my_account', $data);

        }

    }

    public function updateMyAccountAdmin(Request $request)
    {
        $id = Auth::user()->id;
        request()->validate([
            'email'=>'required|email|unique:users,email,'.$id
        ]);
        
        $admin = User::getSingle($id);
        $admin->name = trim($request->name);
        $admin->email = trim($request->email);
        $admin->save();

        return redirect()->back()->with('success','Account successfully updated');


    }

    public function updateMyAccount(Request $request){
        $id = Auth::user()->id;
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
        $lecturer->password = trim($request->password);
        $lecturer->save();

        return redirect()->back()->with('success','Record successfully updated');
    }



    public function updateMyAccountStudent(Request $request){
        $id = Auth::user()->id;
        request()->validate([

            'email'=>'required|email|unique:users,email,'.$id,
            'weight'=> 'max:10',
            'blood_group' =>'max:10',
            'mobile_number' =>'max:15|min:8',
            'nationality' => 'max:50',
            'religion'=>'max:50',
            'height'=>'max:10',
            'profile_pic'=>'image',
            
        ]);

        $student = User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admission_number = trim($request->admission_number);
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

       
        $student->blood_group = trim($request->blood_group);
        $student->states = trim($request->states);
        $student->lgas = trim($request->lgas);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->email = trim($request->email);
        $student->save();
        return redirect()->back()->with('success','Account successfully updated');

    }

    public function change_password()
    {
        $data['header_title'] ='Change Password';
        return view('profile.change_password', $data);
    }

    public function update_change_password(Request $request)
    {
        // dd($request->all());
        
        $user = User::getSingle(Auth::user()->id);
       if(Hash::check($request->old_password , $user->password))
       {
         $user->password = Hash::make($request->new_password);
         $user->save();
        return redirect()->back()->with('success', 'Password Successfully Updated');

       }
       else
       {
        return redirect()->back()->with('error', 'Old Password is not Correct');
       }

        
    }
}
