@extends('layout')
@section('title', 'User Admin')

@section('content')

<!-- <div class="container mt-3"> -->

<div class="row">
    <div class="col p-0 ml-2">
        <a href="/users/export/excel" class="btn btn-outline-success">
            <i class="fa fa-download"> Excel</i>
        </a>
    </div>
</div>

<table id="user-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th>NIM</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Action</th>
    </thead>
    <tbody>
        
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