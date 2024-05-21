@extends('layout')
@section('title', 'Admin Dasboard')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card border-info text-white mb-3">
                <div class="card-header header-total"><h6 style="font-weight: bold;">Total Peminjaman</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-book-fill fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">500</h2>
                        </td>
                    </table>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-primary text-white mb-3">
                <div class="card-header header-current"><h6 style="font-weight: bold;">Sedang Dipinjam</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-hourglass-split fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                            <!-- <i class="fa fa-sort-down"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">2740</h2>
                        </td>
                    </table>
                    <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-danger text-white mb-3">
                <div class="card-header header-favorite"><h6 style="font-weight: bold;">Favorit</h6></div>
                <div class="card-body">
                    <table>
                        <td>
                            <i class="bi bi-star-fill fa-4x"></i>
                            <!-- <i class="fa-solid fa-user"></i> -->
                        </td>
                        <td>
                            <h2 class="card-title text-dark">1563</h2>
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
<link href="{{ asset('css/user/dashboard.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="module" src="{{ asset('js/user/dashboard.js') }}"></script>
@endpush

@endsection