
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Mark Register</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">

            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Search Mark Register</h4>
              </div>
               <form  method="get" action="">
                <div class="card-body">
                 @csrf
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Exam</label>
                        <select class="form-control" name="exam_id" required>
                          <option value="">select</option>
                            @foreach ($getExam as $exam)
                            <option {{ (Request::get('exam_id')== $exam->id)? 'selected':''}} value="{{$exam->id}}">{{$exam->name}}</option>
                            @endforeach
                        </select>
                    </div>

                      <div class="form-group col-md-3">
                        <label>Programs</label>
                          <select class="form-control" name="class_id" required>
                            <option value="">select</option>
                              @foreach ($getClass as $class)
                                <option {{ (Request::get('class_id')== $class->id)? 'selected':''}}  value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach
                          </select>
                      </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/examinations/marks_register')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>

          @include('_message')

@if (!empty($getSubject) && !empty($getSubject->count()))
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Mark Register</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Student Name</th>
                    @foreach($getSubject as $subject)
                     <th>
                        {{$subject->subject_name}} <br/>
                        ({{$subject->subject_type}} : {{$subject->passing_marks}}/ {{$subject->full_marks}})

                     </th>
                    @endforeach
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    @if(!empty($getStudent) && !empty($getStudent->count()))
                     @foreach ($getStudent as $student)
                     <form name="post" class="SubmitForm">
                        @csrf
                        <input type="hidden" name="student_id" value="{{$student->id}}">
                        <input type="hidden" name="exam_id" value="{{Request::get('exam_id')}}">
                        <input type="hidden" name="class_id" value="{{Request::get('class_id')}}">
                        <tr>
                            <td>{{$student->name}} {{$student->last_name}}</td>
                          @php
                            $i = 1;
                            $totalStudentMark = 0;
                            $totalFullMarks = 0;
                            $totalPassingMark = 0;
                            $pass_fail_vali = 0;
                          @endphp
                            @foreach ( $getSubject as  $subject)

                            @php
                                $totalMark = 0;
                                $totalFullMarks = $totalFullMarks + $subject->full_marks;
                                $totalPassingMark = $totalPassingMark + $subject->passing_marks;
                                $getMark = $subject->getMark($student->id,Request::get('exam_id'),Request::get('class_id'),$subject->subject_id);

                                if(!empty($getMark))
                                {
                                    $totalMark = $getMark->classwork_score + $getMark->assignment_score + $getMark->exam_score + $getMark->project_score + $getMark->test_score;
                                }
                                $totalStudentMark = $totalStudentMark + $totalMark;
                            @endphp
                            <td>
                                <div style="margin-bottom: 10px">
                                    Class Work
                                    <input type="hidden" name="mark[{{$i}}][id]" value="{{$subject->id}}">
                                    <input type="hidden" name="mark[{{$i}}][subject_id]" value="{{$subject->subject_id}}">
                                    <input type="text" name="mark[{{$i}}][classwork_score]" style="width: 200px" placeholder="Enter Marks"  id="classwork_score_{{$student->id}}{{$subject->subject_id}}"  value="{{!empty($getMark->classwork_score)? $getMark->classwork_score :''}}"  class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Assignment
                                    <input type="text" name="mark[{{$i}}][assignment_score]" style="width: 200px" placeholder="Enter Marks" id="assignment_score_{{$student->id}}{{$subject->subject_id}}" value="{{!empty($getMark->assignment_score)? $getMark->assignment_score:''}}"  class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Test Mark
                                    <input type="text" name="mark[{{ $i }}][test_score]" style="width: 200px" placeholder="Enter Marks" id="test_score_{{$student->id}}{{$subject->subject_id}}" value="{{!empty($getMark->test_score) ? $getMark->test_score:''}}" class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Project
                                    <input type="text" name="mark[{{ $i }}][project_score]"    style="width: 200px" placeholder="Enter Marks" id="project_score_{{$student->id}}{{$subject->subject_id}}" value="{{!empty($getMark->project_score)?$getMark->project_score:''}}" class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Exam
                                    <input type="text"  name="mark[{{ $i }}][exam_score]"  style="width: 200px" placeholder="Enter Marks" id="exam_score_{{$student->id}}{{$subject->subject_id}}" value="{{!empty($getMark->exam_score)?$getMark->exam_score:''}}"  class="form-control">
                                </div>
                                <div style="margin-bottom: 10px">
                                  <button type="button" class="btn btn-primary saveSingleSubject" id="{{$student->id}}" data-val="{{$subject->subject_id}}" data-exam="{{Request::get('exam_id')}}" data-schedule="{{$subject->id}}"  data-class="{{Request::get('class_id')}}">save</button>
                                </div>
                                @if(!empty($getMark))
                                  <div style="margin-bottom: 10px">
                                    <b>Total Mark :</b>{{$totalMark}} <br/>
                                    <b>Passing Mark :</b>{{$subject->passing_marks}} <br/>
                                    @if($totalMark >= $subject->passing_marks)
                                    <span style="color: green; font-weight:bold">Pass</span>
                                    @else
                                    <span style="color: red; font-weight:bold">Fail</span>
                                      @php
                                        $pass_fail_vali = 1;
                                      @endphp
                                    @endif
                                  </div>

                                @endif


                                </div>
                            </td>
                            @php
                             $i ++;
                            @endphp
                            @endforeach
                            <td style="min-width: 250px">
                                <button type="submit" class="btn btn-success">Save</button>
                                @if (!empty($totalStudentMark))
                                  <br/>
                                  <br/>
                                  <b>Total Subject Mark : </b> {{$totalFullMarks}}
                                  <br/>
                                  <b>Total Passing Mark : </b> {{$totalPassingMark}}
                                  <br/>
                                  <b>Total Student Mark : </b>{{$totalStudentMark}}
                                  <br/>
                                  @php
                                    $percentage = ($totalStudentMark * 100)/$totalFullMarks;
                                  @endphp
                                  <br>
                                  percentage : {{round($percentage,2)}}%
                                  <br>
                                  @if ($pass_fail_vali == 0)
                                    Result : <span style="color: green; font-weight:bold">Pass</span>
                                  @else
                                    Result : <span style="color: red; font-weight:bold">Fail</span>
                                  @endif
                                @endif
                            </td>
                        </tr>
                     </form>
                    @endforeach

                    @endif


                </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
    @endif
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection



@section('script')
<script>
$('.SubmitForm').submit(function(e){
e.preventDefault();
$.ajax({
    type:"POST",
    url:"{{url('admin/examinations/submit_marks_register')}}",
    data:$(this).serialize(),
    dataType:"json",
    success:function(data){
        alert(data.message);

    }
});



});

$('.saveSingleSubject').click(function(e){
  var student_id = $(this).attr('id');
  var subject_id = $(this).attr('data-val');
  var exam_id = $(this).attr('data-exam');
  var class_id = $(this).attr('data-class');
  var id = $(this).attr('data-schedule');

  var classwork_score = $('#classwork_score_'+student_id+subject_id).val();
  var assignment_score = $('#assignment_score_'+student_id+subject_id).val();
  var test_score = $('#test_score_'+student_id+subject_id).val();
  var project_score = $('#project_score_'+student_id+subject_id).val();
  var exam_score = $('#exam_score_'+student_id+subject_id).val();


  $.ajax({
    type:"POST",
    url:"{{url('admin/examinations/single_submit_marks_register')}}",
    data:{
        "_token":"{{ csrf_token()}}",
        id:id,
      student_id: student_id,
      subject_id: subject_id,
      exam_id: exam_id,
      class_id: class_id,
      classwork_score: classwork_score,
      assignment_score: assignment_score,
      test_score: test_score,
      project_score: project_score,
      exam_score: exam_score,
    },
    dataType:"json",
    success:function(data){
        alert(data.message);

    }
});

});


</script>
@endsection
