@extends('layout')
@section('title', 'Favorite Book')

@section('content')

<!-- <div class="container mt-3"> -->
    <table id="fine-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
        <thead class="thead-dark">
            <th>Cover</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Status</th>
            <th>detail</th>
        </thead>
        <tbody>

        @foreach($favorites as $favorite)
            <tr>
                <td> <img src="{{ asset('storage/public/book/' . $favorite->book->cover) }}" alt="Book cover" width="100"></td>
                <td>{{ $favorite->book->title }}</td>
                <td>{{ $favorite->book->author }}</td>
                <td>{{ $favorite->book->category }}</td>
                @if ($favorite->book->status == '0')
                <td style="color: #007bff;">Tersedia</td>
                @else
                <td style="color: #c82333;">Dipinjam</td>
                @endif
                <td>
                <a href="/book-detail/{{ $favorite->book_id }}">
                  <button type="button" class="btn btn-info"><i class="bi bi-info-circle-fill"></i></button>
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
    <link href="{{ asset('css/user/favorite.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/user/favorite.js') }}"></script>
@endpush

@endsection