
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Submitted Homework</h1>
        </div>

      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">


            <div class="card " >
                <div class="card-header">
                  <h4 class="card-title" style="color: rgba(255, 0, 0, 0.79)">Search Submitted Homework</h4>
                </div>
                 <form method="get" action="">
                  <div class="card-body">
                   @csrf

                    <div class="row">
                      <div class="form-group col-md-3">
                        <label>Student Last Name</label>
                        <input type="text" class="form-control"  name="last_name" value="{{ Request::get('last_name')}}" placeholder="Student Last Name">
                      </div>

                      <div class="form-group col-md-3">
                        <label>Student First Name</label>
                        <input type="text" class="form-control"  name="first_name" value="{{ Request::get('first_name')}}" placeholder="Student First Name">
                      </div>

                      <div class="form-group col-md-2">
                        <label>From Created Date</label>
                        <input type="date" class="form-control"  name="from_created_date" value="{{ Request::get('from_created_date')}}">
                      </div>

                      <div class="form-group col-md-2">
                        <label>To Created Date</label>
                        <input type="date" class="form-control"  name="to_created_date" value="{{ Request::get('to_created_date')}}">
                      </div>

                      <div class="form-group col-md-2">
                        <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                        <a href="{{url('admin/homework/homework/submitted/'.$homework_id)}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                      </div>
                    </div>
                </div>
               </form>
             </div>






          @include('_message')
          <div class="card" style="background-color:rgba(157, 204, 91, 0.554)">
            <div class="card-header">
              <h3 class="card-title">Submitted Homework List</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Student Name</th>
                    <th>Document</th>
                    <th>Description</th>
                    <th>Created Date</th>
                  </tr>
                </thead>
                <tbody>
                   @forelse ($getRecord as $value)
                   <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->last_name}} {{$value->first_name}}</td>
                    <td>
                        @if(!empty($value->getDocument()))
                        <a href="{{url($value->getDocument())}}" target="_blank" class="btn btn-primary" style="margin-bottom:4px">Preview</a>
                        <a href="{{url($value->getDocument())}}" download="" class="btn btn-secondary">Download</a>
                          @endif
                      </td>
                     <td>{!! $value->description!!}</td>

                      <td>{{ date('d:m:Y',strtotime($value->created_at))}}</td>
                   </tr>
                   @empty
                   <tr>
                    <td colspan="100%">No Record Found</td>
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
  </section>
</div>
@endsection
