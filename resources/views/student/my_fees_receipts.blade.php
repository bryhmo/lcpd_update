
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Students Fees Receipts</span></h1>
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
                <h4 class="card-title">Search Students Fees Receipt</h4>
              </div>
               <form method="get" action="">
                <div class="card-body">
                 @csrf
                  <div class="row">


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
                      <label>Date</label>
                      <input type="date" class="form-control"  placeholder="Date" name="start_created_date" value="{{ Request::get('start_created_date')}}">
                    </div>

                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('student/fees_receipt')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>
          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Fees Receipts</h3>
            </div>
            <div class="card-body p-0">
                <div>
                    <input type="file" name="receipts" id="">
                </div>
                <div>
                    <h1 style="text-align: center;color:red">List of the School Fees Uploaded Receipts will be Available here </h1>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


@endsection

