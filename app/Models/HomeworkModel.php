<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeworkModel extends Model
{
    use HasFactory;

    protected $table = "homework";


    static public function getSingle($id){
        return HomeworkModel::find($id);
    }

    static public function getRecord(){
        $return = HomeworkModel::select('homework.*','class.name as class_name','subject.name as subject_name','users.name as created_by_name')
                ->join('users','users.id','=','homework.created_by')
                ->join('class','class.id','=','homework.class_id')
                ->join('subject','subject.id','=','homework.subject_id')
                ->where('homework.is_delete','=',0);

                if(!empty(Request::get('class_name')))
                {
                    $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
                }
                if(!empty(Request::get('subject_name')))
                {
                    $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
                }

                if(!empty(Request::get('from_homework_date')))
                {
                    $return = $return->where('homework.homework_date','>=',Request::get('from_homework_date'));
                }
                if(!empty(Request::get('to_homework_date')))
                {
                    $return = $return->where('homework.homework_date','<=',Request::get('to_homework_date'));
                }

                if(!empty(Request::get('from_submission_date')))
                {
                    $return = $return->where('homework.submission_date','>=',Request::get('from_submission_date'));
                }
                if(!empty(Request::get('to_submission_date')))
                {
                    $return = $return->where('homework.submission_date','<=',Request::get('to_submission_date'));
                }
                if(!empty(Request::get('from_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','>=',Request::get('from_created_date'));
                }
                if(!empty(Request::get('to_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','<=',Request::get('to_created_date'));
                }




                $return = $return->orderBy('homework.id','desc')
                ->paginate(20);
        return $return ;

    }


    //this function allows only the program that was assign to a lecturer to display and also with there respective subject , and also work for filtering
    static public function getRecordLecturer($class_ids){
        $return = HomeworkModel::select('homework.*','class.name as class_name','subject.name as subject_name','users.name as created_by_name')
                ->join('users','users.id','=','homework.created_by')
                ->join('class','class.id','=','homework.class_id')
                ->join('subject','subject.id','=','homework.subject_id')
                ->whereIn('homework.class_id',$class_ids)
                ->where('homework.is_delete','=',0);

                if(!empty(Request::get('class_name')))
                {
                    $return = $return->where('class.name','like','%'.Request::get('class_name').'%');
                }
                if(!empty(Request::get('subject_name')))
                {
                    $return = $return->where('subject.name','like','%'.Request::get('subject_name').'%');
                }

                if(!empty(Request::get('from_homework_date')))
                {
                    $return = $return->where('homework.homework_date','>=',Request::get('from_homework_date'));
                }
                if(!empty(Request::get('to_homework_date')))
                {
                    $return = $return->where('homework.homework_date','<=',Request::get('to_homework_date'));
                }

                if(!empty(Request::get('from_submission_date')))
                {
                    $return = $return->where('homework.submission_date','>=',Request::get('from_submission_date'));
                }
                if(!empty(Request::get('to_submission_date')))
                {
                    $return = $return->where('homework.submission_date','<=',Request::get('to_submission_date'));
                }
                if(!empty(Request::get('from_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','>=',Request::get('from_created_date'));
                }
                if(!empty(Request::get('to_created_date')))
                {
                    $return = $return->whereDate('homework.created_at','<=',Request::get('to_created_date'));
                }




                $return = $return->orderBy('homework.id','desc')
                ->paginate(20);
        return $return ;

    }

    public function getDocument(){
       if(!empty($this->document_file && file_exists(public_path().'/upload/homework/'.$this->document_file))){
         return url('upload/homework/'.$this->document_file);
       }

       else{
        // return asset('images/default.png');
        return "";
       }

    }
}
