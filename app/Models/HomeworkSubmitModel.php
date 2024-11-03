<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeworkSubmitModel extends Model
{
    use HasFactory;

    protected $table = 'homework_submit';


    // this function is used to get homework submission records for a specific student and class and date range based on user's input from the request query parameters
   static public function getRecordStudent($student_id){
    $return = HomeworkSubmitModel::select('homework_submit.*','class.name as class_name','subject.name as subject_name')
                    ->join('homework','homework.id','=','homework_submit.homework_id')
                    ->join('class','class.id','=','homework.class_id')
                    ->join('subject','subject.id','=','homework.subject_id')
                    ->where('homework_submit.student_id',$student_id);

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
                        $return = $return->whereDate('homework_submit.created_at','>=',Request::get('from_created_date'));
                    }
                    if(!empty(Request::get('to_created_date')))
                    {
                        $return = $return->whereDate('homework_submit.created_at','<=',Request::get('to_created_date'));
                    }

    $return = $return->orderBy('homework_submit.id','desc')
                    ->paginate(20);
    return $return;
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

 public function getHomework(){
    return $this->belongsTo(HomeworkModel::class,'homework_id');
 }
}