@extends('layout')
@section('title', 'Edit Book')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3 class="mt-3 mb-4 p-2" style="background-color: #343a40;color: #fafafa;border-radius: 10px;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">Edit Buku</h3>
        </div>
    </div>
    <div class="row">

        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            @method('PUT')
            
            <div class="col-12 col-md-6">
                <div style="padding: 1rem 0;">
                    <div class="mb-4 d-flex justify-content-center">
                        <img id="cover_img" src="{{ asset('storage/public/book/' . $book->cover) }}" alt="example placeholder" style="width: 165px; height: 225px; object-fit: cover;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="cover">Choose file</label>
                            <input type="file" class="form-control d-none" id="cover" name="cover" onchange="displaySelectedImage(event, 'cover_img')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="id" class="mb-2">ID Buku</label>
                    <input type="number" class="form-control custom-form-control" name="id" value="{{ $book->id }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="title" class="mb-2">Judul</label>
                    <input type="text" class="form-control custom-form-control" name="title" value="{{ $book->title }}" required maxlength="150">
                </div>
                <div class="form-group mb-3">
                    <label for="author" class="mb-2">Penulis</label>
                    <input type="text" class="form-control custom-form-control" name="author" value="{{ $book->author }}" required maxlength="100">
                </div>
                <div class="form-group mb-3">
                    <label for="editor" class="mb-2">Editor</label>
                    <input type="text" class="form-control custom-form-control" name="editor" value="{{ $book->editor }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="publisher" class="mb-2">Penerbit</label>
                    <input type="text" class="form-control custom-form-control" name="publisher" value="{{ $book->publisher }}" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="category" class="mb-2">Kategori</label>
                            <!-- <input type="text" class="form-control custom-form-control " name="category" id="category" required value="" maxlength="50"/> -->
                            <select name="category" class="form-select custom-form-control" required>
                                <option value="Al-Qur'an"   @if($book->category == "Al-Qur'an") selected @endif>    Al-Qur'an   </option>
                                <option value="Tafsir"      @if($book->category == 'Tafsir') selected @endif>       Tafsir      </option>
                                <option value="Hadis"       @if($book->category == 'Hadis') selected @endif>        Hadis       </option>
                                <option value="Akidah"      @if($book->category == 'Akidah') selected @endif>       Akidah      </option>
                                <option value="Fikih"       @if($book->category == 'Fikih') selected @endif>        Fikih       </option>
                                <option value="Sejarah"     @if($book->category == 'Sejarah') selected @endif>      Sejarah     </option>
                                <option value="Pemikiran"   @if($book->category == 'Pemikiran') selected @endif>    Pemikiran   </option>
                                <option value="Tasawuf"     @if($book->category == 'Tasawuf') selected @endif>      Tasawuf     </option>
                                <option value="Pendidikan"  @if($book->category == 'Pendidikan') selected @endif>   Pendidikan  </option>
                                <option value="Penelitian"  @if($book->category == 'Penelitian') selected @endif>   Penelitian  </option>
                                <option value="Sains"       @if($book->category == 'Sains') selected @endif>        Sains       </option>
                                <option value="Ensiklopedia"@if($book->category == 'Ensiklopedia') selected @endif> Ensiklopedia</option>
                                <option value="Motivasi"    @if($book->category == 'Motivasi') selected @endif>     Motivasi    </option>
                                <option value="Umum"        @if($book->category == 'Umum') selected @endif>         Umum        </option>
                                <option value="Ekonomi"     @if($book->category == 'Ekonomi') selected @endif>      Ekonomi     </option>
                                <option value="Kamus"       @if($book->category == 'Kamus') selected @endif>        Kamus       </option>
                                <option value="Novel"       @if($book->category == 'Novel') selected @endif>        Novel       </option>
                                <option value="Sosial"      @if($book->category == 'Sosial') selected @endif>       Sosial      </option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="year" class="mb-2">Tahun</label>
                            <input type="text" class="form-control custom-form-control" name="year" value="{{ $book->year }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="type" class="mb-2">Tipe</label>
                            <select name="type" class="form-select custom-form-control" required>
                                <option value="0" @if($book->type == '0') selected @endif>R     </option>
                                <option value="1" @if($book->type == '1') selected @endif>Non R</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="status" class="mb-2">Status</label>
                            <select name="status" class="form-select custom-form-control" required>
                                <option value="0" @if($book->status == '0') selected @endif>Tersedia</option>
                                <option value="1" @if($book->status == '1') selected @endif>Dipinjam</option>
                                <option value="2" @if($book->status == '2') selected @endif>Hilang</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="language" class="mb-2">Bahasa</label>
                    <input type="text" class="form-control custom-form-control" name="language" value="{{ $book->language }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="translator" class="mb-2">Penerjemah</label>
                    <input type="text" class="form-control custom-form-control" name="translator" value="{{ $book->translator }}" required>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="volume" class="mb-2">Volume</label>
                            <input type="text" class="form-control custom-form-control" name="volume" value="{{ $book->volume }}" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-3">
                            <label for="page" class="mb-2">Halaman</label>
                            <input type="number" class="form-control custom-form-control" name="page" value="{{ $book->page }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="synopsis" class="mb-2">Sinopsis</label>
                    <textarea name="synopsis" id="synopsis" class="form-control custom-form-control" required>{{ $book->synopsis }}</textarea>
                </div>

                <div class="form-group mt-4 mb-4 text-center">
                    <button type="submit" class="btn btn-dark">Input</button>
                </div>
        </form>
    </div>
</div>
</div>


@push('styles')
<link href="{{ asset('css/admin/book/edit.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/edit.js') }}"></script>
@endpush

@endsection