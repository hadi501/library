@extends('layout')
@section('title', 'Finance Detail')

@section('content')

<!-- <div class="container mt-3"> -->
<table id="book-table" class="table table-hover" style="width: 100%; padding: 1rem;">
    <thead class="thead-dark">
        <th style="width: 5%;">No</th>
        <th>Activity</th>
        <th>Total</th>
        <th>Type</th>
        <th>Action</th>
    </thead>
    <tbody>

        @foreach($finances as $finance)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{$finance->activity}}</td>
            <td>Rp {{$finance->amount}}</td>
            @if ($finance->type == '0')
            <td style="color: #dc3545;">Pengeluaran</td>
            @else
            <td style="color: #007bff;">Pemasukan</td>
            @endif
            <td>
                <a href="#" class="btn btn-info detail" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{$finance->id}}" data-note="{{$finance->note}}" data-activity="{{$finance->activity}}" data-amount="{{$finance->amount}}" data-type="{{$finance->type}}" data-note="{{$finance->note}}">
                    <i class="bi bi-info-circle-fill"></i>
                </a>
                <a href="#" class="btn btn-danger" onclick="deleteData(id = '{{$finance->id}}', url = 'finance')">
                    <i class="bi bi-trash"></i>
                </a>
            </td>
        </tr>
            @endforeach
    </tbody>
</table>
<!-- </div> -->


<!-- edit modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        
    <form action="{{ route('finance.update', 1) }}" method="POST">
        {{ csrf_field() }}
        @method('PUT')
        <input name="id" class="border-0 w-100" type="hidden" id="edit-id" value="">
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
                            <input name="activity" class="border-0 w-100" type="text" id="edit-activity" value="" required>
                            <!-- <h6 class="text-black"></h6> -->
                        </div>
                    </div>

                    <div class="row mt-2 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Total</h6>
                            <input name="amount" class="border-0 w-100" type="number" id="edit-amount" value="" required>
                        </div>
                        <div class="col mt-2">
                            <h6 class="label-detail">Jenis</h6>
                            <!-- <h6 style="color: red;">Pengeluaran</h6> -->
                            <select name="type" class="form-select edit-form" id="edit-type">
                                <option selected disabled value="">...</option>
                                <option value="0" style="color: #dc3545;">Pengeluaran</option>
                                <option value="1" style="color: #007bff;">Pemasukan</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3 text-left">
                        <div class="col mt-2">
                            <h6 class="label-detail">Note</h6>
                            <!-- <input class="border-0" type="textarea" style="text-align: justify;" id="note" value="Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat laborum aliquid sit aperiam! Iusto nam fuga itaque fugit rerum. Repellendus?"> -->
                            <textarea name="note" class="border-0" id="edit-note" name="Text1" style="text-align: justify; width:100%; height: 100px" maxlength="500" required></textarea>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer border-0 m-auto pb-4">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
    </div>
</div>

<!-- add modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="{{ route('finance.store') }}" method="POST">
            {{ csrf_field() }}
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
                                <input name="activity" id="add-activity" class="w-100 add-input" type="text" required>
                                <!-- <h6 class="text-black"></h6> -->
                            </div>
                        </div>

                        <div class="row mt-2 text-left">
                            <div class="col mt-2">
                                <h6 class="label-detail">Total</h6>
                                <input name="amount" id="add-amount" class="w-100 add-input" type="number" required>
                            </div>
                            <div class="col mt-2">
                                <h6 class="label-detail">Jenis</h6>
                                <!-- <h6 style="color: red;">Pengeluaran</h6> -->
                                <select name="type" class="form-select add-form" id="add-type" required>
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
                                <textarea name="note" id="add-note" name="Text1" style="text-align: justify; width:100%; height: 100px" maxlength="500" required></textarea>
                            </div>
                        </div>

                    </fieldset>
                </div>
                <div class="modal-footer border-0 m-auto pb-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- form delete hidden --}}
<form action="" method="POST" id="form-delete">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

@push('styles')
<link href="{{ asset('css/admin/finance/index.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/finance/index.js') }}"></script>
@endpush

@endsection