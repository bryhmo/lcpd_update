 
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Exam Timetable </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          @include('_message')


           @foreach($getRecord as $value)

           <h2 style="font-size:32px;margin-bottom:15px;">Program : <span style="color: blue">{{ $value['class_name'] }}</span></h2>
            @foreach($value['exam'] as $exam)

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Exam Name :<b>{{ $exam['exam_name'] }}</b></h3>
                </div> 
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead style="font-weight: bold">
                      <tr>
                        <td>Subject Name</td>
                        <td>Subject Type</td>
                        <td>Code</td>
                        <td>Unit(s)</td>
                        <td>Day</td>
                        <td>Exam Date</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Room Number</td>
                        <td>Full Marks</td>
                        <td>Passing Marks</td>
                      </tr>
                    </thead>
                    
                    <tbody>
                      @foreach ($exam['subject'] as $valueS)
                      <tr>
                        <td>{{ $valueS['subject_name'] }}</td>
                        <td>{{ $valueS['subject_type'] }}</td>
                        <td>{{ $valueS['subject_code'] }}</td>
                        <td>{{ $valueS['subject_unit'] }}</td>
                        <td>{{ date('l',strtotime($valueS['exam_date'] ))}}</td>
                        <td>{{ date('d-m-Y',strtotime($valueS['exam_date'] ))}}</td>
                        <td>{{ date('h:i A',strtotime($valueS['start_time'] ))}}</td>
                        <td>{{ date('h:i A',strtotime($valueS['end_time'] ))}}</td>
                        <td>{{ $valueS['room_number'] }}</td>
                        <td>{{ $valueS['full_marks'] }}</td>
                        <td>{{ $valueS['passing_marks'] }}</td>
                      </tr>
                      @endforeach
                     
                     
                    </tbody>
                  </table>
            
                  
                </div>
          
              <!-- /.card-body -->
              </div>
            @endforeach
       @endforeach
          
          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection

