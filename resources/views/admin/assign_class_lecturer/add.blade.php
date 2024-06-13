
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Assign Program Lecturer</h1>
        </div>
       
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label> Program Name</label>
                  <select class="form-control" name="class_id"  required>
                    <option value="">Select Program</option>
                    @foreach($getClass as $class)
                    <option value="{{$class->id }}">{{$class->name}}</option>
                    @endforeach
                 </select>
                </div>
                <div class="form-group">
                  <label> Lecturer Name</label>
                      @foreach($getLecturer as $lecturer)
                    <div>
                      <label style="font-weight:normal;">
                        <input type="checkbox" value="{{$lecturer->id}}" name="lecturer_id[]">{{ $lecturer->name }} {{ $lecturer->last_name }}
                      </label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" >
                     <option value="0">Active</option>
                     <option value="1">Inactive</option>
                  </select>
                 
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
</div>



@endsection