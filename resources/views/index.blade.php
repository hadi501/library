@extends('layout')
@section('title', 'Baitulhikmah')

@section('content')

<div class="row row-gap-3 justify-content-between" id="main-content">

  @for($i = 0; $i < 50; $i++) <div class="col-12 col-md-5 d-block border-bottom border-3">
    <!-- <book-card bookid="128" bookname="Shahih Sunan Abu Daud (Seleksi Hadits Shahih dari Kitab Sunan Abu Daud)" bookyear="2006" bookcategory="Hadits" bookauthor="Al-Albani, Muhammad Nashruddin" bookpublisher="Pustaka Azzam" bookstatus="0" bookdetailurl="/book/B1709" bookfavoriteurl="..." bookfavorite="false" bookcover="{{ asset('images/book/kitab.jpg') }}"> -->
    <div>
      <div class="row mb-2">
        <div class="col col-md-5 text-center ">
          <div class="position-relative">
            <img alt="book cover" class="img-fluid mx-auto book-cover" src="{{ asset('images/book/kitab.jpg') }}">
          </div>
        </div>
        <div class="col col-md-7 pt-2 d-flex flex-column col-book">
          <div class="col">
            <a class="book-field text-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" data-bs-source="bookDetail">
              <h4 class="book-title"><!--?lit$116348074$-->Shahih Sunan Abu Daud (Seleksi Hadits Shahih dari Kitab Sunan Abu Daud)</h4>
            </a>

            <h5 class="book-author"><!--?lit$116348074$-->Al-Albani, Muhammad Nashruddin</h5>
            <p class="book-year"><!--?lit$116348074$-->2006</p>
          </div>
          <div class="col d-flex align-items-end">
            <div>
              <p class="fw-bold mb-0">Kategori</p>
              <p class="category"><!--?lit$116348074$-->Hadits</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- </book-card> -->
</div>
@endfor


</div>
@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@endpush

@endsection