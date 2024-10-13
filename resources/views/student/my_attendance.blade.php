
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Attendance </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">




    {{-- @if(!empty(Request::get('class_id'))&& !empty(Request::get('attendance_date'))) --}}
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Attendance List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped" style="background-color:rgba(135, 59, 206, 0.424)">
                <thead>
                    <tr>
                        <th>Program</th>
                        <th>Student Name</th>
                        <th>Admission Number</th>
                        <th>Attendance</th>
                        <th>Attendance Date</th>
                        <th>Created Date</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
              </table>

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
