<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>General Dashboard &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/modules/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.css"/>

    <style>
        .dataTables_info {
            display: none;
        }
        .paginate_button{
            display: none;
        }
        .dataTables_empty{
            display: none;
        }
    </style>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('tamplate/stisla/dist/assets/modules/weather-icon/css/weather-icons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('tamplate/stisla/dist/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('tamplate/stisla/dist/assets/css/components.css') }}">
    <script src="https://kit.fontawesome.com/f8f18d886a.js" crossorigin="anonymous"></script>


    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('layouts.includes.navbar')
            @include('layouts.includes.sidebar')


            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
                @include('sweetalert::alert')
            </div>
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="submit" data-dismiss="modal" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                                role="button">
                                <i>Logout</i>
                            </a>
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="footer-left">
                Copyright &copy; <span class="text-uppercase">Sunan Gunung Djati Bandung</span> 2018
                <div class="bullet"></div> Design By <a href="https://www.instagram.com/kizcreat.fil/">KIZ CREATIVE</a>
            </div>
            <div class="footer-right">

            </div>
        </footer>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('tamplate/stisla/dist/assets/js/page/modules-ion-icons.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/chart.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/summernote/summernote-bs4.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/sweetalert/sweetalert.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ asset('tamplate/stisla/dist/assets/js/page/index-0.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.13.1/af-2.5.1/b-2.3.3/b-colvis-2.3.3/b-html5-2.3.3/b-print-2.3.3/cr-1.6.1/date-1.2.0/fc-4.2.1/fh-3.3.1/kt-2.8.0/r-2.4.0/rg-1.3.0/rr-1.3.1/sc-2.0.7/sb-1.4.0/sp-2.1.0/sl-1.5.0/sr-1.2.0/datatables.min.js"></script>



    <!-- Template JS File -->
    <script src="{{ asset('tamplate/stisla/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('tamplate/stisla/dist/assets/js/custom.js') }}"></script>







    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [[0,'desc']]
            });
        });
    </script>

    {{-- <script>
        $(".btn-outline-danger").click(function() {
            swal({
                    title: 'Are you sure?',
                    text: 'Once deleted, you will not be able to recover this imaginary file!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal('Poof! Your imaginary file has been deleted!', {
                            icon: 'success',
                        });
                    } else {
                        swal('Your imaginary file is safe!');
                    }
                });
        });
    </script> --}}




</body>

</html>
