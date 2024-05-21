@extends('layout')
@section('title', 'User Admin')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="user-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th>NIM</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Role</th>
        <th>action</th>
    </thead>
    <tbody>

        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td><a target="_blank" rel="noopener noreferrer" class="phone" href="https://wa.me/62{{ $user->phone }}">0{{ $user->phone }}</a></td>
            <td>
                @if ($user->role == '0')
                User
                @elseif ($user->role == '1')
                Admin
                @elseif ($user->role == '2')
                Bendahara
                @elseif ($user->role == '3')
                Super Admin
                @endif
            </td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$user->id}}', url = 'user')">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
<!-- </div> -->

@push('styles')
<link href="{{ asset('css/admin/user/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/user/index.js') }}"></script>
@endpush

@endsection