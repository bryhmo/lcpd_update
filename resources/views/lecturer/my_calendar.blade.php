
@extends('layouts.app')

{{-- @section('style')
 <style type="text/css">
    .fc-daygrid-event{
      white-space:normal;
    }
 </style>
@endsection --}}

@section('content')
    
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Calendar</h1>
        </div>
       
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
           <div id="calendar"></div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
</div>



@endsection

@section('script')
<script src="{{ asset('adminlin/dist/fullcalendar/index.global.js') }}"></script>

<script type="text/javascript">
  var events = [];

  @foreach($getClassTimetable as $value)
          events.push({
              title: 'Programs: {{ $value->class_name }} - {{ $value->subject_name}}',
              daysOfWeek: [ {{ $value->fullcalendar_day }} ],
              startTime: '{{ isset($value->start_time) ? $value->start_time : '' }}', 
              endTime: '{{ isset($value->end_time) ? $value->end_time : '' }}', 
          });
  @endforeach

  @foreach($getExamTimetable as $exam)
      events.push({
          title: 'Exam: {{ $exam->class_name }} - {{ $exam->exam_name }}- {{ $exam->subject_name }} ({{ date('h:i A',strtotime($exam->start_time))}} to {{ date('h:i A',strtotime($exam->end_time))}})',
          start: '{{ $exam->exam_date}}',
          end: '{{ $exam->exam_date}}',
          color: 'red',
          url: '{{ url('lecturer/my_exam_timetable')}}',
      });
  @endforeach

  document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
          },
          initialDate: '{{ date('Y-m-d') }}',
          navLinks: true,
          editable: false,
          events: events,
          // initialView:'timeGridWeek',
      });
      calendar.render();
  });
</script>
@endsection
