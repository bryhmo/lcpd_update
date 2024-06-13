
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Student List (Total : {{ $getRecord->total()}})</h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/student/add')}}" class="btn btn-primary" >Add New Student</a>
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
              <h4 class="card-title">Search Student</h4>
            </div>
             <form method="get" action="">
              <div class="card-body">
               @csrf
              
                
                <div class="row">
                  <div class="form-group col-md-2">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{ Request::get('name')}}" >
                  </div>
                  <div class="form-group col-md-2">
                    <label>Last Name</label>
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ Request::get('last_name')}}" >
                  </div>
                  <div class="form-group col-md-2">
                    <label>Admission Number</label>
                    <input type="text" class="form-control" placeholder="Admission Number" name="admission_number" value="{{ Request::get('admission_number')}}" >
                  </div>
                  <div class="form-group col-md-2">
                    <label>Role Number</label>
                    <input type="text" class="form-control" placeholder="Role Number" name="role_number" value="{{ Request::get('role_number')}}" >
                  </div>
                  <div class="form-group col-md-2">
                    <label>Program</label>
                    <input type="text" class="form-control" placeholder="Class" name="class" value="{{ Request::get('class')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                      <option  value="">Select Gender</option>
                      <option {{ (Request::get('gender') == 'Male') ? 'selected':""}} value="Male">Male</option>
                      <option {{ (Request::get('gender') == 'Female') ? 'selected':""}} value="Female">Female</option>
                   </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Nationality</label>
                    <input type="text" class="form-control" placeholder="Nationality" name="nationality" value="{{ Request::get('nationality')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Religion</label>
                    <input type="text" class="form-control" placeholder="Religion" name="religion" value="{{ Request::get('religion')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" value="{{ Request::get('mobile_number')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Admission Date</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Blood Group</label>
                    <input type="text" class="form-control" placeholder="Blood Group" name="blood_group" value="{{ Request::get('blood_group')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option  value="">Select Status</option>
                      <option {{ (Request::get('status') == 100) ? 'selected':""}} value="100">Active</option>
                      <option {{ (Request::get('status') == 1) ? 'selected':""}} value="1">Inactive</option>
                   </select>
                   </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label>Email</label>
                    <input type="text" class="form-control"  placeholder="Email" name="email" value="{{ Request::get('email')}}">
                  </div>
                  <div class="form-group col-md-2">
                    <label>Created Date</label>
                    <input type="date" class="form-control"  name="date" value="{{ Request::get('date')}}">
                  </div>
                  <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                    <a href="{{url('admin/student/list')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                  </div>
                </div>
            </div>
          </form>
        </div>

          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Student List </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admission Number</th>
                    <th>Role Number</th>
                    <th>Program</th>
                    <th>Gender</th>
                    <th>DateofBirth</th>
                    <th>Nationality</th>
                    <th>State</th>
                    <th>Religion</th>
                    <th>Mobile Number</th>
                    <th>Adimission Date</th>
                    <th>Blood Group</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($getRecord as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>
                      @if (!empty($value->profile_pic))
                        <img src="{{$value->getProfile()}}" style="height: 50px;width:50px;border-radius:50px;">
                      @endif
                    </td>
                    <td>{{$value->name}} {{$value->last_name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->admission_number}}</td>
                    <td>{{$value->role_number}}</td>
                    <td>{{$value->class_name}}</td>
                    <td>{{$value->gender}}</td>
                    <td>{{$value->date_of_birth}}</td>
                    <td>{{$value->nationality}}</td>
                    <td>{{$value->states}}</td>
                    <td>{{$value->religion}}</td>
                    <td>{{$value->mobile_number}}</td>
                    <td>{{$value->admission_date}}</td>
                    <td>{{$value->blood_group}}</td>
                    <td>{{$value->height}}</td>
                    <td>{{$value->weight}}</td>
                    <td>{{($value->status==0)? 'Active':'Inactive'}}</td>
                    <td>{{ date('d:m:Y h:i:A',strtotime($value->created_at))}}</td>
                    <td style="min-width: 150px;">
                      <a href="{{url('admin/student/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{url('admin/student/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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