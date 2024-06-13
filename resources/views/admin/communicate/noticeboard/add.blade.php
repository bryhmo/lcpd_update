
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 style="color: red;">Add New Notice Board</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <form method="POST" action="">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
              
                <div class="form-group">
                  <label>Notice Date</label>
                  <input type="date" class="form-control"  name="notice_date">
                </div>
              
                <div class="form-group">
                  <label>Publish Date</label>
                  <input type="date" class="form-control"  name="publish_date" >
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
                <button type="submit" class="btn btn-primary">Submit</button>
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
    })
  </script>
    
@endsection