
@extends('layouts.app')

@section('content')



<div class="content-wrapper">
        <h2>User List</h2>
        <a href="{{ route('users.create') }}">Create New User</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.toggleAdmission', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit">
                                    {{ $user->admitted ? 'Not Admitted' : 'Admitted' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



</div>

@endsection
