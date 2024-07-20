
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
               <form  name="POST" class="SubmitForm">
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
            <div class="card-body p-0">
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
                     <form method="post" class="submitform">
                        @csrf
                        <tr>
                            <td>{{$student->name}} {{$student->last_name}}</td>

                            @foreach ( $getSubject as  $subject)
                            <td>
                                <div style="margin-bottom: 10px">
                                    Class Work
                                    <input type="text" name="class_name" style="width: 200px" placeholder="Enter Marks" class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Assignment
                                    <input type="text" name="assignment" style="width: 200px" placeholder="Enter Marks"  class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Test Mark
                                    <input type="text" name="test_marks" style="width: 200px" placeholder="Enter Marks"  class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Project
                                    <input type="text" name="project" style="width: 200px" placeholder="Enter Marks"  class="form-control">
                                </div>
                                <div  style="margin-bottom: 10px">
                                    Exam
                                    <input type="text"  name="exam_marks"  style="width: 200px" placeholder="Enter Marks"  class="form-control">
                                </div>
                            </td>

                            @endforeach
                            <td>
                                <button type="submit" class="btn btn-success">Save</button>
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
<script type="text/javascript">
$('.SubmitForm').submit(function(e){
e.preventDefault();
$.ajax({
    type:"POST",
    url:"{{url('admin/examination/submit_marks_register')}}",
    data:$(this).serilize(),
    dataType:"json",
    success:function(data){

    }
});



});


</script>
@endsection
