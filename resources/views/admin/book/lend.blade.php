@extends('layout')
@section('title', 'Lend Book')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="lend-book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th>Cover</th>
        <th>Title</th>
        <th>Peminjam</th>
        <th>Pinjam</th>
        <th>Kembali</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>

        @for($i = 0; $i < 100; $i++) <tr>
            <td> <img src="https://baitulhikmah.my.id/storage/book_covers/B1435.jpg" alt="Book cover" width="100"></td>
            <td>Shahih Bukhari</td>
            <td>Abdullah</td>
            <td>5 Maret 2024</td>
            <td>12 Maret 2024</td>
            <td>Dipinjam</td>
            <td>
                <a href="#" class="btn btn-success">
                    <i class="bi bi-check-square"></i>
                </a>
                <a href="#" class="btn btn-primary">
                    <i class="bi bi-plus-square"></i>
                </a>
            </td>
            </tr>
            @endfor
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
                <form id="msform">
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
                            <input type="number" name="nim" placeholder="NIM" />
                        </div>
                        <div id="book-div">
                            <input type="number" name="bookid" placeholder="Book ID" />
                        </div>
                        
                        <input type="button" id="next" name="next" class="next action-button" value="Next" />
                            
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Detail Peminjaman</h2>
                        <!-- <h3 class="fs-subtitle">Fill in your credentials</h3> -->

                        <div class="row mt-4 text-left">
                            <div class="col">
                                <h6 class="label-detail">Operator</h6>
                                <h6 class="text-black">Aksaril Shaka Hikmatiar</h6>
                            </div>
                            <div class="col">
                                <h6 class="label-detail">Peminjam</h6>
                                <h6 class="text-black">Renaldi Setia Nugraha</h6>
                            </div>
                        </div>

                        <div class="row mt-4 text-left">
                            <div class="col">
                                <h6 class="label-detail">Pinjam</h6>
                                <h6 class="text-black">15 September 2024</h6>
                            </div>
                            <div class="col">
                                <h6 class="label-detail">Kembali</h6>
                                <h6 class="text-black">22 September 2024</h6>
                            </div>
                        </div>
                        
                    

                        <table class="table table-borderless mt-4 mb-4 text-left">
                            <thead>
                                <th style="color: #2098ce;">ID</th>
                                <th style="color: #2098ce; width: 80%;">Judul Buku</th>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>150729</td>
                                    <td>Menemukan Jejak Atlantis di Cisangkan Hilir Cimahi</td>
                                </tr>
                                <tr>
                                    <td>130259</td>
                                    <td>Tasawuf vs Filsafat: Death Battle</td>
                                </tr>
                                <tr>
                                    <td>170184</td>
                                    <td>Sunda Menafsir</td>
                                </tr>

                                <tr>
                                    <th style="color: #2098ce;">Total Buku</th>
                                    <th style="color: #2098ce;">3</th>
                                </tr>
                            </tbody>

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
                        <input type="submit" name="submit" class="submit action-button btn disable" value="Submit" />
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

@push('styles')
<link href="{{ asset('css/admin/book/lend.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/book/lend.js') }}"></script>
@endpush

@endsection