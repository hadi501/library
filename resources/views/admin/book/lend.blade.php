@extends('layout')
@section('title', 'Lend Book')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="lend-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th>Cover</th>
        <th>Title</th>
        <th>Peminjam</th>
        <!-- <th>Pinjam</th> -->
        <th>Kembali</th>
        <th>Telepon</th>
        <th>Action</th>
    </thead>
    <tbody>

        @foreach($lends as $lend)
        <tr>
            <td> <img src="{{ asset('storage/book/' . $lend->book->cover) }}" alt="Book cover" width="100"></td>
            <td>{{ $lend->book->title }}</td>
            <td>{{ $lend->user->username }}</td>
            @if(\Carbon\Carbon::parse($lend->return_date)->isPast())
                <td style="color: red;">{{ \Carbon\Carbon::parse($lend->return_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
            @else
                <td style="color: green;">{{ \Carbon\Carbon::parse($lend->return_date)->locale('id')->isoFormat('dddd, D MMMM Y') }}</td>
            @endif
            
            <td><a target="_blank" rel="noopener noreferrer" class="phone" href="https://wa.me/62{{ $lend->user->phone }}" style="color: #2098ce !important;">0{{ $lend->user->phone }}</a></td>
            <td>
                <a href="#" class="btn btn-info" onclick="updateData(id = '{{$lend->id}}')">
                    <i class="bi bi-plus-square"></i>
                </a>
                <a href="#" class="btn btn-danger" onclick="finishLend(id = '{{$lend->id}}')">
                    <i class="bi bi-check-square"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!-- </div> -->

<!-- Add Lend Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header border-0">
                <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center;">Pinjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
            <div class="modal-body mt-4 border-0">
                <!-- MultiStep Form -->
                <form action="{{ route('lend.store') }}" method="POST" id="msform">
                    {{ csrf_field() }}
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">NIM & ID Buku</li>
                        <li>Detail</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Insert NIM & Book ID</h2>
                        <h3 class="fs-subtitle">max book is 5!</h3>
                        <div class="row mb-3">
                            <div class="col">
                                <button type="button" id="delete" class="btn btn-danger delete" onclick="removeLastElem()" />
                            </div>
                            <div class="col">
                                <button type="button" id="add" class="btn btn-success add" onclick="addNew()" />
                            </div>
                        </div>
                        <div id="nim-div">
                            <input type="number" name="nim" placeholder="NIM" required />
                        </div>
                        <div id="book-div">
                            <input type="number" class="idbook" name="bookid[]" placeholder="Book ID" required />
                        </div>

                        <input type="button" id="next" name="next" class="next action-button" value="Next" />

                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Detail Peminjaman</h2>
                        <!-- <h3 class="fs-subtitle">Fill in your credentials</h3> -->

                        <div class="row mt-4 text-left">
                            <div class="col">
                                <h6 class="label-detail">Operator</h6>
                                <h6 class="text-black">{{ Auth::user()->username }}</h6>
                            </div>
                            <div class="col">
                                <h6 class="label-detail">Peminjam</h6>
                                <h6 class="text-black" id="borrower">-</h6>
                            </div>
                        </div>

                        <div class="row mt-4 text-left">
                            <div class="col">
                                <h6 class="label-detail">Pinjam</h6>
                                <h6 class="text-black">{{ $carbon::now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y') }}</h6>
                                <input type="hidden" name="lend_date" value="{{ $carbon::now()->timezone('Asia/Jakarta')->locale('id')->isoFormat('Y-MM-DD') }}">
                            </div>
                            <div class="col">
                                <h6 class="label-detail">Kembali</h6>
                                <h6 class="text-black">{{ $carbon::now()->addWeeks(1)->timezone('Asia/Jakarta')->locale('id')->isoFormat('dddd, D MMMM Y') }}</h6>
                                <input type="hidden" name="return_date" value="{{ $carbon::now()->addWeeks(1)->timezone('Asia/Jakarta')->locale('id')->isoFormat('Y-MM-DD') }}">
                            </div>
                        </div>



                        <table class="table table-borderless mt-4 mb-4 text-left">
                            <thead>
                                <th style="color: #2098ce;">ID</th>
                                <th style="color: #2098ce; width: 80%;">Judul Buku</th>
                            </thead>

                            <tbody id="lend-detail">

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th style="color: #2098ce;">Total Buku</th>
                                    <th style="color: #2098ce;" id="book-total">-</th>
                                </tr>
                            </tfoot>

                        </table>

                        <!-- <div class="row mt-4 mb-4 text-left">
                            <div class="col">
                                <h6>Tanggal Pinjam:</h6>
                                <h6 class="text-black">15 Sep 2024</h6>
                            </div>
                            <div class="col">
                                <h6>Tanggal Kembali:</h6>
                                <h6 class="text-black">22 Sep 2024</h6>
                            </div>
                        </div> -->
                        <!-- <input type="text" name="email" placeholder="Email" />
                        <input type="password" name="pass" placeholder="Password" />
                        <input type="password" name="cpass" placeholder="Confirm Password" /> -->
                        <input type="button" id="previous" name="previous" class="previous action-button-previous" value="Previous" />
                        <input type="submit" class="submit action-button btn" />
                    </fieldset>
                </form>
                <!-- /.MultiStep Form -->
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
</div>

{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" id="status" name="status" value="2">
</form>

{{-- form delete hidden --}}
<form action="" method="POST" id="form-update">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
<link href="{{ asset('css/admin/book/lend.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/lend.js') }}"></script>
@endpush

@endsection