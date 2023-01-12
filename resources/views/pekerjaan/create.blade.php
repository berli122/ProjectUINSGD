@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash')
                <div class="card mt-3">
                    <div class="card-header mb-3">Buat Pekerjaan</div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('pekerjaan.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-12" style="float">
                                <label for="">Judul</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12" style="float">
                                <label for="">Pekerjaan Baru</label>
                                <textarea type="text" name="des" cols="30" rows="10"
                                    class="form-control @error('des') is-invalid @enderror" required></textarea>
                                @error('des')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-4 container">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit" id="tombol"
                                        onclick="Swal('Data Ditambahkan', 'Data Telah Di Tambahkan', 'success')">
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
