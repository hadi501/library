@extends('layout')
@section('title', 'Book Admin')

@section('content')

<!-- <div class="container mt-3"> -->
    <table id="book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
        <thead class="thead-dark">
            <th>ID</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>publisher</th>
            <th>Action</th>
        </thead>
        <tbody>

        @for($i = 0; $i < 100; $i++)
            <tr>
                <td>1500{{$i+1}}</td>
                <td> <img src="https://baitulhikmah.my.id/storage/book_covers/B1435.jpg" alt="Book cover" width="100"></td>
                <td>Shahih Bukhari</td>
                <td>Abu Ja'far Muhammad bin Jarir Ath-Thabari</td>
                <td>Pustaka Azzam</td>
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
    <link href="{{ asset('css/admin/book/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/book/index.js') }}"></script>
@endpush

@endsection