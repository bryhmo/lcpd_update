
@extends('layouts.app')

@section('content')
    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Program & Subject</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Program & Subject</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                   
                    <th>Program Name</th>
                    <th>Subject Name</th>
                    <th>Subject Type</th>
                    <th>Subject Code</th>
                    <th>Subject Unit</th>
                    <th>My Class Timetable</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
                  <tr>
                    <td>{{$value->class_name}}</td>
                    <td>{{$value->subject_name}}</td>
                    <td>{{$value->subject_type}}</td>
                    <td>{{$value->subject_code}}</td>
                    <td>{{$value->subject_unit}}</td>
                    <td style="color: red">
                      @php
                      $ClassSubject = $value->getMyTimetable($value->class_id,$value->subject_id);
                      @endphp

                      @if (!empty($ClassSubject))
                          {{ date('h:i:A',strtotime($ClassSubject->start_time))}} to   {{ date('h:i:A',strtotime($ClassSubject->end_time))}}
                          <br>
                          Room NUmber:{{ $ClassSubject->room_number}}
                      @endif


                    </td>
                    <td>{{ date('d:m:Y H:i:A',strtotime($value->created_at))}}</td>
                    <td>
                      <a href=" {{ url('lecturer/my_class_subject/class_timetable/'.$value->class_id. '/'.$value->subject_id) }}" class="btn btn-primary">My Class Timetable</a>
                    </td>
                    
                  </tr>  
                  @endforeach
                 
                </tbody>
              </table>
             
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection