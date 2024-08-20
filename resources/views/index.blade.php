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
        <div class="col col-lg-6 mb-4">
          <img alt="book cover" class="mx-auto book-cover-offcanvas pb-3" src="storage/public/book/cover_default.jpg" width="145px">
          <h3 class="book-pradetail-title" id="title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde!</h3>
        </div>
  
        <div class="col col-lg-6">
          <div class="detail-section">
          
            <ul>
              <li><!----><span> Penulis <p id="author"> Penulis Buku </p></span><!----><span> Editor <p id="editor"> Editor Buku </p></span></li>
              <li><!----><span> Penerbit <p id="publisher"> Penerbit Buku </p></span><!----><span> Kategori <p id="category" >Kategori Buku</p></span></li>
              <li><!----><span> Tahun <p id="year">Tahun Terbit</p></span><!----><span> Tipe Buku <p id="type"> Type </p></span></li>
              <li><!----><span> ID Buku <p id="id"> 15125 </p></span><!----><span> Status <p id="status" style="font-weight:600; color: #007bff;"> Tersedia </p></span></li>
              <li style="display: block;"><!----><p> <a href="#" class="btn btn-outline-warning btn-block">Detail <i class="bi bi-arrow-right-square-fill"></i></a></p></li>
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