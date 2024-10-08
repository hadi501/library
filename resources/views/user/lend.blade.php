@extends('layout')
@section('title', 'Lend Book')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="fine-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
  <thead class="thead-dark">
    <th>Cover</th>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Status</th>
    <th>Kembali</th>
  </thead>
  <tbody>

    @foreach($lends->where('user_id', Auth::user()->id) as $lend)
    <tr>
      <td> <img src="{{ asset('storage/public/book/' . $lend->book->cover) }}" alt="Book cover" width="100"> </td>
      <td>{{ $lend->book->title }}</td>
      <td>{{ $lend->book->author }}</td>
      <td>{{ $lend->book->category }}</td>
      @if ($lend->status == '1')
      @if(\Carbon\Carbon::parse($lend->return_date)->isPast())
      <td><button type="button" class="btn btn-danger" style="min-width: 70px;">Telat</button></td>
      @else
      <td><button type="button" class="btn btn-success" style="min-width: 70px;">Dipinjam</button></td>
      @endif
      @else
      <td><button type="button" class="btn btn-info" style="min-width: 70px;">Selesai</button></td>
      @endif
      @if ($lend->status == '1')
      <td>{{ \Carbon\Carbon::parse($lend->return_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
      @else
      <td>{{ \Carbon\Carbon::parse($lend->updated_at)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
      @endif
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
<link href="{{ asset('css/user/lend.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/user/lend.js') }}"></script>
@endpush

@endsection