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
                <a href="#" class="btn btn-info detail"
                data-toggle="modal"
                data-target="#exampleModalCenter"
                data-activity="Membeli Tangga 50M"
                data-amount="70.000.000"
                data-type="0">
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
                <a href="#" class="btn btn-info detail"
                data-toggle="modal"
                data-target="#exampleModalCenter"
                data-activity="Uang Prodi"
                data-amount="10.000.000"
                data-type="1">
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


<!-- edit modal -->
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
                            <input class="border-0 w-100" type="text" id="edit-activity" value="">
                            <!-- <h6 class="text-black"></h6> -->
                        </div>
                    </div>

                    <div class="row mt-2 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Total</h6>
                            <input class="border-0 w-100" type="text" id="edit-amount" value="">
                        </div>
                        <div class="col mt-2">
                            <h6 class="label-detail">Jenis</h6>
                            <!-- <h6 style="color: red;">Pengeluaran</h6> -->
                            <select class="form-select edit-form" id="edit-type">
                                <option selected disabled value="">...</option>
                                <option value="0" style="color: red;">Pengeluaran</option>
                                <option value="1" style="color: #007bff;">Pemasukan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Note</h6>
                            <!-- <input class="border-0" type="textarea" style="text-align: justify;" id="note" value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat laborum aliquid sit aperiam! Iusto nam fuga itaque fugit rerum. Repellendus?"> -->
                            <textarea class="border-0" id="edit-note" name="Text1" style="text-align: justify; width:100%; height: 100px">Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias rem eligendi, officia distinctio ipsa ratione perspiciatis quam suscipit quos quia beatae magnam itaque in ab, adipisci laborum voluptatibus iure. Aliquam culpa repellat nisi perferendis quisquam similique suscipit maxime quidem, voluptas alias ad debitis ex ea sunt reiciendis inventore, reprehenderit possimus.</textarea>
                        </div>
                    </div>

                </fieldset>
            </div>
            <div class="modal-footer border-0 m-auto pb-4">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
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
                    <h2 class="fs-title">Tambah Transaksi</h2>

                    <div class="row mt-4 text-left">
                        <div class="col">
                            <h6 class="label-detail">Activity</h6>
                            <input class=" w-100 add-input" type="text" id="add-activity" value="">
                            <!-- <h6 class="text-black"></h6> -->
                        </div>
                    </div>

                    <div class="row mt-2 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Total</h6>
                            <input class="w-100 add-input" type="text" id="add-amount" value="">
                        </div>
                        <div class="col mt-2">
                            <h6 class="label-detail">Jenis</h6>
                            <!-- <h6 style="color: red;">Pengeluaran</h6> -->
                            <select class="form-select add-form" id="add-type" required>
                                <option selected disabled value="">Pilih Tipe</option>
                                <option value="0" style="color: red;">Pengeluaran</option>
                                <option value="1" style="color: #007bff;">Pemasukan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Note</h6>
                            <!-- <input class="border-0" type="textarea" style="text-align: justify;" id="note" value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat laborum aliquid sit aperiam! Iusto nam fuga itaque fugit rerum. Repellendus?"> -->
                            <textarea id="add-note" name="Text1" style="text-align: justify; width:100%; height: 100px"></textarea>
                        </div>
                    </div>

                </fieldset>
            </div>
            <div class="modal-footer border-0 m-auto pb-4">
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