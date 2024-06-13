
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Lecturer</h1>
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
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="row">
                  <div class="form-group col-md-6" >
                    <label>First Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="First Name" name="name" value="{{old('name',$getRecord->name)}}" required>
                    <div style="color: red">{{$errors->first('name')}}</div>
                  </div>
                  <div class="form-group col-md-6" >
                    <label>Last Name<span style="color: red;">*</span></label>
                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{old('last_name',$getRecord->last_name)}}" required>
                    <div style="color: red">{{$errors->first('last_name')}}</div>
                  </div>


                  <div class="form-group col-md-6" >
                     <label>Gender<span style="color: red;">*</span></label>
                     <select class="form-control" required name="gender">
                        <option  value="">Select Gender</option>
                        <option {{ (old('gender',$getRecord->gender) == 'Male') ? 'selected':""}} value="Male">Male</option>
                        <option {{ (old('gender',$getRecord->gender) == 'Female') ? 'selected':""}} value="Female">Female</option>
                     </select>
                     <div style="color: red">{{$errors->first('gender')}}</div>
                  </div>


                  <div class="form-group col-md-6" >
                    <label>Date of Birth<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="date_of_birth" value="{{old('date_of_birth',$getRecord->date_of_birth)}}" required>
                    <div style="color: red">{{$errors->first('date_of_birth')}}</div>
                  </div>


                  <div class="form-group col-md-6" >
                    <label>Date of Joining<span style="color: red;">*</span></label>
                    <input type="date" class="form-control" name="admission_date" value="{{old('admission_date',$getRecord->admission_date)}}" required >
                    <div style="color: red">{{$errors->first('admission_date')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Mobile Number<span style="color: red;"></span></label>
                    <input type="text" class="form-control" name="mobile_number" value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Mobile Number" >
                    <div style="color: red">{{$errors->first('mobile_number')}}</div>
                  </div>

                  
                  <div class="form-group col-md-6" >
                    <label>Marital Status <span style="color: red;"></span></label>
                    <input type="text" class="form-control" placeholder="Marital Status " name="marital_status" value="{{old('marital_status',$getRecord->marital_status)}}">
                    <div style="color: red">{{$errors->first('marital_status')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Profile Pic<span style="color: red;"></span></label>
                    <input type="file" class="form-control" name="profile_pic">
                    <div style="color: red">{{$errors->first('profile_pic')}}</div>

                    @if (!empty($getRecord->getProfile()))
                    <img src="{{$getRecord->getProfile()}}" style="width:auto;height:50px;">  
                    @endif
  
                  </div>


                  <div class="form-group col-md-6" >
                    <label>Current Address <span style="color: red;">*</span></label>
                    <textarea  class="form-control" name="address">{{old('address',$getRecord->address)}}</textarea>
                    <div style="color: red">{{$errors->first('address')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Permanent Address <span style="color: red;"></span></label>
                    <textarea  class="form-control" name="permanent_address">{{old('permanent_address',$getRecord->permanent_address)}}</textarea>
                    <div style="color: red">{{$errors->first('permanent_address')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Qualification <span style="color: red;">*</span></label>
                    <textarea  class="form-control" name="qualification" >{{old('qualification',$getRecord->qualification)}}</textarea>
                    <div style="color: red">{{$errors->first('qualification')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Work Experience<span style="color: red;">*</span></label>
                    <textarea  class="form-control" name="work_experience" >{{old('work_experience',$getRecord->work_experience)}}</textarea>
                    <div style="color: red">{{$errors->first('work_experience')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>note<span style="color: red;">*</span></label>
                    <textarea  class="form-control" name="note" >{{old('note',$getRecord->note)}}</textarea>
                    <div style="color: red">{{$errors->first('note')}}</div>
                  </div>

                  <div class="form-group col-md-6" >
                    <label>Status<span style="color: red;">*</span></label>
                     <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option  {{ (old('status',$getRecord->status) == 0)? 'selected': ''}} value="0">Active</option>
                        <option {{ (old('status',$getRecord->status) == 1)? 'selected': ''}} value="1">Inactive</option>
                     </select>
                     <div style="color: red">{{$errors->first('status')}}</div>

                  </div>

                </div>

                <hr />
                <div class="form-group">
                  <label>Email <span style="color: red;"></span></label>
                  <input type="email" class="form-control"  placeholder="Email" name="email" value="{{old('email',$getRecord->email)}}" >
                  <div style="color: red">{{$errors->first('email')}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password <span style="color: red;"></span></label>
                  <input type="password" class="form-control" placeholder="Password" name="password">
                  <p style="color: green">Do You Want to Change Password Please Add new Password</p>
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