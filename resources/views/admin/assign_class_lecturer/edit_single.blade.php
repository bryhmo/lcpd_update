
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red;">Edit Assign Program Lecturer</h1>
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
                    <option {{ ($getRecord->class_id == $class->id)?'selected' : ''}} value="{{$class->id }}">{{$class->name}}</option>
                    @endforeach
                 </select>
                </div>
                <div class="form-group">
                  <label>Lecturer Name</label>
                  <select class="form-control" name="lecturer_id"  required>
                    <option value="">Select Lecturer</option>
                    @foreach($getLecturer as $lecturer)
                    <option {{ ($getRecord->lecturer_id == $lecturer->id)?'selected' : ''}} value="{{$lecturer->id }}">{{ $lecturer->name }} {{ $lecturer->last_name }}</option>
                    @endforeach
                 </select>
                </div>
                
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" >
                     <option {{ ($getRecord->status == 0)?'selected' : ''}} value="0">Active</option>
                     <option {{ ($getRecord->status == 1)?'selected' : ''}} value="1">Inactive</option>
                  </select>
                 
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">update</button>
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