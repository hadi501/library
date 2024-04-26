@extends('layout')
@section('title', 'Fine Book')

@section('content')

<!-- <div class="container mt-3"> -->
    <table id="fine-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
        <thead class="thead-dark">
            <th>Cover</th>
            <th>Title</th>
            <th>Peminjam</th>
            <th>Pinjam</th>
            <th>Kembali</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <tbody>

        @for($i = 0; $i < 100; $i++)
            <tr>
                <td> <img src="https://baitulhikmah.my.id/storage/book_covers/B1435.jpg" alt="Book cover" width="100"></td>
                <td>Shahih Bukhari</td>
                <td>Ahmad Syakir Wildani</td>
                <td>5 Maret 2024</td>
                <td>12 Maret 2024</td>
                <td>Rp 5000,00</td>
                <td>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-check-square"></i>
                    </a>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
<!-- </div> -->

@push('styles')
    <link href="{{ asset('css/admin/book/fine.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/book/fine.js') }}"></script>
@endpush

@endsection