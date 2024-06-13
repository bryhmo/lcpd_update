
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Collect Fees Report</span></h1>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Search Collect Fees Report</h4>
              </div>
               <form method="get" action="">
                <div class="card-body">
                 @csrf
                  <div class="row">
                    <div class="form-group col-md-3">
                      <label> Student Id</label>
                      <input type="text" class="form-control" placeholder="Student Id" name="student_id" value="{{ Request::get('student_id')}}" >
                    </div>
                    <div class="form-group col-md-3">
                      <label> Student First Name</label>
                      <input type="text" class="form-control" placeholder="First Name" name="student_name" value="{{ Request::get('student_name')}}" >
                    </div>
                    <div class="form-group col-md-3">
                      <label> Student Last Name</label>
                      <input type="text" class="form-control" placeholder="Last Name" name="student_last_name" value="{{ Request::get('student_last_name')}}" >
                    </div>
                    <div class="form-group col-md-3">
                      <label> Program </label>
                      <select class="form-control" name="class_id">
                        <option value="">select</option>
                        @foreach ($getClass  as $class)
                           <option {{(Request::get('class_id') == $class->id)? 'selected':''}} value="{{$class->id}}">{{$class->name}}</option> 
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Payment Type </label>
                      <select class="form-control" name="payment_type">
                        <option value="">select</option>
                        <option {{(Request::get('payment_type') == 'Cash')?'selected':''}} value="Cash">Cash</option>
                        <option {{(Request::get('payment_type') == 'Cheque')?'selected':''}} value="Cheque">Cheque</option>
                        <option {{(Request::get('payment_type') == 'Paypal')?'selected':''}} value="Paypal">Paypal</option>
                        <option {{(Request::get('payment_type') == 'BankTransfer')?'selected':''}} value="BankTransfer">Bank Transfer</option>
                        <option {{(Request::get('payment_type') == 'Paystack')?'selected':''}} value="Paystack">Paystack</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label>Start Created Date</label>
                      <input type="date" class="form-control"  placeholder="Date" name="start_created_date" value="{{ Request::get('start_created_date')}}">
                    </div>
                    <div class="form-group col-md-3">
                      <label>End Created Date</label>
                      <input type="date" class="form-control"  placeholder="Date" name="end_created_date" value="{{ Request::get('end_created_date')}}">
                    </div>
                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/fees_collection/collect_fees_report')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Collect Fees Report</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Program Name</th>
                    <th>Total Amount</th>
                    <th>Paid Amount</th>
                    <th>Remaining Amount</th>
                    <th>Payment Type</th>
                    <th>Remark</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($getRecord  as $value)
                  <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->student_id }}</td>
                    <td>{{ $value->student_name }}  {{ $value->student_last_name }}</td>
                    <td>{{ $value->class_name }}</td>
                    <td>${{ number_format($value->total_amount,2) }}</td>
                    <td>${{ number_format($value->paid_amount ,2)}}</td>
                    <td>${{ number_format($value->remaining_amount,2) }}</td>
                    <td>{{ $value->payment_type }}</td>
                    <td>{{ $value->remark}}</td>
                    <td>{{ $value->created_name }}</td>
                    <td>{{ date('d-m-Y',strtotime($value->created_at)) }}</td>
                  </tr>
                  @empty
                      <tr>
                        <td colspan="100%"> No Record Found</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
              <div style="padding: 10px;float:right">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links()!!}
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection

