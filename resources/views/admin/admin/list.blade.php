
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Admin List (Total : {{ $getRecord->total()}})</h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/admin/add')}}" class="btn btn-primary" >Add New Admin</a>
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
                <h4 class="card-title">Search Admin</h4>
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
                      <a href="{{url('admin/admin/list')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>





          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Admin List </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{ date('d:m:Y h:i:A',strtotime($value->created_at))}}</td>
                    <td>
                      <a href="{{url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                      <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              <div style="padding: 10px;float:right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
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