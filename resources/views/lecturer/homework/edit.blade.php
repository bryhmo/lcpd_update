
@extends('layouts.app')

@section('styles')
<style type="text/css">
</style>
@endsection

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red;">Edit Homework</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
   @include('_message')

    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-primary">
            <form method="POST" action="" enctype="multipart/form-data">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label>Program <span style="color: red">*</span> </label>
                  <select class="form-control" id="getClass" name="class_id" required>
                    <option value="">Select Program</option>
                    @foreach ($getClass as $class)
                    <option {{ ($getRecord->class_id == $class->class_id)? 'selected':''}} value="{{$class->class_id}}">{{$class->class_name}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label>Subject <span style="color: red">*</span> </label>
                  <select class="form-control" name="subject_id" id="getSubject" required>
                    <option value="">Select Subject</option>
                    @foreach ($getSubject as $subject)
                    <option {{ ($getRecord->subject_id == $subject->subject_id)? 'selected':''}} value="{{$subject->subject_id}}">{{$subject->subject_name}}</option>
                    @endforeach
                  </select>
                </div>


                <div class="form-group">
                  <label>Homework Date <span style="color: red">*</span> </label>
                    <input type="date" class="form-control" name="homework_date" value="{{$getRecord->homework_date}}" required>
                </div>

                <div class="form-group">
                  <label>Submission Date <span style="color: red">*</span> </label>
                    <input type="date" class="form-control" name="submission_date" value="{{$getRecord->submission_date}}" required>
                </div>

                <div class="form-group">
                  <label>Document</label>
                    <input type="file" class="form-control" name="document_file">
                    <td>
                        @if(!empty($getRecord->getDocument()))
                        <a href="{{url($getRecord->getDocument())}}" target="_blank" class="btn btn-primary" style="margin-top:0;">Preview</a>
                        <a href="{{url($getRecord->getDocument())}}" download="" class="btn btn-secondary" style="margin-top: 0;">Download</a>
                          @endif
                      </td>
                </div>

                <div class="form-group">
                  <label>Description <span style="color: red">*</span> </label>
                  <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px">{{$getRecord->description}}</textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection


@section('script')
 {{--  <script src="{{asset('adminlin/dist/js/pages/dashboard.js')}}"></script> --}}
  <script src="{{asset('adminlin/plugins/summernote/summernote-bs4.min.js')}}"></script>




  <script type="text/javascript">

    $(function () {


            $('#compose-textarea').summernote({
                height:200,
                codemirror:{
                theme: 'monokal'
                }
            });

            $('#getClass').change(function(){
                var class_id = $(this).val();
                    $.ajax({
                        type:"POST",
                        url: "{{url('lecturer/ajax_get_subject')}}",
                        data:{
                            "_token": "{{ csrf_token()}}",
                            class_id:class_id,

                        },
                        dataType:"json",
                        success:function(data){
                            $('#getSubject').html(data.success)
                        }
                    });

            });

    });

  </script>

@endsection
