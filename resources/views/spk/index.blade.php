@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UIN PTIPD | SPK</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
</head>

</html>
@section('content')
    <section class="section">
        <div class="section-header">
            <h6 class="text-uppercase">Surat Perintah Kerja</h6>
        </div>
        @include('layouts.flash')
        <div class="card">
            <div class="card-header">
                <h4 class="float-start text-primary">Surat Perintah</h4>
                <div class="card-header-action">
                    <a class="btn btn-warning" href="{{ url('/printah') }}"><i class="fa-solid fa-print"></i> Print
                    </a>
                    <a class="btn btn-primary" href="{{ route('spk.create') }}"><i class="fa-solid fa-circle-plus"></i>
                        Tambah
                        Data
                    </a>
                </div>
            </div>
            <div class="card-body">
                @php $no = 1; @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-md" width="100%" cellspacing="0"
                            id="dataTable">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Golongan</th>
                                <th>Jabatan</th>
                                <th>Jenis Pekerjaan</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($spk as $data)
                                @if (Auth::user()->id == $data->user->id || Auth::user()->role == 'admin')
                                    <tbody>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->user->golongan->gol }} - {{ $data->user->golongan->name }}</td>
                                        <td>{{ $data->user->jabatan->name }}</td>
                                        <td>{{ $data->pekerjaan->des }}</td>
                                        <td>
                                            <form action="{{ route('spk.destroy', $data->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are You Sure?')">
                                                    <span class="text"><i class="fa-solid fa-trash"></i> Delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tbody>
                                @endif
                            @endforeach
                        </table>
                        <div style="float: left">
                            Showing
                            {{ $spk->firstitem() }}
                            to
                            {{ $spk->lastitem() }}
                            of
                            {{ $spk->total() }}
                        </div>
                        <div style="float: right">
                            {{ $spk->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    </script>
@endsection
