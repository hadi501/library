@extends('layout')
@section('title', 'Profile')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3 class="mt-3 mb-4 p-2" style="background-color: #343a40;color: #fafafa;border-radius: 10px;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">Profile</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div style="padding: 1rem 0;">
                <div class="mb-4 d-flex justify-content-center">
                    <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" />
                </div>
                <div class="d-flex justify-content-center">
                    <div data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded">
                        <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                        <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="form-group mb-3">
                <label for="kode" class="mb-2">NIM</label>
                <input type="number" class="form-control custom-form-control " name="book_code" id="book_code" required="" value="" maxlength="10">
            </div>

            <div class="form-group mb-3">
                <label for="kode" class="mb-2">Nama Lengkap</label>
                <input type="text" class="form-control custom-form-control " name="book_code" id="book_code" required="" value="" maxlength="10">
            </div>
            <div class="form-group mb-3">
                <label for="kode" class="mb-2">Email</label>
                <input type="text" class="form-control custom-form-control " name="book_code" id="book_code" required="" value="" maxlength="10">
            </div>
            <div class="form-group mb-3">
                <label for="kode" class="mb-2">Password</label>
                <input type="text" class="form-control custom-form-control " name="book_code" id="book_code" required="" value="" maxlength="10">
                <p class="pt-2">Ganti Password <a data-toggle="tab" href="#signup">Click Here</a></p>
            </div>            
            <div class="form-group mb-3">
                <label for="kode" class="mb-2">Telepon</label>
                <input type="text" class="form-control custom-form-control " name="book_code" id="book_code" required="" value="" maxlength="10">
            </div>
            <div class="form-group mt-4 text-center">
                <button type="submit" class="btn btn-dark">
                    Selesai
                </button>
            </div>


        </div>
    </div>
</div>


@push('styles')
<link href="{{ asset('css/user/profile.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/user/profile.js') }}"></script>
@endpush

@endsection