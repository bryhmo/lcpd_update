
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Subject</h1>
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
            <form method="POST" action="{{url('/admin/subject/add')}}">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label> Subject Name</label>
                  <input type="text" class="form-control" placeholder="Enter Subject Name" name="name" required>
                </div>
                <div class="form-group">
                  <label> Subject Code</label>
                  <input type="text" class="form-control" placeholder="Enter Subject code" name="code" required>
                </div>
                <div class="form-group">
                  <label> Subject Units</label>
                  <input type="number" class="form-control" placeholder="Enter Subject Units" value="3" min="1"  max="6" name="unit" required>
                </div>
                <div class="form-group">
                  <label>Subject Type</label>
                  <select class="form-control" name="type" aria-placeholder="Select Type">
                     <option value="">Select Type</option>
                     <option value="theory">Theory</option>
                     <option value="practical">Practical</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" aria-placeholder="Select Status">
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