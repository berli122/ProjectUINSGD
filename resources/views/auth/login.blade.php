<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('tamplate/sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('tamplate/sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body style="background-image: url('https://www.niaga.asia/wp-content/uploads/2020/02/7-uin.jpg'); background-repeat: no-repeat;
background-size: cover">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top: 170px">

                    <div class="card-body p-0">
                        @include('layouts.flash')
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="row justify-content-center">
                                        <img src="{{ asset('assets/img/PTIPD.jpg') }}" alt="PTIPD" width="120"
                                            height="auto">
                                    </div>
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control  @error('email') is-invalid @enderror form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control @error('password') is-invalid @enderror form-control-user"
                                                id="exampleInputPassword" placeholder="Password"
                                                name="password" required
                                                autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4"
                                            id="tombol">Sign In</button>
                                        <script src="{{ asset('js-sweet/sweetalert2.all.min.js') }}"></script>
                                        <script>
                                            const tombol = document.querySelector('#tombol');
                                            tombol.addEventListener('click', function() {
                                                Swal({
                                                    title: 'Login Succes',
                                                    text: 'Anda Berhasil Login',
                                                    type: 'succes',
                                                });
                                            });
                                        </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('tamplate/sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('tamplate/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('tamplate/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('tamplate/sbadmin2/js/sb-admin-2.min.js') }}"></script>
</body>
