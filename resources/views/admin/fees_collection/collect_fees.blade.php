
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 style="color: red">Collect Fees</h1>
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
                <h4 class="card-title">Search Student Fees Collection</h4>
              </div>
               <form method="get" action="">
                <div class="card-body">
                 @csrf
              
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Program</label>
                      <select class="form-control" name="class_id" >
                        <option value="">select program</option>
                          @foreach ($getClass as $class)
                          <option   {{ (Request::get('class_id') == $class->id)? 'selected': ''}}  value="{{ $class->id}}">{{ $class->name }}</option>
                              
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label>Student ID</label>
                      <input type="text" class="form-control" placeholder="Student ID" name="student_id" value="{{ Request::get('student_id')}}" >
                    </div>

                    <div class="form-group col-md-2">
                      <label>First Name</label>
                      <input type="text" class="form-control" placeholder="Student First Name" name="first_name" value="{{ Request::get('first_name')}}" >
                    </div>

                    <div class="form-group col-md-2">
                      <label>Last Name</label>
                      <input type="text" class="form-control" placeholder="Student Last Name" name="last_name" value="{{ Request::get('last_name')}}">
                    </div>
                    
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/fees_collection/collect_fees')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
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
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Program Name</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Remaining Amount</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                 @if(!empty($getRecord))
                     
                    @forelse ($getRecord as $value)
                      @php
                          $paid_amount = $value->getPaidAmount($value->id,$value->class_id);
                          $RemainingAmount = $value->amount-$paid_amount;
                      @endphp
                        <tr>
                          <td>{{ $value->id}}</td>
                          <td>{{ $value->name}} {{ $value->last_name}}</td>
                          <td>{{ $value->class_name}}</td>
                          <td>${{ number_format($value->amount,2)}}</td>
                          <td>${{ number_format($paid_amount,2)}}</td>
                          <td>${{ number_format($RemainingAmount,2)}}</td>
                          <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                          <td>
                            <a href="{{ url('admin/fees_collection/collect_fees/add_fees/'.$value->id) }}" class="btn btn-success">Collect Fees</a>
                          </td>
                        </tr>
                    @empty
                      <tr>
                        <td style="text-transform: uppercase;color:red" colspan="100%">Record Not Found</td>
                      </tr>
                    @endforelse
                        
                 @else
                  <tr>
                    <td style="text-transform: uppercase;color:red" colspan="100%">Record Not Found</td>
                  </tr>
                 @endif
                </tbody>
              </table>
              <div style="padding: 10px;float:right">
                @if (!empty($getRecord))
                  {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!} 
                @endif
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