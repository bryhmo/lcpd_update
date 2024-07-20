
@extends('layouts.app')

@section('content')



<div class="content-wrapper">





        @include('admin.newuser.form')
        <p></p>
        <p></p>
        <p></p>


</div>

@endsection

@section('script')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
