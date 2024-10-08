
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Student Application List </h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/users/create')}}" class="btn btn-primary" >Add New Applicant</a>
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
                <h4 class="card-title">Search Applicant</h4>
              </div>
               <form method="get" action="">
                <div class="card-body">
                 @csrf


                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Name</label>
                      <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ Request::get('name')}}" >
                    </div>
                    <div class="form-group col-md-3">
                      <label>Email</label>
                      <input type="text" class="form-control"  placeholder="Email" name="email" value="{{ Request::get('email')}}">
                    </div>
                    <div class="form-group col-md-3">
                      <label>Date</label>
                      <input type="date" class="form-control"  placeholder="Date" name="date" value="{{ Request::get('date')}}">
                    </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/users')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>





          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">New Application List </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">

                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admitted/NotAdmitted</th>
                        <th>Date of Application</th>
                        <th>Action</th>

                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>NotAdmitted</td>
                        <td>{{ date('d:m:Y h:i:A',strtotime($user->created_at))}}</td>
                        <td>
                          <a href="{{url('admin/admin/edit/'.$user->id)}}" class="btn btn-primary">Edit</a>
                          <a href="{{url('admin/admin/edit/'.$user->id)}}" class="btn btn-success">view</a>
                          <a href="{{url('admin/admin/delete/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>


              <div style="padding: 10px;float:right">
                {!! $users->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
              </div>
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

@section('script')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
