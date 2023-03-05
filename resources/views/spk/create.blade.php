@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('layouts.flash')
                <div class="card mt-3">
                    <div class="card-header mb-3">
                        <h4 class="float-start text-primary">
                            Buat Surat Perintah Kerja
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-2" action="{{ route('spk.store') }}" method="post">
                            @csrf
                            <div class="mb-3 col-12" style="float">
                                <label for="">Pilih Data Pekerjaan</label>
                                <select class="form-select" name="peker" id="" required>
                                    @foreach ($peker as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('urai')
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
