
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red">My Exam Result</h1>
        </div>

      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
    <div class="row">
        @forelse ($getRecord as $value)
            <div class="col-md-12">
            <div class="card" style="overflow: auto;">
                <div class="card-header">
                <h3 class="card-title">{{$value['exam_name']}}</h3>
                </div>
                <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Type</th>
                        <th>Code</th>
                        <th>unit(s)</th>
                        <th>ClassWork Score</th>
                        <th>Assignment Score</th>
                        <th>Test Score</th>
                        <th>Project Score</th>
                        <th>Exam Score</th>
                        <th>Total Score</th>
                        <th>Passing Mark</th>
                        <th>Full Mark</th>
                        <th>Result</th>
                    </tr>
                    </thead>
                    <tbody style="background-color:azure">

                        @php
                            $total_score = 0;
                            $full_marks = 0;
                        @endphp

                        @foreach($value['subject'] as $exam)
                            @php
                               $total_score = $total_score + $exam['total_score'];
                               $full_marks = $full_marks + $exam['full_marks'];
                            @endphp
                        <tr>
                            <td></td>
                            <td>{{$exam['subject_name']}}</td>
                            <td>{{$exam['subject_type']}}</td>
                            <td>{{$exam['subject_code']}}</td>
                            <td>{{$exam['subject_unit']}}</td>
                            <td>{{$exam['classwork_score']}}</td>
                            <td>{{$exam['assignment_score']}}</td>
                            <td>{{$exam['test_score']}}</td>
                            <td>{{$exam['project_score']}}</td>
                            <td>{{$exam['exam_score']}}</td>
                            <td style="background-color: blueviolet;color:white">{{$exam['total_score']}}</td>
                            <td>{{$exam['passing_marks']}}</td>
                            <td>{{$exam['full_marks']}}</td>
                            <td>
                               @if ($exam['total_score'] >= $exam['passing_marks'])
                               <span style="color: green;font-weight:bold;">Pass</span>

                               @else
                                    <span style="color:red;font-weight:bold;">Fail</span>
                               @endif
                            </td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="4"><b>Grand Total : {{$total_score}}/{{$full_marks}}</b></td>

                            <td colspan="10"><b>Percentage : {{round(($total_score*100)/$full_marks,2)}}<span style="color: red;">%</span> </b></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>

      @empty
      <h3 style="margin: 20px;color:green;padding:20px;text-transform:uppercase">No Result Found</h3>


      @endforelse


    </div>
    </div>
  </section>
</div>

@endsection


