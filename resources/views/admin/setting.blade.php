
@extends('layouts.app')

@section('content')
    
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Setting</h1>
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
          @include('_message')
          <!-- general form elements -->
          <div class="card card-primary">
            <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Paypal Business Email</label>
                  <input type="email" class="form-control"  placeholder="Paypal Businnes Email" value="{{$getRecord->paypal_email}}" name="paypal_email" required>
                </div>
                <div class="form-group">
                  <label>Stripe Public Key</label>
                  <input type="text" class="form-control"  placeholder="Stripe Key" value="{{$getRecord->stripe_key}}" name="stripe_key" required>
                </div>
                <div class="form-group">
                  <label>Stripe Secret Key</label>
                  <input type="text" class="form-control"  placeholder="Stripe Secret" value="{{$getRecord->stripe_secret}}" name="stripe_secret" required>
                </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
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