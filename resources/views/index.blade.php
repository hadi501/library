@extends('layout')
@section('title', 'Baitulhikmah')

@section('content')

<div class="row row-gap-3 justify-content-between" id="main-content">

  <!-- konten di sini -->

</div>

<!-- <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Toggle bottom offcanvas</button> -->

<div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <!-- <h5 class="offcanvas-title" id="offcanvasBottomLabel">Judul Buku</h5> -->
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body small">
    <div class="container">
      <div class="row">
        <div class="col col-lg-4 mb-4">
          <img alt="book cover" class="mx-auto book-cover-offcanvas pb-3" src="storage/public/book/cover_default.jpg" width="175px">
          <button class="btn btn-info btn-offcanvas">detail <i class="bi bi-arrow-right-square-fill"></i></button>
        </div>
  
        <div class="col col-lg-8">
          <div class="detail-section">
          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde!</h3>
            <ul>
              <li><!----><span> Judul <p> Judul Buku </p></span><!----><span> Penulis <p> Penulis Buku </p></span></li>
              <li><!----><span> Editor <p>Editor Buku</p></span><!----><span> Penerbit <p>Penerbit Buku</p></span></li>
              <li><!----><span> Kategori <p>Kategori Buku</p></span><!----><span> Tahun <p>Tahun Diterbitakan</p></span></li>
              <li><!----><span> Tipe Buku <p>R</p></span><!----><span> Status<p style="font-weight:600; color: #007bff;">Tersedia</p></span></li>
            </ul><!---->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')

<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/home.js') }}"></script>


@endpush

@endsection