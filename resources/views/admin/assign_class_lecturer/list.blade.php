
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Assign Program Lecturer ({{$getRecord->total()}})</h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/assign_class_lecturer/add')}}" class="btn btn-primary" >Add New Assign Program Lecturer</a>
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
              <h4 class="card-title">Search Assign Program Lecturer</h4>
            </div>
                <form method="get" action="">
                  <div class="card-body">
                     @csrf
                    <div class="row">
                      <div class="form-group col-md-3">
                        <label> Program Name</label>
                        <input type="text" class="form-control" placeholder="Class Name" name="class_name" value="{{ Request::get('class_name')}}" >
                      </div>


                      <div class="form-group col-md-3">
                        <label>Lecturer Name</label>
                        <input type="text" class="form-control" placeholder="Lecturer Name" name="lecturer_name" value="{{ Request::get('lecturer_name')}}" >
                      </div>


                      <div class="form-group col-md-2">
                        <label>Status</label>
                        <select class="form-control" name="status">
                          <option value="">Select</option>
                          <option {{ ( Request::get('status') == 100)? 'selected': ''}} value="100">Active</option>
                          <option {{ ( Request::get('status') == 1)? 'selected':''}} value="1">Inactive</option>
                        </select>
                      </div>


                      <div class="form-group col-md-2">
                        <label>Date</label>
                        <input type="date" class="form-control"  placeholder="Date" name="date" value="{{ Request::get('date')}}">
                      </div>

                      <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                        <a href="{{url('admin/assign_class_lecturer/list')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                      </div>
                    </div>
                  </div>
              </form>
        </div>









            
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Assign Class Lecturer List </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Lecturer Name</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->class_name}}</td>
                    <td>{{$value->lecturer_name}}</td>
                    <td>
                      @if ($value->status==0)
                          Active      
                     @else
                          Inactive   
                     @endif
                    </td>
                    <td>{{$value->created_by_name}}</td>
                    <td>{{ date('d:m:Y H:i:A',strtotime($value->created_at))}}</td>
                    <td>
                      <a href="{{url('admin/assign_class_lecturer/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                      <a href="{{url('admin/assign_class_lecturer/edit_single/'.$value->id)}}" class="btn btn-primary">Edit Single</a>
                      <a href="{{url('admin/assign_class_lecturer/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                      
                  @endforeach
                 
                </tbody>
              </table>
              <div style="padding: 10px;float:right">
                 {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
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