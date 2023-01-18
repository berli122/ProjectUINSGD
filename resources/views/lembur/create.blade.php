@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('layouts.flash')
            <div class="card border-secondary">
                <div class="card-header mb-2">Buat Laporan</div>
                <div class="card-body p-4">
                    <form class="row g-2" action="{{ route('lembur.store') }}" method="post">
                        @csrf
                        <div class="mb-3 col-6" style="float: left">
                            <label for="">Kegiatan</label>
                            <input type="text" name="kgtn" value="Lembur" class="form-control @error('kgtn') is-invalid @enderror" required>
                            @error('kgtn')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6" style="float: right">
                            <label for="">Tanggal</label>
                            <input type="date" value="{{ old('date') }}" name="tgl" class="form-control @error('tgl') is-invalid @enderror" required>
                            @error('tgl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        @php
                        $hari = Carbon\Carbon::now()->isoFormat('dddd');
                        @endphp
                        <div class="mb-3 col-6">
                            <label for="">Jam Datang</label>
                            <input type="time" name="dari" @if ($hari=='Jumat' ) value="07:30" @else value="08:00" @endif class="form-control @error('dari') is-invalid @enderror">
                            @error('dari')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-6">
                            <label for="">Jam Pulang</label>
                            <input type="time" name="sampai" @if ($hari=='Jumat' ) value="16:30" @else value="16:00" @endif class="form-control @error('sampai') is-invalid @enderror">
                            @error('sampai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-12" style="float">
                            <label for="">Uraian</label>
                            <textarea class="form-control" name="urai" id="" cols="100" rows="auto" required>{{ old('urai') }}</textarea>
                            @error('urai')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 col-4 container">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">
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
