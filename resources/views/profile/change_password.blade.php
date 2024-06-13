
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Change Password</h1>
        </div>
       
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          @include('_message')
          <div class="card card-primary">
            <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label> Old Password</label>
                  <input type="password" class="form-control" placeholder="Old Password" name="old_password" required>
                </div>
                <div class="form-group">
                  <label>New Password</label>
                  <input type="password" class="form-control" placeholder="New Password " name="new_password" required>
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