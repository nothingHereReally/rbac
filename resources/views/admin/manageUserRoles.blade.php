@extends('mainLayout')
@section('page-title')
    Role User
@endsection

@php
    /*

<p>{{ $usr->id }}</p>
<p>{{ $usr->name }}</p>
<p>{{ $usr->email }}</p>
@foreach ($usrroles as $role)
    <p>{{ $role->name }}</p>
@endforeach

    */
@endphp
@section('page-content')
    <p>{{ $usr->id }} | {{ $usr->name }} | {{ $usr->email }}</p>
    <table>
        @foreach ($usrroles as $role)
        <tr>
            <td>{{ $role->name }}</td>
            <td>
                <form action="{{ route('usr_roles.rmrole', ['user_id'=>$usr->id, 'role_id'=>$role->id]) }}" method='POST'>
                    @csrf
                    @method('DELETE')
                    <button type='submit'>
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <form action="{{ route('usr_roles.create', $usr->id) }}" method='POST'>
                @csrf
                @method('POST')
                <td>
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="green" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                </td>
                <td>
                    <select name="role_id" type="number">
                        @foreach ($roles as $role)
                            <option value={{ $role->id }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </td>
            </form>
        </tr>
    </table>
@endsection
