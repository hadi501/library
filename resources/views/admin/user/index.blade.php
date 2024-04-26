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

        @for($i = 0; $i < 50; $i++)
            <tr>
                <td>2204579</td>
                <td>Hadiana Nasrullah</td>
                <td>hadianans@upi.edu</td>
                <td>0895354488400</td>
                <td>Super Admin</td>
                <td>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
<!-- </div> -->

@push('styles')
    <link href="{{ asset('css/admin/user/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/user/index.js') }}"></script>
@endpush

@endsection