@extends('layouts.master')
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PTIPD SGD | Daftar User</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
</head>

@section('content')
    <section class="section">
        <div class="section-header text-uppercase">
            <h6>Dashboard</h6>
            <div class="section-header-breadcrumb">
            </div>
        </div>
        @include('layouts/flash')
        <div class="card">
            <div class="card-header">
                <h4 class="float-start text-primary">Daftar User</h4>
                <div class="card-header-action">
                    <a class="btn btn-primary" href="{{ route('user.create') }}"> <i class="fa-solid fa-user-plus"></i>
                        Tambah
                        Data
                    </a>
                </div>

            </div>
            <div class="card-body">
                @php $no = 1; @endphp
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-md" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 1%">ID</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th style="width: 15%">Golongan</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $data)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td><img src="{{ asset('storage/image/' . $data->image) }}" alt=""
                                                width="50"></td>
                                        <td>{{ $data->nip }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->jabatan->name }}</td>
                                        <td>{{ $data->golongan->gol }} - {{ $data->golongan->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->role }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $data->id) }}" method="post">
                                                @csrf @method('delete')
                                                <a href="{{ route('user.edit', $data->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a>
                                                @if ($data->hasRole('user'))
                                                    <button type="submit" class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')"><i
                                                            class="fa-solid fa-user-slash"></i>Delete
                                                    </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-16">

                </div>
            </div>
        </div>
    </section>
@endsection
