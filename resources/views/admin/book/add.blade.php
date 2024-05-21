@extends('layout')
@section('title', 'Add Book')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3 class="mt-3 mb-4 p-2" style="background-color: #343a40;color: #fafafa;border-radius: 10px;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">Tambah Buku</h3>
        </div>
    </div>
    <div class="row">

        <form action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-12 col-md-6">
                <div style="padding: 1rem 0;">
                    <div class="mb-4 d-flex justify-content-center">
                        <img id="cover_img" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="example placeholder" style="width: 165px; height: 225px; object-fit: cover;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="cover">Choose file</label>
                            <input type="file" class="form-control d-none" id="cover" name="cover" onchange="displaySelectedImage(event, 'cover_img')" required />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="id" class="mb-2">ID Buku</label>
                    <input type="number" class="form-control custom-form-control" name="id" required>
                </div>

                <div class="form-group mb-3">
                    <label for="title" class="mb-2">Judul</label>
                    <input type="text" class="form-control custom-form-control" name="title" required maxlength="100">
                </div>
                <div class="form-group mb-3">
                    <label for="author" class="mb-2">Penulis</label>
                    <input type="text" class="form-control custom-form-control" name="author" required>
                </div>
                <div class="form-group mb-3">
                    <label for="editor" class="mb-2">Editor</label>
                    <input type="text" class="form-control custom-form-control" name="editor" required>
                </div>
                <div class="form-group mb-3">
                    <label for="publisher" class="mb-2">Penerbit</label>
                    <input type="text" class="form-control custom-form-control" name="publisher" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="category" class="mb-2">Kategori</label>
                            <!-- <input type="text" class="form-control custom-form-control " name="category" id="category" required value="" maxlength="50"/> -->
                            <select name="category" class="form-select custom-form-control" required>
                                <option selected="" disabled="" value="">---</option>
                                <option value="Al-Qur'an">Al-Qur'an</option>
                                <option value="Tafsir">Tafsir</option>
                                <option value="Hadis">Hadis</option>
                                <option value="Akidah">Akidah</option>
                                <option value="Fikih">Fikih</option>
                                <option value="Sejarah">Sejarah</option>
                                <option value="Pemikiran">Pemikiran</option>
                                <option value="Tasawuf">Tasawuf</option>
                                <option value="Pendidikan">Pendidikan</option>
                                <option value="Penelitian">Penelitian</option>
                                <option value="Sains">Sains</option>
                                <option value="Ensiklopedia">Ensiklopedia</option>
                                <option value="Motivasi">Motivasi</option>
                                <option value="Umum">Umum</option>
                                <option value="Ekonomi">Ekonomi</option>
                                <option value="Kamus">Kamus</option>
                                <option value="Novel">Novel</option>
                                <option value="Sosial">Sosial</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="year" class="mb-2">Tahun</label>
                            <input type="text" class="form-control custom-form-control" name="year" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type" class="mb-2">Tipe</label>
                            <select name="type" class="form-select custom-form-control" required>
                                <option selected="" disabled="" value="">---</option>
                                <option value="0">R</option>
                                <option value="1">Non R</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="status" class="mb-2">Status</label>
                            <select name="status" class="form-select custom-form-control" required>
                                <option selected="" disabled="" value="">---</option>
                                <option value="0">Tersedia</option>
                                <option value="1">Dipinjam</option>
                                <option value="2">Hilang</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="language" class="mb-2">Bahasa</label>
                    <input type="text" class="form-control custom-form-control" name="language" required>
                </div>
                <div class="form-group mb-3">
                    <label for="translator" class="mb-2">Penerjemah</label>
                    <input type="text" class="form-control custom-form-control" name="translator" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="volume" class="mb-2">Volume</label>
                            <input type="text" class="form-control custom-form-control" name="volume" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="page" class="mb-2">Halaman</label>
                            <input type="number" class="form-control custom-form-control" name="page" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="synopsis" class="mb-2">Sinopsis</label>
                    <textarea name="synopsis" id="synopsis" class="form-control custom-form-control" required></textarea>
                </div>

                <div class="form-group mt-4 mb-4 text-center">
                    <button type="submit" class="btn btn-dark">Input</button>
                </div>

        </form>
    </div>
</div>
</div>


@push('styles')
<link href="{{ asset('css/admin/book/add.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/add.js') }}"></script>
@endpush

@endsection