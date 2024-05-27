@extends('layout')
@section('title', 'NotFound')

@section('content')

<div class="container">

<img src="{{ asset('storage/image/not_found.jpg') }}" width="300px"> <br>
<h6>Beli Kaos Kaki hub: <a href="https://wa.me/62895354488400">0895364488400</a></h6>

</div>

@push('styles')
<link href="{{ asset('css/partial/notfound.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/partial/notfound.js') }}"></script>
@endpush

@endsection