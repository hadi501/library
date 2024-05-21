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
        @foreach($books as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td> <img src="{{ asset('storage/book/' . $book->cover) }}" alt="Book cover" width="100"></td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->publisher }}</td>
            <td>
                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$book->id}}', url = 'book')">
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
<link href="{{ asset('css/admin/book/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/index.js') }}"></script>
@endpush

@endsection