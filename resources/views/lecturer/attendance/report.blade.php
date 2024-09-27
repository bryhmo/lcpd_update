
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Student Attendance Report  <span style="color: blue; font-weight:bold;">(Total : {{$getRecord->total()}})</span> </h1>
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
                <h4 class="card-title">Search Student Attendance Report</h4>
              </div>
               <form  method="get" action="">
                <div class="card-body">
                 @csrf
                  <div class="row">

                      <div class="form-group col-md-3">
                        <label>Student ID</label>
                        <input type="text" class="form-control" placeholder="Student ID" value="{{Request::get('student_id')}}" name="student_id" >
                      </div>

                      <div class="form-group col-md-3">
                        <label>student Name</label>
                        <input type="text" class="form-control"  placeholder="Student Name" value="{{Request::get('student_name')}}" name="student_name" >
                      </div>
                      <div class="form-group col-md-3">
                        <label>student Last Name</label>
                        <input type="text" class="form-control"  placeholder="Student  Last Name" value="{{Request::get('student_last_name')}}" name="student_last_name" >
                      </div>
                      <div class="form-group col-md-3">
                        <label>Programs</label>
                          <select class="form-control" name="class_id" id="getClass">
                            <option value="">select</option>
                              @foreach ($getClass as $class)
                                <option {{ (Request::get('class_id')== $class->class_id)? 'selected':''}}  value="{{$class->class_id}}">{{$class->class_name}}</option>
                              @endforeach
                          </select>
                      </div>


                      <div class="form-group col-md-3">
                        <label>Attendance date</label>
                        <input type="date" class="form-control" value="{{Request::get('attendance_date')}}" name="attendance_date" >
                      </div>


                      <div class="form-group col-md-3">
                        <label>Attendance Type</label>
                        <select class="form-control" name="attendance_type">
                            <option value="">select</option>
                            <option  value="1"  {{ (Request::get('attendance_type') == 1)? 'selected':''}}>Present</option>
                            <option  value="2" {{ (Request::get('attendance_type') == 2)? 'selected':''}}>Late</option>
                            <option  value="3" {{ (Request::get('attendance_type') == 3)? 'selected':''}}>Absent</option>
                            <option  value="4" {{ (Request::get('attendance_type') == 4)? 'selected':''}} >Half Day</option>
                          </select>
                      </div>


                    <div class="form-group col-md-2">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('lecturer/attendance/report')}}" class="btn btn-success" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>

    {{-- @if(!empty(Request::get('class_id'))&& !empty(Request::get('attendance_date'))) --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Attendance Report </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped" style="background-color:rgba(135, 59, 206, 0.424)">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Program</th>
                        <th>Student Name</th>
                        <th>Admission Number</th>
                        <th>Attendance</th>
                        <th>Attendance Date</th>
                        <th>Created By</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!empty($getRecord))
                        @forelse($getRecord as $value)
                        <tr>
                            <td>{{$value->student_id}}</td>
                            <td>{{$value->class_name}}</td>
                            <td>{{$value->student_name}} {{$value->student_last_name}}</td>
                            <td>{{$value->student_admission_number}}</td>
                            <td>
                                @if ($value->attendance_type == 1)
                                Present
                                @elseif($value->attendance_type == 2)
                                Late
                                @elseif($value->attendance_type == 3)
                                Absent
                                @elseif($value->attendance_type == 4)
                                Half Day
                                @endif
                            </td>
                            <td>{{ date('d-m-Y',strtotime($value->attendance_date))}}</td>
                            <td>{{$value->created_name}}</td>
                            <td>{{ date('d-m-Y H:i A',strtotime($value->created_at))}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="100%">No Record Found</td>
                        </tr>

                        @endforelse


                    @else
                        <tr>
                            <td colspan="100%">No Record Found</td>
                        </tr>

                    @endif



                </tbody>
              </table>
              @if(!empty($getRecord))
                <div style="padding: 10px;float:right">
                    {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
                </div>
             @endif
            </div>
          </div>
      {{-- @endif --}}
          <!-- /.card -->
        </div>
      </div>

    </div>
  </section>
  <!-- /.content -->
</div>

@endsection



@section('script')





@endsection
