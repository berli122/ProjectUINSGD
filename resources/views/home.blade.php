@extends('layouts.master')

@section('content')
    <section class="section">
        <div class="section-header text-uppercase">
            <h6>Dashboard</h6>
            <div class="section-header-breadcrumb">
            </div>
        </div>
        <div class="container">
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
            <div class="card">
                <div class="card-header">
                    <h4 class="float-start text-primary">Data Bar</h4>
                </div>
                <div class="card-body">
                    <canvas id="myChartB" height="100px"></canvas>
                </div>
            </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('tamplate/stisla/dist/assets/modules/chart.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('tamplate/stisla/dist/assets/js/page/modules-chartjs.js') }}"></script>
    <script type="text/javascript">
        var labels = ({!! json_encode($monthlembur) !!} || {!! json_encode($months) !!}  );
        var data = {!! json_encode($monthCount) !!};
        var lembus = {!! json_encode($monthCountlembur) !!};

        var ctx = document.getElementById("myChartB").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'USER',
                        data: data,
                        borderWidth: 5,
                        // backgroundColor: '#fad',
                        borderColor: '#fad',
                        borderWidth: 5,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4


                    },
                    {
                        label: 'LEMBUR',
                        data: lembus,
                        borderWidth: 5,
                        // backgroundColor: '#ff4',
                        borderColor: '#ff4',
                        borderWidth: 5,
                        pointBackgroundColor: '#ffffff',
                        pointRadius: 4
                    }
                ],
            },
            options: {
                legend: {
                    display: true,
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true,
                            drawBorder: true,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            display : true,
                            beginAtZero: true,
                            stepSize: true
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: true
                        },
                        gridLines: {
                            display: true
                        }
                    }]
                },
            }
        });
    </script>
@endsection
