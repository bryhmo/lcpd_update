
@extends('layouts.app')

@section('content')



<div class="content-wrapper">

    <h2>Edit User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('users.form', ['user' => $user])
        <button type="submit">Update</button>
    </form>


</div>

@endsection

@section('script')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
