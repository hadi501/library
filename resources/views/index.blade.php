@extends('layout')
@section('title', 'Baitulhikmah')

@section('content')

<div class="row row-gap-3 justify-content-between" id="main-content">

<!-- konten di sini -->

</div>
@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>
@endpush

@endsection