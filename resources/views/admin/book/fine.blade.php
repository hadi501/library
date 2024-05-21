@extends('layout')
@section('title', 'Fine Book')

@section('content')

<!-- <div class="container mt-3"> -->
    <table id="fine-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
        <thead class="thead-dark">
            <th>Cover</th>
            <th>Title</th>
            <th>Peminjam</th>
            <th>Kembali</th>
            <th>Status</th>
            <th>Total</th>
            <th>Action</th>
        </thead>
        <tbody>

        @foreach($fines as $fine)
            <tr>
                <td> <img src="{{ asset('storage/book/' . $fine->book->cover) }}" alt="Book cover" width="100"></td>
                <td>{{ $fine->book->title }}</td>
                <td>{{ $fine->user->username }}</td>
                <td>{{ \Carbon\Carbon::parse($fine->lend->return_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
                @if($fine->lend->status == '1')
                <td style="color: red;">Dipinjam</td>
                @else
                <td style="color: green;">Dikembalikan</td>
                @endif
                <td>Rp {{ $fine->amount }}</td>
                <td>
                    <a href="#" class="btn btn-success" onclick="deleteData(id = '{{$fine->id}}', url = 'fine')">
                        <i class="bi bi-check-square"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
<!-- </div> -->

{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
    <link href="{{ asset('css/admin/book/fine.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/book/fine.js') }}"></script>
@endpush

@endsection