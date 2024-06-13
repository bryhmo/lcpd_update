 
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-9">
          <h1 style="color: red">My Timetable({{$getClass->name}} - {{$getSubject->name}}) </h1>
        </div>

        

      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title" style="text-transform:uppercase">
                    {{$getClass->name}} - {{$getSubject->name}}
                  </h3>
                </div> 
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td>Week</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Room Number</td>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $valueW)
                      <tr>
                        <td>{{  $valueW['week_name'] }}</td>
                        <td>{{  !empty($valueW['start_time'])? date('h:i:A',strtotime($valueW['start_time'])):'' }}</td>
                        <td>{{  !empty($valueW['end_time'])? date('h:i:A',strtotime($valueW['end_time'])):'' }}</td>
                        {{-- <td>{{  $valueW['room_number'] }}</td> --}}
                      </tr>  
                      @endforeach
                    </tbody>
                  </table>
                </div>
          
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


