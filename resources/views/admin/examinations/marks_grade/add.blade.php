
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Add New Marks Grade</h1>
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
                  <label>Grade Name</label>
                  <input type="text" class="form-control" placeholder="Grade Name" name="name" value="{{old('name')}}" required>
                </div>

                <div class="form-group">
                  <label>Percent From</label>
                  <input type="number" class="form-control"  name="percent_from" value="{{old('percent_from')}}" required>
                </div>

                <div class="form-group">
                  <label>Percent To</label>
                  <input type="number" class="form-control"  name="percent_to" value="{{old('percent_to')}}" required>
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
