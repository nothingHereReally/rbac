@extends('mainLayout')
@section('page-title')
    Manage Users
@endsection

@section('page-content')
<div>
    <table>
    <tr>
        <td>User ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Edit</td>
        <td>Delete</td>
        <td>Roles</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <form action="{{ route('updateusr', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <td>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}">
                </td>
                <td>
                    <input type="text" name="email" value="{{ old('email', $user->email) }}">
                </td>
                <td>
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>
                </td>
            </form>
            <td>
                <form action="{{ route('rmusr', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </form>
            </td>
            <td>
                <a href="{{ route('usr_roles.view', $user->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="#B5B5B5" class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6m5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"/>
                    </svg>
                </a>
            </td>
        </tr>
    @endforeach
    </table>
</div>
@endsection

@php
    /*
    dd($users[0]->roles)
    */
@endphp
