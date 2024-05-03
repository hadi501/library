@extends('layout')
@section('title', 'Finance Detail')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th>Activity</th>
        <th>Total</th>
        <th>Type</th>
        <th>Action</th>
    </thead>
    <tbody>

        @for($i = 0; $i < 50; $i++) <tr>
            <td>Membeli Tangga 50M</td>
            <td>Rp 70.000.000</td>
            <td style="color: red;">Pengeluaran</td>
            <td>
                <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                    <i class="bi bi-info-circle-fill"></i>
                </a>
                <a href="#" class="btn btn-danger">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
            </tr>
            <tr>
                <td>Uang Prodi</td>
                <td>Rp 10.000.000</td>
                <td style="color: #007bff;">Pemasukan</td>
                <td>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">
                        <i class="bi bi-info-circle-fill"></i>
                    </a>
                    <a href="#" class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                    </a>
                </td>
            </tr>
            @endfor
    </tbody>
</table>
<!-- </div> -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <fieldset>
                <h2 class="fs-title">Detail Transaksi</h2>

                <div class="row mt-4 text-left">
                    <div class="col">
                        <h6 class="label-detail">Activity</h6>
                        <h6 class="text-black">Membeli Tangga 50M</h6>
                    </div>
                </div>

                <div class="row mt-4 text-left">
                    <div class="col">
                        <h6 class="label-detail">Total</h6>
                        <h6 class="text-black">Rp 70.000.000</h6>
                    </div>
                    <div class="col">
                        <h6 class="label-detail">Jenis</h6>
                        <h6 style="color: red;">Pengeluaran</h6>
                    </div>
                </div>

                <div class="row mt-4 text-left">
                    <div class="col">
                        <h6 class="label-detail">Note</h6>
                        <p class="text-black" style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos ducimus et ex perspiciatis cupiditate repudiandae praesentium doloremque quod commodi excepturi est, nesciunt maiores ipsam quia pariatur soluta magnam. Sequi minima laborum aut qui? Laudantium sapiente aliquam voluptas minima animi! Voluptatem exercitationem soluta harum vero dicta saepe neque praesentium nesciunt vel!</p>
                    </div>
                </div>

            </fieldset>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@push('styles')
<link href="{{ asset('css/admin/finance/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/finance/index.js') }}"></script>
@endpush

@endsection