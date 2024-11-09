
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 style="color: red">Homework Report</h1>
        </div>

      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card " >
                <div class="card-header">
                  <h4 class="card-title" style="color: rgba(255, 0, 0, 0.79)">Search Homework Report List</h4>
                </div>
                 <form method="get" action="">
                  <div class="card-body">
                   @csrf

                    <div class="row">

                      <div class="form-group col-md-3">
                        <label>Program</label>
                        <input type="text" class="form-control" placeholder="Program Name" name="class_name" value="{{ Request::get('class_name')}}" >
                      </div>

                      <div class="form-group col-md-3">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" value="{{ Request::get('subject_name')}}" >
                      </div>


                      <div class="form-group col-md-3">
                        <label>From Homework Date</label>
                        <input type="date" class="form-control"  name="from_homework_date" value="{{ Request::get('from_homework_date')}}">
                      </div>
                      <div class="form-group col-md-3">
                        <label>To Homework Date</label>
                        <input type="date" class="form-control"  name="to_homework_date" value="{{ Request::get('to_homework_date')}}">
                      </div>
                      <div class="form-group col-md-3">
                        <label>From Submission Date</label>
                        <input type="date" class="form-control"  name="from_submission_date" value="{{ Request::get('from_submission_date')}}">
                      </div>

                      <div class="form-group col-md-3">
                        <label>To Submission Date</label>
                        <input type="date" class="form-control"  name="to_submission_date" value="{{ Request::get('to_submission_date')}}">
                      </div>


                      <div class="form-group col-md-3">
                        <label>From Submitted Created Date</label>
                        <input type="date" class="form-control"  name="from_created_date" value="{{ Request::get('from_created_date')}}">
                      </div>


                      <div class="form-group col-md-3">
                        <label>To Submitted Created Date</label>
                        <input type="date" class="form-control"  name="to_created_date" value="{{ Request::get('to_created_date')}}">
                      </div>

                      <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                        <a href="{{url('admin/homework/homework_report')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                      </div>
                    </div>
                </div>
               </form>
             </div>



          @include('_message')
          <div class="card" style="background-color:rgba(157, 204, 91, 0.554)">
            <div class="card-header">
              <h3 class="card-title">Homework Report List</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                   <th>Student Name</th>
                    <th>Class</th>
                    <th>Subject</th>
                    <th>Homework Date</th>
                    <th>Submission Date</th>
                    <th>Document</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Submitted Document</th>
                    <th>Submitted Description</th>
                    <th>Submitted Created Date</th>
                  </tr>
                </thead>



                </table>

              <div style="padding: 10px;float:right">

              </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
