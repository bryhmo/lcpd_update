
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
          <h1 style="color: red;">Submit My Homework</h1>
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
                  <label>Document</label>
                    <input type="file" class="form-control" name="document_file">
                </div>

                <div class="form-group">
                  <label>Description <span style="color: red">*</span> </label>
                  <textarea id="compose-textarea" name="description" class="form-control" style="height: 300px"> </textarea>
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



    });

  </script>

@endsection
