@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.flash')
            <div class="card mt-3">
                <div class="card-header mb-3">Buat Laporan</div>
                <div class="card-body p-4">
                    <form class="row g-2" action="{{ route('jabatan.store') }}" method="post">
                        @csrf
<<<<<<< Updated upstream
                        <div class="mb-3 col-12">
                            <label for="">Angka Romawi</label>
=======
<<<<<<< HEAD
                        <div class="mb-3 col-6">
                            <label for="">Angka Romawi</label>
                            <input type="text" id="nmor" name="nmor" class="form-control @error('name') is-invalid @enderror">
                            @error('nmor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="">Nama Golongan</label>
=======
                        <div class="mb-3 col-12">
                            <label for="">Angka Romawi</label>
>>>>>>> f6858b5e68344565bbb64dce7992fb09954f3ef5
>>>>>>> Stashed changes
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-4 container">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit" id="tombol" onclick="Swal('Data Ditambahkan', 'Data Telah Di Tambahkan', 'success')">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
