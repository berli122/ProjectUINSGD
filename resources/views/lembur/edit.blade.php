@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.flash')
                <div class="card border-secondary">
                    <div class="card-header mb-3">Edit Laporan</div>
                    <div class="card-body">
                        <form class="row g-2" action="{{ route('lembur.update', $lembur->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="mb-3 col-6">
                                <label for="">Kegiatan</label>
                                <input type="text" name="kgtn"
                                    class="form-control @error('kgtn') is-invalid @enderror" value="Lembur" required>
                                @error('kgtn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: right">
                                <label for="">Tanggal</label>
                                <input type="date" name="tgl" class="form-control @error('tgl') is-invalid @enderror"
                                value="{{ $lembur->tgl }}"   required>
                                @error('tgl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Dari Jam</label>
                                <input type="time" name="dari" value="{{ $lembur->dari }}"
                                    class="form-control @error('dari') is-invalid @enderror"></input>
                                @error('dari')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6">
                                <label for="">Sampai Jam</label>
                                <input type="time" name="sampai" value="{{ $lembur->sampai }}"
                                    class="form-control @error('sampai') is-invalid @enderror"></input>
                                @error('sampai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div>
                                    <label for="">Uraian Lembur Maximal 200 Huruf</label>
                                </div>
                                <textarea class="form-control @error('urai') is-invalid @enderror" name="urai" id="" cols="100"
                                    rows="auto" required>{{ $lembur->urai }}</textarea>
                                @error('urai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
