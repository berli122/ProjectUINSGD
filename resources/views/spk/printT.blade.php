<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

@extends('layouts.master')

@section('content')
<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="card card-info card-outline col-md-8">
                    <div class="card-header">
                        <h4>Print</h4>
                    </div>
                    <div class="card-body p-4 row g-2">
                        <div class="mb-3 col-6 float-start">
                            <label class="label">Tanggal Awal</label>
                            <input type="date" name="tglawal" id="tglawal" class="form-control" required>
                        </div>
                        <div class="mb-3 col-6 float-end">
                            <label class="label">Tanggal Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir" class="form-control" required>
                        </div>
                        <div class="input-group mb-3">
                            <a href="" onclick="this.href='/printT/'+ document.getElementById('tglawal').value + '/' +
                            document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary">
                                Cetak Laporan Pertanggal
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
</html>
