
@extends('layouts.app')

@section('content')
    


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Subject</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">

           

          @include('_message')
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Subject </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Code</th>
                    <th>units</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($getRecord as $Value)
                  <tr>
                    <td>{{$Value->id}}</td>
                    <td>{{$Value->subject_name}}</td>
                    <td>{{$Value->subject_type}}</td>
                    <td>{{$Value->subject_code}}</td>
                    <td>{{$Value->subject_unit}}</td>
                  </tr>
                      
                  @endforeach
                 
                </tbody>
              </table>
             
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