@extends('layout')
@section('title', 'Admin Dasboard')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-warning text-white mb-3">
                <div class="card-header header-user"><h6 style="font-weight: bold;">User</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-person-fill fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">{{ $users->count() }}</h2>
                        </td>
                    </table>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary text-white mb-3">
                <div class="card-header header-book"><h6 style="font-weight: bold;">Buku</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-book-fill fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                            <!-- <i class="fa fa-sort-down"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">{{ $books->count() }}</h2>
                        </td>
                    </table>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-danger text-white mb-3">
                <div class="card-header header-lend"><h6 style="font-weight: bold;">Peminjaman</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-calendar-check-fill fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">{{ $lends->count() }}</h2>
                        </td>
                    </table>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row mb-4">
        <div class="col-xl-6 mt-4">
            <canvas id="myChart" style="width:100%;max-width:600px;margin:auto;"></canvas>
        </div>
        <div class="col-xl-6 mt-4">
            <canvas id="chart" style="width:100%;max-width:600px;margin:auto;"></canvas>
        </div>
    </div> -->
</div>


@push('styles')
<link href="{{ asset('css/admin/dashboard.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="module" src="{{ asset('js/admin/dashboard.js') }}"></script>
@endpush

@endsection