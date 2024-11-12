<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseMaterialModel extends Model
{
    use HasFactory;

    protected $table = 'course_material';




    static public function getSingle($id){
        return CourseMaterialModel::find($id);
    }

    static public function getRecord(){
        $return = CourseMaterialModel::select('course_material.*','class.name as class_name','subject.name as subject_name','subject.code as subject_code','users.name as created_by_name')
                ->join('users','users.id','=','course_material.created_by')
                ->join('class','class.id','=','course_material.class_id')
                ->join('subject','subject.id','=','course_material.subject_id')
                ->where('course_material.is_delete','=',0);

                if(!empty(Request::get('class_name')))
                {
                    $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
                }
                if(!empty(Request::get('subject_name')))
                {
                    $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
                }
                if(!empty(Request::get('subject_code')))
                {
                    $return = $return->where('subject.code','like','%'.Request::get('subject_code').'%');
                }

                if(!empty(Request::get('from_created_date')))
                {
                    $return = $return->whereDate('course_material.created_at','>=',Request::get('from_created_date'));
                }
                if(!empty(Request::get('to_created_date')))
                {
                    $return = $return->whereDate('course_material.created_at','<=',Request::get('to_created_date'));
                }




                $return = $return->orderBy('course_material.id','desc')
                ->paginate(20);
        return $return ;

    }


    public function getDocument(){
        if(!empty($this->document_file && file_exists(public_path().'/upload/course_material/'.$this->document_file))){
          return url('upload/course_material/'.$this->document_file);
        }

        else{
         // return asset('images/default.png');
         return "";
        }

     }




       //this function allows only the program that was assign to a lecturer to display and also with there respective subject , and also work for filtering
    static public function getRecordLecturer($class_ids){
        $return = CourseMaterialModel::select('course_material.*','class.name as class_name','subject.name as subject_name','subject.code as subject_code','users.name as created_by_name')
                ->join('users','users.id','=','course_material.created_by')
                ->join('class','class.id','=','course_material.class_id')
                ->join('subject','subject.id','=','course_material.subject_id')
                ->whereIn('course_material.class_id',$class_ids)
                ->where('course_material.is_delete','=',0);

                if(!empty(Request::get('class_name')))
                {
                    $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
                }


                if(!empty(Request::get('subject_name')))
                {
                    $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
                }


                if(!empty(Request::get('subject_code')))
                {
                    $return = $return->where('subject.code','like','%'.Request::get('subject_code').'%');
                }
                if(!empty(Request::get('from_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','>=',Request::get('from_created_date'));
                }
                if(!empty(Request::get('to_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','<=',Request::get('to_created_date'));
                }




                $return = $return->orderBy('course_material.id','desc')
                ->paginate(20);
        return $return ;

    }

}
