@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $user->name }}</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image" src="{{ asset('storage/image/' . $user->image) }}"
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-6 col-lg-12">
                    <div class="card">
                        <form method="post" class="row g-2" novalidate="">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3 col-6" style="float: right">
                                    <label class="form-label" for="nip">NIP</label>
                                    <input type="text" class="form-control  @error('nip') is-invalid @enderror"
                                        name="nip" value="{{ $user->nip }}" required>
                                    @error('nip')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 col-6" style="float: left">
                                    <label class="form-label" for="name">Nama</label>
                                    <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                        name="name" value="{{ $user->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" required>
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <img src="{{ 'storage/image'.$user->image }}" alt="">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $user->image }}">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="float: left">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                        name="email" value="{{ $user->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" style="float: right">
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
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
