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
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa-solid fa-user" style="color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total User</h4>
                        </div>
                        <div class="card-body">
                            {{ $juser }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa-solid fa-diagram-project" style="color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Jabatan</h4>
                        </div>
                        <div class="card-body">
                            {{ $jabatans }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fa-solid fa-bars-progress" style="color: white"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Lembur</h4>
                        </div>
                        <div class="card-body">
                            {{ $lemburs }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/flash')
        <div class="card">
            <div class="card-header">
                <h4 class="float-start text-primary">User Terdaftar</h4>
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
                            @foreach ($user as $data => $item)
                                <tbody>
                                    <tr>
                                        <td>{{ $user->firstitem() + $data }}</td>
                                        <td><img src="{{ asset('storage/image/' . $item->image) }}" alt=""
                                                width="50"></td>
                                        <td>{{ $item->nip }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->jabatan->name }}</td>
                                        <td>{{ $item->golongan->gol }} - {{ $item->golongan->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                                @csrf @method('delete')
                                                <a href="{{ route('user.edit', $item->id) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                                </a> |
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Apakah Anda Yakin?')"><i
                                                        class="fa-solid fa-user-slash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                        <div style="float: left">
                            Showing
                            {{ $user->firstitem() }}
                            to
                            {{ $user->lastitem() }}
                            of
                            {{ $user->total() }}
                        </div>
                        <div style="float: right">
                            {{ $user->links() }}
                        </div>
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
