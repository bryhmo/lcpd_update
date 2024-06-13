
@extends('layouts.app')

@section('styles')
  <link rel="stylesheet" href="{{asset('adminlin/plugins/select2/css/select2.min.css')}}">
<style type="text/css">
  .select2-container .select2-selection--single
  {
    height: 40px;
  }

</style>


@endsection

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red;">Send Email</h1>
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
            <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Subject</label>
                  <input type="text" class="form-control" placeholder="Subject" name="subject">
                </div>

                  <div class="form-group">
                    <label>Users (Student/Lecturer) </label>
                    <select name="user_id" class="form-control select2" style="width: 100%;">
                      <option selected="">Select</option>
                    </select>
                  </div>

                <div class="form-group">
                  <label style="display: block">Message To:</label>
                  <label style="margin-right: 50px"><input type="checkbox" value="3" name="message_to[]" >Student</label>
                  <label style="margin-right: 50px"><input type="checkbox" value="2" name="message_to[]">Lecturer</label>
                 
                </div>
                <div class="form-group">
                  <label>Message</label>
                  <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px"> </textarea>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Send Email</button>
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
  <script src="{{asset('adminlin/plugins/select2/js/select2.full.min.js')}}"></script>



  <script type="text/javascript">
    $(function () {
      
      $('.select2').select2({
          ajax: {
            url:'{{ url('admin/communicate/search_user') }}',
            datatype:'json',
            delay:250,
            data:function(data) {
                return{
                  search:data.term,
                  user_type:3
                };
            },
            processResults:function (response) {
                return{
                  results:response
                };

            },
          }
      });



      $('#compose-textarea').summernote({
        height:200,
        codemirror:{
          theme: 'monokal'
        }
      });
    })
  </script>
    
@endsection