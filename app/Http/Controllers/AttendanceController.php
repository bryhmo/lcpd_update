<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    

    public function MyAttendanceStudent(){
        return view('student.my_attendance');
    }
}
