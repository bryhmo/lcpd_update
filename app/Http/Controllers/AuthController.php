<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\forgetPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function Laravel\Prompts\alert;

class AuthController extends Controller
{

    public function login()
    {
        // dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type==1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2)
            {
                return redirect('lecturer/dashboard');
            }
            else if(Auth::user()->user_type==3)
            {
                return redirect('student/dashboard');
            }   
        }
        return view('auth.login');
    }


    public function AuthLogin(Request $request)
    {
       $remember = !empty($request->remember)? true :false;
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password], $remember))
        {
            if(Auth::user()->user_type==1)
            {
                return redirect('admin/dashboard');
            }
            else if(Auth::user()->user_type==2)
            {
                return redirect('lecturer/dashboard');
            }
            else if(Auth::user()->user_type==3)
            {
                return redirect('student/dashboard');
            }
        }
        else{
            return redirect()->back()->with('error','Please enter the current email and password');
        }
    }


    public function forgetpassword()
    {
        return view('auth.forget');
    }

    public function postForgetPassword(Request $request)
    {
        $user= User::getEmailSingle($request->email);
        if(!empty($user))
        {
            $user->remember_token = Str::random(10);
            $user->save();
            Mail::to($user->email)->send(new forgetPasswordMail($user));
            return back()->with('success','Please check your email and reset your password');
        }
        else{
            return back()->with('error','Email not Found in the Sytem');
        }
       
    }

    public function reset($remember_token)
    {
        $user= User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset',$data);

        }
        else{
            abort(404);
        }
    }


    public function Postreset($token, Request $request)
    {
        if($request->password == $request->cpassword)
        {
            $user= User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(10);
            $user->save();
            return redirect(url(''))->with('success','Password Successfully Reset');
        }
        else
        {
            return back()->with('error','Password and Confirm Password does not match'); 
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));

    }
}
