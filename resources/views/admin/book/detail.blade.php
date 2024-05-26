@extends('layout')
@section('title', 'Detail Book')

@section('content')

<div class="container mt-4 py-4">
    <div class="row justify-content-center align-items-center border-bottom mb-3">
        <div class="col-12 col-md-6 mb-4 text-center">
            <img src="{{ asset('storage/book/' . $book->cover) }}" alt="Book Cover" class="book-detail-cover" width="175px">
            <div class="row row-title pt-3 m-auto">
                <div class="col">
                    <h6 style="font-size: 18px;"><b>{{ $book->title }}</b></h6>
                </div>
            </div>

            <div class="row m-auto">
                <div class="col">
                    <h6 style="font-style: italic;">{{ $book->author }}</h6>
                </div>
            </div>

            <div class="row pt-2 m-auto w-80">
                <div class="col">
                    @if (Auth::check())

                    @if ($fav != null)
                    <i class="bi bi-heart-fill heart fa-lg" onclick="favorite('{{ $book->id }}', action='delete')"></i>
                    <p>Favorite</p>
                    @else
                    <i class="bi bi-heart fa-lg" onclick="favorite('{{ $book->id }}', action='add')"></i>
                    <p>Favorite</p>
                    @endif
                    
                    
                    @else
                    <a href="/login" style="color: gray;">
                        <i class="bi bi-heart fa-lg"></i>
                        <p>Favorite</p>
                    </a>
                    @endif
                </div>
                <div class="col">
                    <i class="bi bi-book-fill fa-lg"></i>
                    <p>{{$grade}}/5</p>
                    <!-- <p>4.3/5</p> -->
                </div>

                <div class="col">
                    @if (Auth::check())
                    @if ($rate != null)
                    <a data-target="#updateRate" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#updateRate" style="color: gray;">
                        <i class="bi bi-star-fill star fa-lg"></i>
                        <p>Rate!</p>
                    </a>
                    @else
                    <a data-target="#addRate" data-toggle="modal" class="MainNavText" id="MainNavHelp" href="#addRate" style="color: gray;">
                        <i class="bi bi-star fa-lg"></i>
                        <p>Rate!</p>
                    </a>
                    @endif
                    @else
                    <a href="/login" style="color: gray;">
                        <i class="bi bi-star fa-lg"></i>
                        <p>Rate!</p>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="detail-section">
                <h3>Detail</h3><!---->
                <ul>
                    <li><!----><span> Judul <p> {{ $book->title }} </p></span><!----><span> Penulis <p> {{ $book->author }} </p></span></li>
                    <li><!----><span> Editor <p>{{ $book->editor }}</p></span><!----><span> Penerbit <p>{{ $book->publisher }}</p></span></li>
                    <li><!----><span> Kategori <p>{{ $book->category }}</p></span><!----><span> Bahasa <p>{{ $book->language }}</p></span></li>
                    <li><!----><span> Penerjemah <p>{{ $book->translator }}</p></span><!----><span> Tahun <p>{{ $book->year }}</p></span></li>
                    <li><!----><span> Halaman <p>{{ $book->page }}</p></span><!----><span> Volume <p>{{ $book->volume }}</p></span></li>
                    <li>
                        <span> Tipe Buku
                            @if($book->type == '0')
                            <p>R</p>
                            @else
                            <p>Non R</p>
                            @endif
                        </span>
                        <span> Status 
                            @if($book->status == '0')
                            <p style="font-weight:600; color: #007bff;">Tersedia</p>
                            @elseif($book->status == '1')
                            <p style="font-weight:600; color: #dc3545;">Dipinjam</p>
                            @else
                            <p style="font-weight:600; color: black;">Hilang</p>
                            @endif
                        </span>
                    </li>
                
                </ul><!---->
            </div>
        </div>
    </div>
    <div class="row border-bottom mb-3">
        <div class="col w-75">
            <div class="my-3 desc-section">
                <h5>Sinopsis/Deskripsi</h5>
                <div class="product-desc" id="section-desc" style="font-size: 14px; -webkit-text-size-adjust: none; text-size-adjust: none;">
                    <div> {{ $book->synopsis }}</div><!---->
                    <!-- <div hidden=""> Agama Islam adalah agama suci yang berisi ajaran-ajaran yang ditujukan Allah kepada para umat-Nya. Agama Islam adalah agama yang sempurna dan mengajarkan sikap-sikap terpuji. Tidak ada perintah Allah dalam agama Islam yang tidak membawa manfaat bagi yang melakukannya. Banyak petunjuk yang bisa didapat dari mendalami dan memahami makna-makna dalam ajaran agama Islam. Kita bahkan bisa menemukan hal-hal sederhana yang memiliki efek besar bagi pertanggungjawaban kita kepada Sang Pencipta nantinya.

                        Petunjuk-petunjuk tersebut sederhananya dapat kita temukan di dalam goresan ayat-ayat Al-Qur'an. Sesungguhnya segala permasalahan kita memiliki solusi yang pasti dan semuanya tertulis dalam Al-Qur'an. Meskipun takdir umat muslim sudah dituliskan dan bersifat pasti, namun bukan berarti Allah SWT akan membiarkan orang-orang yang hanya pasrah dan tidak berusaha.

                        Untuk itu, bagi siapa pun yang sedang berada dalam kesulitan perlu diingat bahwa Allah senantiasa berada bersama kita dan senantiasa memberikan kita petunjuk yang sebenarnya dengan mudah bisa kita temukan. Al-Qur’an menjadi salah satu petunjuk pasti yang diberikan Allah untuk menyembuhkan diri kita dari berbagai permasalahan. Dalam Al-Qur’an telah dipaparkan berbagai metode penyembuhan dari rasa sedih, kecewa, takut, marah, bahkan hingga putus asa.

                        Buku Self Healing With Qur’an karya Ummu Kalsum IQT ini merangkum berbagai metode penyembuhan diri berdasarkan petunjuk yang berada di dalam Al-Qur’an. Metode penyembuhan dihadirkan dalam bentuk berbagai kisah yang berkaitan dengan berbagai kondisi pembaca. Harapannya dari kisah yang dipaparkan bisa diambil pelajaran atas bagaimana menyembuhkan diri dengan bergantung pada tuntunan Al-Qur’an.

                        Detail
                        Cover: Soft Cover
                        Genre: Spiritual, Pengembangan Diri, Agama Islam, Motivasi
                        Penulis: Ummu Kalsum IQT
                        Jumlah Halaman: 192
                        Bahasa: Indonesia
                        Penerbit: Syalmahat Publishing
                        Dimensi: 14 x 20 cm
                        Tanggal Terbit: 8 April 2022
                        Berat: 0.170 kg
                        ISBN: 9786235269016 </div>
                </div>
                <div><a href="javascript:;"> Baca Selengkapnya </a></div> -->
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <h5>Review</h5>
            @foreach($rates as $r)
            <div class="col-12 col-md-6">
                <div class="my-2 review-section">
                    <div class="review">
                        <div class="review-head">
                            <img src="{{ asset('storage/user/' . $r->user->picture) }}" class="review-pp" width="50px">
                            <h6 class="review-name">{{$r->user->username}}</h6>
                            <div class="Jx4nYe mt-3">
                                <div aria-label="Diberi rating 5 bintang dari 5 bintang" role="img" class="iXRFPc">

                                @for($i = 0; $i < $r->star; $i++)
                                    <span aria-hidden="true" jsname="fI6EEc" class="F7XJmb" data-number="1" ssk="1#1"><span class="fill" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                    </svg></span></span>
                                @endfor
                                @if($r->star < 5)
                                    @for($i=$r->star; $i < 5; $i++)
                                        <span aria-hidden="true" jsname="fI6EEc" class="F7XJmb" data-number="4"><span class="nofill" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"></path>
                                        </svg></span></span>
                                    @endfor
                                 @endif

                                </div><span class="bp9Aid">{{ \Carbon\Carbon::parse($r->created_at)->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </div>

                        </div>
                        <div class="review-body mt-2">
                            <p>{{ $r->comment }}</p>
                        </div>
                        <!-- <div class="review-footer">

                    </div> -->
                    </div>
                </div>
            </div>
            @endforeach
    </div>
</div>


@if (Auth::check())
@if ($rate != null)
<div class="modal fade" id="updateRate" tabindex="-1" role="dialog" aria-labelledby="updateRate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('rate.update', $rate->id) }}" method="POST">

                {{ csrf_field() }}
                @method('PUT')

                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Rate This Book!</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 0 1rem;">
                    <fieldset>
                        <h4 class="fs-title">Rate This Book!</h3>
                            <div class="form-group">
                                <!-- <label for="recipient-name" class="col-form-label">Rate:</label> -->
                                <!-- To display checked star rating icons -->
                                @for($i = 0; $i < $rate->star; $i++)
                                    <span id="rate-{{$i+1}}" class="fa fa-star checked" onclick="starRate('{{$i+1}}', 'star')"></span>
                                @endfor
                                @if($rate->star < 5)
                                    @for($i=$rate->star; $i < 5; $i++)
                                        <span id="rate-{{$i+1}}" class="fa fa-star unchecked" onclick="starRate('{{$i+1}}', 'star')"></span>
                                    @endfor
                                 @endif
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Ulasan:</label>
                                <textarea class="form-control" id="message-text" name="comment" maxlength="500" required>{{ $rate->comment }}</textarea>
                            </div>
                            <input type="hidden" id="star" name="star" value="{{ $rate->star }}">
                    </fieldset>
                </div>
                <div class="modal-footer border-0" style="justify-content: center;">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-danger" onclick="deleteData(id = '{{$rate->book_id}}', url = 'rate')">Hapus</button>
                    <button type="submit" class="btn btn-info">Simpan!</button>
                </div>
            </form>
        </div>

    </div>
</div>
@else
<div class="modal fade" id="addRate" tabindex="-1" role="dialog" aria-labelledby="addRate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('rate.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-header border-0">
                    <!-- <h5 class="modal-title" id="exampleModalLongTitle">Rate This Book!</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding: 0 1rem;">
                    <fieldset>
                        <h4 class="fs-title">Rate This Book!</h3>

                            <div class="form-group">
                                <!-- <label for="recipient-name" class="col-form-label">Rate:</label> -->
                                <!-- To display checked star rating icons -->
                                <span id="rate-1" class="fa fa-star checked" onclick="starRate(1, 'addstar')"></span>
                                <span id="rate-2" class="fa fa-star unchecked" onclick="starRate(2, 'addstar')"></span>
                                <span id="rate-3" class="fa fa-star unchecked" onclick="starRate(3, 'addstar')"></span>
                                <span id="rate-4" class="fa fa-star unchecked" onclick="starRate(4, 'addstar')"></span>
                                <span id="rate-5" class="fa fa-star unchecked" onclick="starRate(5, 'addstar')"></span>
                            </div>
                            <div class="form-group">
                                <label for="comment-text" class="col-form-label">Ulasan:</label>
                                <textarea class="form-control" id="comment-text" name="comment" maxlength="500" required></textarea>
                            </div>
                            <input type="hidden" id="addstar" name="star" value="1">
                            <input type="hidden" name="bookid" value="{{$book->id}}">
                            <input type="hidden" name="userid" value="{{Auth::user()->id}}">
                    </fieldset>
                </div>
                <div class="modal-footer border-0" style="justify-content: center;">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Simpan!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endif


{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
<link href="{{ asset('css/admin/book/detail.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/detail.js') }}"></script>
@endpush

@endsection