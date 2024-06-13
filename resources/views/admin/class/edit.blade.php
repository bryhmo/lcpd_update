
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Program</h1>
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
                  <input type="text" class="form-control" placeholder="Enter Class Name" value="{{$getRecord->name}}" name="name" required>
                </div>
                <div class="form-group">
                  <label>Amount ($)</label>
                  <input type="number" min="5" class="form-control" placeholder="Amount" value="{{$getRecord->amount}}" name="amount" required>
                </div>
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control" name="status" aria-placeholder="Select Status">
                     <option {{ ($getRecord->name == 0)?'selected': '' }} value="0">Active</option>
                     <option {{ ($getRecord->name == 1)?'selected': ''}} value="1">Inactive</option>
                  </select>
                 
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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