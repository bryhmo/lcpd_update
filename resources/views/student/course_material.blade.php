
@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Course Materials</h1>
        </div>

      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">


            <div class="card " >
                <div class="card-header">
                  <h4 class="card-title" style="color: rgba(255, 0, 0, 0.79)">Search Course Material</h4>
                </div>
                 <form method="get" action="">
                  <div class="card-body">
                   @csrf

                    <div class="row">

                      <div class="form-group col-md-2">
                        <label>Subject</label>
                        <input type="text" class="form-control" placeholder="Subject Name" name="subject_name" value="{{ Request::get('subject_name')}}" >
                      </div>


                      <div class="form-group col-md-2">
                        <label>Subject Code</label>
                        <input type="text" class="form-control" placeholder="Subject Code" name="subject_code" value="{{ Request::get('subject_code')}}" >
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
                        <a href="{{url('student/my_course_material')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                      </div>
                    </div>
                </div>
               </form>
             </div>
          @include('_message')
          <div class="card" style="background-color:rgba(157, 204, 91, 0.554)">
            <div class="card-header">
              <h3 class="card-title">My Course Material List</h3>
            </div>
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Program</th>
                    <th>Subject</th>
                    <th>Subject Code</th>
                    <th>Document</th>
                    <th>Description</th>
                    <th>Created Date</th>
                    <th>Created By</th>
                  </tr>
                </thead>

                <tbody>
                    @forelse ($getRecord as $value)
                    <tr>
                     <td>{{$value->id}}</td>
                     <td>{{$value->class_name}}</td>
                     <td>{{$value->subject_name}}</td>
                     <td>{{$value->subject_code}}</td>
                     <td>
                       @if(!empty($value->getDocument()))
                       <a href="{{url($value->getDocument())}}" target="_blank" class="btn btn-primary" style="margin-bottom:4px">Preview</a>
                       <a href="{{url($value->getDocument())}}" download="" class="btn btn-secondary">Download</a>
                         @endif
                     </td>
                     <td>{!! $value->description !!}</td>
                     <td>{{ date('d:m:Y',strtotime($value->created_at))}}</td>
                     <td>{{ $value->created_by_name}}</td>

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
