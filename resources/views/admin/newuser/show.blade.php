
@extends('layouts.app')

@section('content')



<div class="content-wrapper">

    <h2>User Details</h2>
    <table>
        <tr><th>First Name</th><td>{{ $user->first_name }}</td></tr>
        <tr><th>Last Name</th><td>{{ $user->last_name }}</td></tr>
        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        <!-- Add more fields as necessary -->
    </table>
    <a href="{{ route('users.index') }}">Back to List</a>


</div>

@endsection

@section('script')
    <script src="{{asset('js/scripts.js')}}"></script>
@endsection
