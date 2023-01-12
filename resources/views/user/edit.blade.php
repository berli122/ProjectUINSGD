@extends('layouts.master')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PT IPD | SPK</title>
</head>
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8" width="100%">
                <div class="card mt-3">
                    <div class="card-header">
                        Data User
                    </div>
                    <div class="card-body p-4">
                        <form class="row g-2 form-floating" action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3 col-6" style="float: right">
                                <label class="form-label" for="nip">NIP</label>
                                <input type="text" class="form-control  @error('nip') is-invalid @enderror"
                                    name="nip" value="{{ $user->nip }}" required>
                                @error('nip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: left">
                                <label class="form-label" for="name">Nama</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" required>
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: right">
                                <label class="form-label" for="jabatan" flo>Jabatan</label>
                                <select class="form-select @error('jabatan') is-invalid @enderror" name="jabatan"
                                    id="" required>
                                    <option value="{{ $user->jabatan->id }}" selected>
                                        {{ $user->jabatan->name }}</option>
                                    @foreach ($jab as $data)
                                        <option value="{{ $data->id }}" default>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('jabatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-6" style="float: right">
                                <label class="form-label" for="golongan" flo>Golongan</label>
                                <select class="form-select @error('golongan') is-invalid @enderror" name="golongan"
                                    id="" required>
                                    <option value="{{ $user->golongan->id }}" selected>
                                        {{ $user->golongan->gol." - ".$user->golongan->name }}</option>
                                    @foreach ($gol as $data)
                                        <option value="{{ $data->id }}" default>{{ $data->gol." - ".$data->name }}</option>
                                    @endforeach
                                </select>
                                @error('golongan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="role">Level</label>
                                <select name="role" id=""
                                    class="form-select  @error('role') is-invalid @enderror" required>
                                    <option value="user" default>User</option>
                                    <option value="admin">Admin</option>
                                </select>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="formFile" class="form-label">Foto</label>
                                <img src="{{ 'storage/image'.$user->image }}" alt="">
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $user->image }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-12">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-">
                                <label class="form-label" for="name">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                            <label class="form-label">Foto Mobil</label>
                            @if (isset($mobil) && $mobil->foto)
                            <p>
                                <img src="{{ asset('images/mobil/'). $mobil->foto }}" class="img-rounded img-responsive"
                        style="width: 75px; height: 75px">
                        </p>
                        @endif
                        <input type="file" name="foto" class="form-control @error('foto') is-invalid @enderror" value="{{ $mobil->nama }}">
                        @error('foto')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div> --}}
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
