<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeSearch($query, $searchTerm) {
        return $query->where(function($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('last_name', 'like', '%' . $searchTerm . '%');
        });
    }

    static public function getTotalUser($user_type)
    {
        return self::select('users.id')
        ->where('user_type', '=', $user_type)
        ->where('is_delete', '=', 0)
        ->count();
    }

    static public function getPaidAmount($student_id,$class_id){
       return StudentAddFeesModel::getPaidAmount($student_id,$class_id);
    }

    static public function getEmailSingle($email)
    {
        // return self::where('email','=',$email);
        return User::where('email','=',$email)->first();
    }

   static public function getTokenSingle($remember_token)
   {
     return self::where('remember_token','=', $remember_token)->first();
   }

   static public function getAdmin()
   {
    $return = self::select('users.*')
                    ->where('user_type', '=', 1)
                    ->where('is_delete', '=', 0);
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('name','like','%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('email','like','%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('created_at', '=', Request::get('date'));
                    }

   $return =    $return->orderBy('id','desc')
                    ->paginate(20);
    return $return;
   }


   static public function getCollectFeesStudent(){
    // dd(Request::all());
    $return = self::select('users.*','class.name as class_name','class.amount')
                    ->join('class','class.id','=','users.class_id')
                    ->where('users.user_type', '=', 3)
                    ->where('users.is_delete', '=', 0);

                    if(!empty(Request::get('class_id')))
                    {
                        $return = $return->where('users.class_id','=',Request::get('class_id'));
                    }
                    if(!empty(Request::get('student_id')))
                    {
                        $return = $return->where('users.id','=',Request::get('student_id'));
                    }
                    if(!empty(Request::get('first_name')))
                    {
                        $return = $return->where('users.name','like','%'.Request::get('first_name').'%');
                    }
                    if(!empty(Request::get('last_name')))
                    {
                        $return = $return->where('users.last_name','like','%'.Request::get('last_name').'%');
                    }
   $return =    $return->orderBy('users.name','asc')
                    ->paginate(30);
    return $return;
   }





   static public function getStudent(){
    $return = self::select('users.*','class.name as class_name')
                    ->join('class','class.id','=','users.class_id','left')
                    ->where('users.user_type', '=', 3)
                    ->where('users.is_delete', '=', 0);

                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('users.name','like','%'.Request::get('name').'%');
                    }
                    if(!empty(Request::get('last_name')))
                    {
                        $return = $return->where('users.last_name','like','%'.Request::get('last_name').'%');
                    }
                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('users.email','like','%'.Request::get('email').'%');
                    }
                    if(!empty(Request::get('admission_number')))
                    {
                        $return = $return->where('users.admission_number','like','%'.Request::get('admission_number').'%');
                    }
                    if(!empty(Request::get('role_number')))
                    {
                        $return = $return->where('users.role_number','like','%'.Request::get('role_number').'%');
                    }
                    if(!empty(Request::get('class')))
                    {
                        $return = $return->where('class.name','like','%'.Request::get('class').'%');
                    }
                    if(!empty(Request::get('gender')))
                    {
                        $return = $return->where('users.gender','like','%'.Request::get('gender').'%');
                    }
                    if(!empty(Request::get('nationality')))
                    {
                        $return = $return->where('users.nationality','like','%'.Request::get('nationality').'%');
                    }
                    if(!empty(Request::get('religion')))
                    {
                        $return = $return->where('users.religion','like','%'.Request::get('religion').'%');
                    }
                    if(!empty(Request::get('mobile_number')))
                    {
                        $return = $return->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
                    }
                    if(!empty(Request::get('blood_group')))
                    {
                        $return = $return->where('users.blood_group','like','%'.Request::get('blood_group').'%');
                    }
                    if(!empty(Request::get('admission_date')))
                    {
                        $return = $return->whereDate('users.admission_date','=',Request::get('admission_date'));
                    }
                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('users.created_at','=',Request::get('date'));
                    }
                    if(!empty(Request::get('status')))
                    {
                        $status = (Request::get('status')==100)? 0 : 1;
                        $return = $return->where('users.status','=',$status);
                    }

   $return =    $return->orderBy('users.id','desc')
                    ->paginate(30);
    return $return;
   }

   static public function getSingle($id){
    return self::find($id);
   }

   static public function getSingleClass($id){
    return self::select('users.*','class.amount','class.name as class_name')
                    ->join('class','class.id','users.class_id')
                    ->where('users.id' ,'=',$id)
                    ->first();
   }


   public function getProfile()
   {
       if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic))
       {
            return url('upload/profile/'.$this->profile_pic);
       }
       else
       {
        return "";
        }
   }



   static public function getUser($user_type){
    return self::select('users.*')
            ->where('user_type', '=',$user_type)
            ->where('is_delete', '=', 0)
            ->get();
   }



   static public function getLecturer()
   {
        $return = self::select('users.*')
                        ->where('users.user_type', '=', 2)
                        ->where('users.is_delete', '=', 0);
                    if(!empty(Request::get('name')))
                    {
                        $return = $return->where('users.name','like','%'.Request::get('name').'%');
                    }

                    if(!empty(Request::get('last_name')))
                    {
                        $return = $return->where('users.last_name','like','%'.Request::get('last_name').'%');
                    }

                    if(!empty(Request::get('email')))
                    {
                        $return = $return->where('users.email','like','%'.Request::get('email').'%');
                    }

                    if(!empty(Request::get('gender')))
                    {
                        $return = $return->where('users.gender','like','%'.Request::get('gender').'%');
                    }

                    if(!empty(Request::get('mobile_number')))
                    {
                        $return = $return->where('users.mobile_number','like','%'.Request::get('mobile_number').'%');
                    }


                    if(!empty(Request::get('marital_status')))
                    {
                        $return = $return->where('users.marital_status','like','%'.Request::get('marital_status').'%');
                    }

                    if(!empty(Request::get('address')))
                    {
                        $return = $return->where('users.address','like','%'.Request::get('address').'%');
                    }

                    if(!empty(Request::get('admission_date')))
                    {
                        $return = $return->whereDate('users.admission_date','=',Request::get('admission_date'));
                    }


                    if(!empty(Request::get('date')))
                    {
                        $return = $return->whereDate('users.created_at','=',Request::get('date'));
                    }


                    if(!empty(Request::get('status')))
                    {
                        $status = (Request::get('status') == 100)? 0 : 1;
                        $return = $return->where('users.status','=',$status);
                    }


        $return = $return->orderBy('users.id','desc')
                            ->paginate(20);
            return $return;
  }

  static public function getLecturerStudentCount($lecturer_id)
  {
   $return = self::select('users.id')
                   ->join('class','class.id','=','users.class_id')
                   ->join('assign_class_lecturer','assign_class_lecturer.class_id','=','class.id')
                   ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                   ->where('assign_class_lecturer.status', '=', 0)
                   ->where('assign_class_lecturer.is_delete', '=', 0)
                   ->where('users.user_type', '=', 3)
                   ->where('users.is_delete', '=', 0)
                   ->orderBy('users.id','desc')
                //    ->groupBy('users.id')
                   ->count();
   return $return;
  }


  static public function getStudentClass($class_id){
        return self::select('users.id','users.name','users.last_name','users.admission_number')
            ->where('users.user_type','=',3)
            ->where('users.is_delete','=',0)
            ->where('users.class_id','=',$class_id)
            ->orderBy('users.id','desc')
            ->get();
  }

  static public function getLecturerStudent($lecturer_id)
   {
    $return = self::select('users.*','class.name as class_name')
                    ->join('class','class.id','=','users.class_id')
                    ->join('assign_class_lecturer','assign_class_lecturer.class_id','=','class.id')
                    ->where('assign_class_lecturer.lecturer_id', '=', $lecturer_id)
                    ->where('assign_class_lecturer.status', '=', 0)
                    ->where('assign_class_lecturer.is_delete', '=', 0)
                    ->where('users.user_type', '=', 3)
                    ->where('users.is_delete', '=', 0);
   $return =    $return->orderBy('users.id','desc')
                        ->groupBy('users.id')
                    ->paginate(30);
    return $return;
   }

  static public function getLecturerClass()
  {
       $return = self::select('users.*')
                       ->where('users.user_type', '=', 2)
                       ->where('users.is_delete', '=', 0);
       $return = $return->orderBy('users.id','desc')
                           ->get();
           return $return;
 }


 static public function getAttendance($student_id,$class_id,$attendance_date){
    return StudentAttendanceModel::CheckAlreadyAttendance($student_id,$attendance_date,$class_id);

 }


}


