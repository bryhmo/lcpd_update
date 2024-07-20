
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">Program Timetable List</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="col-md-12">

          @include('_message')


            <div class="card ">
              <div class="card-header">
                <h4 class="card-title">Search Program Timetable</h4>
              </div>
               <form method="get" action="">
                <div class="card-body">
                 @csrf

                  <div class="row">
                    <div class="form-group col-md-3">
                      <label>Program Name</label>
                      <select class="form-control getClass" name="class_id" required>
                        <option value="">select</option>
                        @foreach ($getClass as $class)
                          <option {{ (Request::get('class_id') == $class->id) ? 'selected':'' }} value="{{ $class->id}}">{{ $class->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label> Subject Name</label>
                      <select class="form-control getSubject" name="subject_id" required>
                        <option value="">select</option>
                        @if (!empty($getSubject))
                          @foreach ($getSubject as $subject)
                            <option {{ (Request::get('subject_id') == $subject->subject_id) ? 'selected':'' }} value="{{ $subject->subject_id}}">{{ $subject->subject_name }}</option>
                          @endforeach

                        @endif
                      </select>
                    </div>

                    <div class="form-group col-md-3">
                      <button type="submit" class="btn btn-primary" style="margin-top: 33px">Search</button>
                      <a href="{{url('admin/class_timetable/list')}}" class="btn btn-primary" style="margin-top: 33px">Reset</a>
                    </div>
                  </div>
              </div>
            </form>
          </div>


          @if(!empty(Request::get('class_id')) && !empty(Request::get('subject_id')) )
            <form action="{{ url('admin/class_timetable/add') }}" method="post">
              {{ csrf_field()}}
              <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">
              <input type="hidden" name="class_id"   value="{{ Request::get('class_id') }}">


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Program Timetable</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <td>Week</td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Room Number</td>
                      </tr>
                    </thead>

                    <tbody>
                      @php
                      $i = 1;
                      @endphp
                      @foreach($week as $value)
                        <tr>
                          <td>
                            <input type="hidden" name="timetable[{{$i}}][week_id]" value="{{ $value['week_id'] }}">
                            {{ $value['week_name'] }}
                          </td>
                          <td>
                            <input type="time" name="timetable[{{$i}}][start_time]" value="{{ $value['start_time']}}" class="form-control">
                          </td>
                          <td>
                            <input type="time" name="timetable[{{$i}}][end_time]" value="{{ $value['end_time']}}" class="form-control">
                          </td>
                          <td>
                            <input type="text"  name="timetable[{{$i}}][room_number]"  value="{{ $value['room_number'] }}" class="form-control">
                          </td>
                        </tr>

                        @php
                        $i++;
                        @endphp

                      @endforeach

                    </tbody>
                  </table>
                  <div style="text-align: right;padding:20px">

                    <button class="btn btn-primary">submit</button>

                  </div>

                </div>

              <!-- /.card-body -->
            </div>
          </form>
        @endif

          <!-- /.card -->
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

@endsection


@section('script')

  <script type="text/javascript">

    $('.getClass').change(function() {
      var class_id = $(this).val();
      $.ajax({
        url:"{{ url('admin/class_timetable/get_subject') }}",
        type:"POST",
        data:{
          "_token": "{{ csrf_token() }}",
          class_id: class_id,
        },
        dataType:"json",
        success: function(response){
          $('.getSubject').html(response.html);
        },
      });

    });

 </script>

@endsection
