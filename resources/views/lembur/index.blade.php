@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIN PTIPD | Lembur</title>

</html>
@section('content')
    <section class="section">
        <div class="section-header">
            <h6 class="text-uppercase">Daftar Lembur</h6>
        </div>
        @include('layouts.flash')
        <div class="card">
            <div class="card-header">
                <h4 class="float-start text-primary">Lembur</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" href="{{ route('lembur.create') }}"><i class="fa-solid fa-circle-plus"></i>
                        Tambah
                        Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                @php $no = 1; @endphp
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-md" id="dataTable">
                        <thead>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Kegiatan</th>
                            <th>Waktu Lembur</th>
                            <th>Hari dan Tanggal</th>
                            <th>Uraian</th>
                            <th style="width: 20%">Action</th>
                        </thead>
                        @foreach ($lembur as $data => $item)
                            <tbody>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->user->nip }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->kgtn }}</td>
                                @php
                                    $hari = Carbon\Carbon::parse($item->tgl)->isoFormat('dddd');
                                    $awal = date_create($item->dari);
                                    $akhir = date_create($item->sampai);
                                    $diff = date_diff($awal, $akhir);
                                    $lem = $diff->h * 3600 + $diff->i * 60;
                                @endphp
                                <td>
                                    @if ($lem <= 0)
                                        Tidak Lembur
                                    @elseif ($lem >= 32400)
                                        @php
                                            $jam = ($lem - 28800) / 3600;
                                            echo round($jam) . ' Jam';
                                        @endphp
                                    @elseif ($lem >= 28800)
                                        @if (($lem - 28800) / 60 < 45)
                                            Tidak Lembur
                                        @else
                                            {{ ($lem - 28800) / 60 }} Menit
                                        @endif
                                    @endif
                                </td>
                                <td>{{ \Carbon\Carbon::parse($item->tgl)->isoFormat('dddd, D MMM Y') }}</td>
                                <td>{{ $uraian = substr($item->urai, 0, 15) }}</td>
                                <td>
                                    <form action="{{ route('lembur.destroy', $item->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        @if ($lem > 28800)
                                            <a href="{{ route('lembur.show', $item->id) }}" class="btn btn-primary">
                                                <span class="text bi bi-printer-fill">Print</span>
                                            </a>
                                        @endif
                                        <a href="{{ route('lembur.edit', $item->id) }}" class="btn btn-warning ">
                                            <span class="text"><i class="fa-solid fa-pen-to-square"></i> Edit</span>
                                        </a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Kamu Yakin?')">
                                            <span class="text"><i class="fa-solid fa-trash"></i> Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tbody>
                        @endforeach
                        </thead>
                    </table>
                    <div style="float: left">
                        Showing
                        {{ $lembur->firstitem() }}
                        to
                        {{ $lembur->lastitem() }}
                        of
                        {{ $lembur->total() }}
                    </div>
                    <div style="float: right">
                        {{ $lembur->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
