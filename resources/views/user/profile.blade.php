@extends('layout')
@section('title', 'Edit User')

@section('content')

<div class="container">
    <div class="row">
        <div class="col text-center">
            <h3 class="mt-3 mb-4 p-2" style="background-color: #343a40;color: #fafafa;border-radius: 10px;box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);">Profile</h3>
        </div>
    </div>
    <div class="row">

        <form id="form-add-user"  action="{{ route('update.user', $user->id) }}" method="POST" enctype="multipart/form-data">
            
            {{ csrf_field() }}
            
            <div class="col-12 col-md-6">
                <div style="padding: 1rem 0;">
                    <div class="mb-4 d-flex justify-content-center">
                        <img id="picture_img" src="{{ asset('storage/public/user/' . $user->picture) }}" class="rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" alt="example placeholder" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="picture">Choose file</label>
                            <input type="file" class="form-control d-none" id="picture" name="picture" onchange="displaySelectedImage(event, 'picture_img')" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="form-group mb-3">
                    <label for="id" class="mb-2">NIM</label>
                    <input type="number" class="form-control custom-form-control" name="id" value="{{ $user->id }}" readonly>
                </div>

                <div class="form-group mb-3">
                    <label for="username" class="mb-2">Nama Lengkap</label>
                    <input type="text" class="form-control custom-form-control" name="username" id="username" value="{{ $user->username }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="mb-2">Email</label>
                    <input type="email" class="form-control custom-form-control" name="email" id="email" value="{{ $user->email }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="phone" class="mb-2">Telepon</label>
                    <input type="number" class="form-control custom-form-control" name="phone" id="phone" value="0{{ $user->phone }}" required>
                </div>

                <div class="form-group mb-3">
                    <p class="pt-2">Ganti Password <a href="/email">Click Here</a></p>
                </div>

                <div class="form-group mt-4 text-center">
                    <button type="submit" class="btn btn-dark">
                        Selesai
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


@push('styles')
<link href="{{ asset('css/admin/user/add.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script type="text/javascript" src="{{ asset('js/admin/user/add.js') }}"></script>
@endpush

@endsection