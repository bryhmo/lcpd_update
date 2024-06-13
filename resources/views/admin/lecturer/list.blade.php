
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Lecturers List (Total : {{ $getRecord->total()}})</h1>
        </div>

        <div class="col-sm-6" style="text-align: right;">
          <a href="{{url('admin/lecturer/add')}}" class="btn btn-primary" >Add New Lecturer</a>
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
              <h4 class="card-title">Search Lecturer</h4>
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
                    <label>Gender</label>
                    <select class="form-control" name="gender">
                      <option  value="">Select Gender</option>
                      <option {{ (Request::get('gender') == 'Male') ? 'selected':""}} value="Male">Male</option>
                      <option {{ (Request::get('gender') == 'Female') ? 'selected':""}} value="Female">Female</option>
                   </select>
                  </div>

                  <div class="form-group col-md-2">
                    <label>Current Address</label>
                    <input type="text" class="form-control" placeholder="Current Address" name="address" value="{{ Request::get('address')}}">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Marital Status</label>
                    <input type="text" class="form-control" placeholder="Marital Status" name="marital_status" value="{{ Request::get('marital_status')}}">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Mobile Number</label>
                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobile_number" value="{{ Request::get('mobile_number')}}">
                  </div>

                  <div class="form-group col-md-2">
                    <label>Date of Joining</label>
                    <input type="date" class="form-control" name="admission_date" value="{{ Request::get('admission_date')}}">
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
                    <a href="{{url('admin/lecturer/list')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                  </div>
                </div>
            </div>
          </form>
        </div>

          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lecturer's List </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0" style="overflow: auto;">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Lecturer Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Date of Joining</th>
                    <th>Mobile Number</th>
                    <th>Marital Status</th>
                    <th>Current Address</th>
                    <th>Permanent Address</th>
                    <th>Qualification</th>
                    <th>Work Experience</th>
                    <th>Note</th>
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
                    <td>{{$value->gender}}</td>
                    <td>
                      @if (!empty($value->date_of_birth))
                      {{ date('d-m-Y',strtotime($value->date_of_birth))}}  
                      @endif
                    </td>
                    <td>
                      @if (!empty($value->admission_date))
                      {{ date('d-m-Y',strtotime($value->admission_date))}}  
                      @endif
                    </td>
                  
                    <td>{{$value->mobile_number}}</td>
                    <td>{{$value->marital_status}}</td>
                    <td>{{$value->address}}</td>
                    <td>{{$value->permanent_address}}</td>
                    <td>{{$value->qualification}}</td>
                    <td>{{$value->work_experience}}</td>
                    <td>{{$value->note}}</td>
                    <td>{{($value->status==0)? 'Active':'Inactive'}}</td>
                    <td>{{ date('d:m:Y h:i:A',strtotime($value->created_at))}}</td>
                    <td style="min-width: 150px;">
                      <a href="{{url('admin/lecturer/edit/'.$value->id)}}" class="btn btn-primary btn-sm">Edit</a>
                      <a href="{{url('admin/lecturer/delete/'.$value->id)}}" class="btn btn-danger btn-sm">Delete</a>
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