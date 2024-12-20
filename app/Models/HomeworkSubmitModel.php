<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeworkSubmitModel extends Model
{
    use HasFactory;

    protected $table = 'homework_submit';


    // this function is used to get homework submission records for a specific student and class based on user's input from the request query parameters

    static public function getRecord($homework_id){
        $return = HomeworkSubmitModel::select('homework_submit.*','users.name as first_name','users.last_name as last_name')
                 ->join('users','users.id','=','homework_submit.student_id')
                 ->where('homework_submit.homework_id',$homework_id);

                    if(!empty(Request::get('first_name'))){
                             $return = $return->where('users.name','like','%'.Request::get('first_name').'%');
                    }

                    if(!empty(Request::get('last_name'))){
                             $return = $return->where('users.last_name','like','%'.Request::get('last_name').'%');
                    }

                     if(!empty(Request::get('from_created_date'))){
                             $return = $return->whereDate('homework_submit.created_at','>=',Request::get('from_created_date'));
                    }

                    if(!empty(Request::get('to_created_date'))){
                             $return = $return->whereDate('homework_submit.created_at','<=',Request::get('to_created_date'));
                    }

        $return = $return->orderBy('homework_submit.id','desc');
        $return = $return->paginate(50);
        return $return;


    }



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

    // this function is the function that is reporting the homework that has been submitted by the all the students irrespective of there department and there course of study in the lcpd
   static public function getHomeworkReport(){
    $return = HomeworkSubmitModel::select('homework_submit.*','class.name as class_name','subject.name as subject_name','users.name as first_name','users.last_name','users.admission_number as admission_number')
                    ->join('users','users.id','=','homework_submit.student_id')
                    ->join('homework','homework.id','=','homework_submit.homework_id')
                    ->join('class','class.id','=','homework.class_id')
                    ->join('subject','subject.id','=','homework.subject_id');

                    if(!empty(Request::get('admission_number'))){
                        $return = $return->where('users.admission_number','like','%'.Request::get('admission_number').'%');

                    }

                    if(!empty(Request::get('first_name'))){
                        $return = $return->where('users.name','like','%'.Request::get('first_name').'%');
                    }
                    if(!empty(Request::get('last_name'))){
                        $return = $return->where('users.last_name','like','%'.Request::get('last_name').'%');
                    }
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
 public function getStudent(){
    return $this->belongsTo(User::class,'student_id');
 }
}
