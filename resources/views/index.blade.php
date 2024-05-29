@extends('layout')
@section('title', 'Baitulhikmah')

@section('content')

<div class="row row-gap-3 justify-content-between" id="main-content">

<!-- konten di sini -->

</div>

<!-- <button class="btn btn-primary" type="button" >Toggle bottom offcanvas</button>

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">Offcanvas bottom</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    ...
  </div>
</div> -->
@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')

<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>


@endpush

@endsection