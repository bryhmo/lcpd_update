
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Student Attendance</h1>
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
                <h4 class="card-title">Search Student Attendance</h4>
              </div>
               <form  method="get" action="">
                <div class="card-body">
                 @csrf
                  <div class="row">


                      <div class="form-group col-md-3">
                        <label>Programs</label>
                          <select class="form-control" name="class_id" id="getClass" required>
                            <option value="">select</option>
                              @foreach ($getClass as $class)
                                <option {{ (Request::get('class_id')== $class->id)? 'selected':''}}  value="{{$class->id}}">{{$class->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label>Attendance date</label>
                        <input type="date" class="form-control" value="{{Request::get('attendance_date')}}" name="attendance_date" id="getAttendanceDate" required>
                      </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/attendance/student')}}" class="btn btn-success" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>

    @if(!empty(Request::get('class_id'))&& !empty(Request::get('attendance_date')))
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Student List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped" style="background-color:rgba(135, 59, 206, 0.424)">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Admission Number</th>
                        <th>Attendance</th>
                    </tr>
                </thead>
                <tbody>
                @if(!empty($getStudent) && !empty($getStudent->count()))
                     @foreach ($getStudent as  $value)

                     @php
                        $attendance_type = '';
                        $getAttendance = $value->getAttendance($value->id, Request::get('class_id'), Request::get('attendance_date'));

                        // print_r($getAttendance);
                        if (!empty($getAttendance->attendance_type)) {
                            $attendance_type = $getAttendance->attendance_type;
                        }

                     @endphp
                     <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}} {{ $value->last_name}}</td>
                        <td>{{$value->admission_number}}</td>
                        <td>
                            <label style="margin-right:10px" for="">
                                <input type="radio"  {{ ($attendance_type == '1') ? 'checked':''}}   name="attendance{{$value->id}}" id="{{$value->id}}" value="1" class="saveAttendance">Present
                            </label>
                            <label style="margin-right: 10px" for="">
                                <input type="radio"  {{ ($attendance_type == '2') ? 'checked':''}}  name="attendance{{$value->id}}"  id="{{$value->id}}"  value="2" class="saveAttendance">Late
                            </label>
                            <label style="margin-right:10px" for="">
                                <input type="radio"   {{ ($attendance_type == '3') ? 'checked':''}}   name="attendance{{$value->id}}"  id="{{$value->id}}"  value="3" class="saveAttendance">Absent
                            </label>
                            <label  for="">
                                <input type="radio"   {{ ($attendance_type == '4') ? 'checked':''}}    name="attendance{{$value->id}}"  id="{{$value->id}}"  value="4" class="saveAttendance">Half Day
                            </label>
                        </td>
                     </tr>

                     @endforeach

                    @endif
                </tbody>
              </table>
            </div>
          </div>
      @endif
          <!-- /.card -->
        </div>
      </div>

    </div>
  </section>
  <!-- /.content -->
</div>

@endsection



@section('script')
<script>
$('.saveAttendance').change(function(e){
  var student_id = $(this).attr('id');
  var attendance_type = $(this).val();
  var class_id = $('#getClass').val();
  var attendance_date = $('#getAttendanceDate').val();
  $.ajax({
    type:"POST",
    url:"{{url('admin/attendance/student/save')}}",
    data:{
        "_token":"{{ csrf_token()}}",
        student_id:student_id,
        attendance_type:attendance_type,
        class_id: class_id,
        attendance_date: attendance_date,
    },
    dataType:"json",
    success:function(data){
        alert(data.message);
    }
});

});



</script>
@endsection
