@extends('layout')
@section('title', 'Fine History')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="fine-history-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <!-- <th>ID</th> -->
        <th>Cover</th>
        <th style="width: 30%;">Title</th>
        <th>Category</th>
        <th>Peminjam</th>
        <th>Selesai</th>
        <th>Jumlah</th>
    </thead>

    <tbody>
        
    </tbody>
</table>


@push('styles')
<link href="{{ asset('css/admin/book/finehistory.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/finehistory.js') }}"></script>
@endpush

@endsection